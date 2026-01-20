<?php include '../app/views/partials/header.php'; ?>

<h2>Lost & Found Report</h2>

<form method="post">

  <input name="item" placeholder="Item name" required>

  <input name="location" placeholder="Location">

  <textarea name="description" placeholder="Description" required></textarea>

  <button>Submit</button>

</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  include '../app/config/database.php';
  if (session_status() === PHP_SESSION_NONE) session_start();

  $user_id = $_SESSION['user']['id'] ?? null;
  $title = $_POST['item'];
  $description = $_POST['description'];
  $location = $_POST['location'];
  $type = 'lost-found';

  $stmt = $pdo->prepare("INSERT INTO listings (user_id, type, title, description, location, status) VALUES (?, ?, ?, ?, ?, 'reported')");
  $stmt->execute([$user_id, $type, $title, $description, $location]);

  echo "<p>Report submitted successfully!</p>";
}
?>

<?php include '../app/views/partials/footer.php'; ?>