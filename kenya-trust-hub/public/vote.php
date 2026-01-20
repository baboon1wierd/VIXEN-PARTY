<?php
include '../app/config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  exit;
}

$postId = $_POST['post_id'] ?? null;
$voteType = $_POST['vote_type'] ?? null; // 'upvote' or 'downvote'
$anonId = $_POST['anon_id'] ?? null;

if (!$postId || !$voteType || !$anonId) {
  echo json_encode(['error' => 'Missing parameters']);
  exit;
}

$secretSalt = 'your_secret_salt_here'; // Change this
$rotatingSalt = date('Y-m-d'); // Daily rotation

$anonHash = hash('sha256', $anonId . $secretSalt);
$ipHash = hash('sha256', $_SERVER['REMOTE_ADDR'] . $rotatingSalt);
$uaHash = hash('sha256', $_SERVER['HTTP_USER_AGENT'] . $rotatingSalt);

// Rate limiting: max 20 votes per IP per hour
$stmt = $pdo->prepare("SELECT COUNT(*) as count FROM post_votes WHERE ip_hash = ? AND created_at > datetime('now', '-1 hour')");
$stmt->execute([$ipHash]);
$ipCount = $stmt->fetch()['count'];
if ($ipCount >= 20) {
  echo json_encode(['error' => 'Too many votes from this IP. Try again later.']);
  exit;
}

// Cooldown: 1 vote every 30 seconds per anon_hash
$stmt = $pdo->prepare("SELECT created_at FROM post_votes WHERE anon_hash = ? ORDER BY created_at DESC LIMIT 1");
$stmt->execute([$anonHash]);
$lastVote = $stmt->fetch();
if ($lastVote) {
  $lastTime = strtotime($lastVote['created_at']);
  if (time() - $lastTime < 30) {
    echo json_encode(['error' => 'Please wait before voting again.']);
    exit;
  }
}

// Check if already voted on this post
$stmt = $pdo->prepare("SELECT id FROM post_votes WHERE post_id = ? AND anon_hash = ?");
$stmt->execute([$postId, $anonHash]);
$existing = $stmt->fetch();

if ($existing) {
  // Update vote
  $stmt = $pdo->prepare("UPDATE post_votes SET vote_type = ?, created_at = CURRENT_TIMESTAMP WHERE id = ?");
  $stmt->execute([$voteType, $existing['id']]);
} else {
  // Insert new vote
  $stmt = $pdo->prepare("INSERT INTO post_votes (post_id, vote_type, anon_hash, ip_hash, ua_hash) VALUES (?, ?, ?, ?, ?)");
  $stmt->execute([$postId, $voteType, $anonHash, $ipHash, $uaHash]);
}

// Calculate new score
$stmt = $pdo->prepare("SELECT 
  SUM(CASE WHEN vote_type = 'upvote' THEN 1 ELSE 0 END) as upvotes,
  SUM(CASE WHEN vote_type = 'downvote' THEN 1 ELSE 0 END) as downvotes
  FROM post_votes WHERE post_id = ?");
$stmt->execute([$postId]);
$score = $stmt->fetch();
$totalScore = ($score['upvotes'] ?? 0) - ($score['downvotes'] ?? 0);

echo json_encode(['score' => $totalScore]);
?>