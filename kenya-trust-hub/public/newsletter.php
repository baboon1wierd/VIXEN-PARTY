<?php
include '../app/config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $stmt = $pdo->prepare("INSERT OR IGNORE INTO newsletter (email) VALUES (?)");
  $stmt->execute([$email]);
  echo "<p>Subscribed successfully!</p>";
}
?>

<?php include '../app/views/partials/header.php'; ?>

<h2>Newsletter</h2>
<form method="post">
  <input name="email" type="email" placeholder="Email" required>
  <button>Subscribe</button>
</form>

<?php include '../app/views/partials/footer.php'; ?>