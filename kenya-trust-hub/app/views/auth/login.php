<?php include __DIR__ . '/../partials/header.php'; ?>

<h2>Login</h2>

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

<form method="post" action="/login.php">
    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? ''); ?>">
    <input name="email" type="email" placeholder="Email" required>
    <input name="password" type="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>

<p><a href="/register.php">Don't have an account? Register</a></p>
<p><a href="/forgot-password.php">Forgot password?</a></p>

<!-- OAuth Buttons -->
<div>
    <a href="/auth/google.php">Login with Google</a>
    <a href="/auth/facebook.php">Login with Facebook</a>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>