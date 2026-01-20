<?php include '../app/views/partials/header.php'; ?>

<h2>Scam Report</h2>

<form method="post">

  <input name="scammer" placeholder="Scammer / Business name" required>

  <textarea name="details" placeholder="Details" required></textarea>

  <button>Submit</button>

</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  include '../app/config/database.php';
  if (session_status() === PHP_SESSION_NONE) session_start();

  $user_id = $_SESSION['user']['id'] ?? null;
  $title = $_POST['scammer'];
  $description = $_POST['details'];
  $type = 'scam';

  $stmt = $pdo->prepare("INSERT INTO listings (user_id, type, title, description, status) VALUES (?, ?, ?, ?, 'reported')");
  $stmt->execute([$user_id, $type, $title, $description]);

  echo "<p>Report submitted successfully!</p>";
}
?>

<?php include '../app/views/partials/footer.php'; ?>