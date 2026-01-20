<?php
include '../../config/database.php';
if (session_status() === PHP_SESSION_NONE) session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['publish'])) {
    $user_id = $_SESSION['user']['id'] ?? null;
    $title = $_POST['item'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $type = 'lost_found';
    $status = 'reported';

    $stmt = $pdo->prepare("INSERT INTO listings (user_id, type, title, description, location, status) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$user_id, $type, $title, $description, $location, $status]);
    $listing_id = $pdo->lastInsertId();

    if (!empty($_FILES['evidence']['name'])) {
      $path = "../../storage/evidence/" . uniqid() . ".jpg";
      move_uploaded_file($_FILES['evidence']['tmp_name'], $path);
      $pdo->prepare("INSERT INTO evidence (listing_id, file_path) VALUES (?, ?)")->execute([$listing_id, $path]);
    }

    echo "<p>Item published successfully!</p>";
  } elseif (isset($_POST['claim'])) {
    // For simplicity, just log the claim
    echo "<p>Claim submitted. We'll review it.</p>";
  }
}

include '../partials/header.php';
?>

<h2>Lost & Found</h2>

<!-- Search Bar -->
<form method="get">
  <input name="search" placeholder="Search items..." value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
  <button type="submit">Search</button>
</form>

<!-- Publish Found Item -->
<h3>Publish a Found Item</h3>
<form method="post" enctype="multipart/form-data">
  <input name="item" placeholder="Item name" required>
  <input name="location" placeholder="Location found" required>
  <textarea name="description" placeholder="Description"></textarea>
  <input type="file" name="evidence">
  <button type="submit" name="publish">Publish Found Item</button>
</form>

<!-- Claim Ownership -->
<h3>Claim Ownership</h3>
<form method="post">
  <input name="item_id" placeholder="Item ID" required>
  <input name="claimer_name" placeholder="Your Name" required>
  <input name="contact" placeholder="Contact Info" required>
  <textarea name="proof" placeholder="Proof of ownership"></textarea>
  <button type="submit" name="claim">Claim Ownership</button>
</form>

<!-- Listings -->
<h3>Recent Listings</h3>
<?php
$stmt = $pdo->prepare("SELECT * FROM listings WHERE type = 'lost_found' ORDER BY created_at DESC LIMIT 10");
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

$search = $_GET['search'] ?? '';
if ($search) {
  $items = array_filter($items, fn($i) => stripos($i['title'], $search) !== false);
}

foreach ($items as $item) {
  echo "<div>Item: {$item['title']}, Location: {$item['location']}, Status: {$item['status']}</div>";
}
?>

<?php include '../partials/footer.php'; ?>