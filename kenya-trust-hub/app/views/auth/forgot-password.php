<?php include __DIR__ . '/../partials/header.php'; ?>

<h2>Forgot Password</h2>

<?php
if (isset($_SESSION['error'])) {
    echo '<p style="color: red;">' . $_SESSION['error'] . '</p>';
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
    echo '<p style="color: green;">' . $_SESSION['success'] . '</p>';
    unset($_SESSION['success']);
}
?>

<form method="post" action="/forgot-password.php">
    <input name="email" type="email" placeholder="Enter your email" required>
    <button type="submit">Send Reset Link</button>
</form>

<p><a href="/login.php">Back to Login</a></p>

<?php include __DIR__ . '/../partials/footer.php'; ?>