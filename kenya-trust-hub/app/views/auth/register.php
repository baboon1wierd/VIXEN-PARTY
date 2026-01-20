<?php include __DIR__ . '/../partials/header.php'; ?>

<h2>Register</h2>

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

<form method="post" action="/register.php">
    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? ''); ?>">
    <input name="name" placeholder="Full Name" required>
    <input name="email" type="email" placeholder="Email" required>
    <input name="password" type="password" placeholder="Password" required>
    <input name="confirm_password" type="password" placeholder="Confirm Password" required>
    <button type="submit">Register</button>
</form>

<p><a href="/login.php">Already have an account? Login</a></p>

<?php include __DIR__ . '/../partials/footer.php'; ?>