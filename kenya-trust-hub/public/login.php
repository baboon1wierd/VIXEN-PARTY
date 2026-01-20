<?php
require_once '../app/controllers/AuthController.php';
require_once '../app/config/app.php';
if (session_status() === PHP_SESSION_NONE) session_start();

$authController = new AuthController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $authController->login();
} else {
  $authController->showLogin();
}
?>

<?php include '../app/views/partials/header.php'; ?>

<h2>Login</h2>
<?php if (isset($error)) echo "<p>$error</p>"; ?>
<form method="post">
  <input name="email" type="email" placeholder="Email" required>
  <input name="password" type="password" placeholder="Password" required>
  <button>Login</button>
</form>

<?php include '../app/views/partials/footer.php'; ?>