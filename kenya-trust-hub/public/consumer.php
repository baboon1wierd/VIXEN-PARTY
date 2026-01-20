<?php include '../app/views/partials/header.php'; ?>

<h2>Consumer Protection Report</h2>

<form method="post">

  <input name="product" placeholder="Product name" required>

  <input name="price" placeholder="Price">

  <textarea name="description" placeholder="Description" required></textarea>

  <button>Submit</button>

</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  include '../app/config/database.php';
  if (session_status() === PHP_SESSION_NONE) session_start();

  $user_id = $_SESSION['user']['id'] ?? null;
  $title = $_POST['product'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $type = 'consumer';

  $stmt = $pdo->prepare("INSERT INTO listings (user_id, type, title, description, price, status) VALUES (?, ?, ?, ?, ?, 'reported')");
  $stmt->execute([$user_id, $type, $title, $description, $price]);

  echo "<p>Report submitted successfully!</p>";
}
?>

<?php include '../app/views/partials/footer.php'; ?>