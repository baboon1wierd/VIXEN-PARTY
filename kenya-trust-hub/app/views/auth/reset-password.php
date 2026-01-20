<?php include __DIR__ . '/../partials/header.php'; ?>

<h2>Reset Password</h2>

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

<form method="post" action="/reset-password.php">
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
    <input name="password" type="password" placeholder="New Password" required>
    <input name="confirm_password" type="password" placeholder="Confirm New Password" required>
    <button type="submit">Reset Password</button>
</form>

<p><a href="/login.php">Back to Login</a></p>

<?php include __DIR__ . '/../partials/footer.php'; ?>