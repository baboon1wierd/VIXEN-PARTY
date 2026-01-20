<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../config/app.php';
use League\OAuth2\Client\Provider\Google;
use League\OAuth2\Client\Provider\Facebook;

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    private function generateCSRFToken() {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    private function validateCSRFToken($token) {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }

    private function checkRateLimit($action, $maxAttempts = 5, $timeWindow = 900) { // 15 minutes
        $key = 'rate_limit_' . $action . '_' . $_SERVER['REMOTE_ADDR'];
        if (!isset($_SESSION[$key])) {
            $_SESSION[$key] = ['count' => 0, 'first_attempt' => time()];
        }

        $now = time();
        if ($now - $_SESSION[$key]['first_attempt'] > $timeWindow) {
            $_SESSION[$key] = ['count' => 1, 'first_attempt' => $now];
            return true;
        }

        if ($_SESSION[$key]['count'] >= $maxAttempts) {
            return false;
        }

        $_SESSION[$key]['count']++;
        return true;
    }

    public function showLogin() {
        $this->generateCSRFToken();
        include __DIR__ . '/../views/auth/login.php';
    }

    public function showRegister() {
        $this->generateCSRFToken();
        include __DIR__ . '/../views/auth/register.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /login.php');
            exit;
        }

        if (!$this->validateCSRFToken($_POST['csrf_token'] ?? '')) {
            $_SESSION['error'] = 'Invalid request.';
            header('Location: /login.php');
            exit;
        }

        if (!$this->checkRateLimit('login')) {
            $_SESSION['error'] = 'Too many login attempts. Please try again later.';
            header('Location: /login.php');
            exit;
        }

        $email = trim($_POST['email']);
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            $_SESSION['error'] = 'Please fill in all fields.';
            header('Location: /login.php');
            exit;
        }

        $user = $this->userModel->login($email, $password);

        if ($user) {
            if (!$user['email_verified']) {
                $_SESSION['error'] = 'Please verify your email before logging in.';
                header('Location: /login.php');
                exit;
            }

            session_regenerate_id(true);
            $_SESSION['user'] = $user;
            header('Location: /dashboard.php');
            exit;
        } else {
            $_SESSION['error'] = 'Invalid email or password.';
            header('Location: /login.php');
            exit;
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /register.php');
            exit;
        }

        if (!$this->validateCSRFToken($_POST['csrf_token'] ?? '')) {
            $_SESSION['error'] = 'Invalid request.';
            header('Location: /register.php');
            exit;
        }

        if (!$this->checkRateLimit('register')) {
            $_SESSION['error'] = 'Too many registration attempts. Please try again later.';
            header('Location: /register.php');
            exit;
        }

        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
            $_SESSION['error'] = 'Please fill in all fields.';
            header('Location: /register.php');
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'Invalid email format.';
            header('Location: /register.php');
            exit;
        }

        if (strlen($password) < 8) {
            $_SESSION['error'] = 'Password must be at least 8 characters long.';
            header('Location: /register.php');
            exit;
        }

        if ($password !== $confirmPassword) {
            $_SESSION['error'] = 'Passwords do not match.';
            header('Location: /register.php');
            exit;
        }

        if ($this->userModel->findByEmail($email)) {
            $_SESSION['error'] = 'Email already exists.';
            header('Location: /register.php');
            exit;
        }

        try {
            $verificationToken = $this->userModel->register($name, $email, $password);
            // Send verification email (placeholder)
            $this->sendVerificationEmail($email, $verificationToken);
            $_SESSION['success'] = 'Registration successful! Please check your email to verify your account.';
            header('Location: /login.php');
            exit;
        } catch (Exception $e) {
            $_SESSION['error'] = 'Registration failed. Please try again.';
            header('Location: /register.php');
            exit;
        }
    }

    public function verifyEmail($token) {
        if ($this->userModel->verifyEmail($token)) {
            $_SESSION['success'] = 'Email verified successfully! You can now log in.';
        } else {
            $_SESSION['error'] = 'Invalid or expired verification token.';
        }
        header('Location: /login.php');
        exit;
    }

    public function logout() {
        session_destroy();
        header('Location: /');
        exit;
    }

    public function showForgotPassword() {
        include __DIR__ . '/../views/auth/forgot-password.php';
    }

    public function forgotPassword() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /forgot-password.php');
            exit;
        }

        $email = trim($_POST['email']);

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'Please enter a valid email.';
            header('Location: /forgot-password.php');
            exit;
        }

        $user = $this->userModel->findByEmail($email);
        if ($user) {
            $resetToken = $this->userModel->createResetToken($email);
            $this->sendResetEmail($email, $resetToken);
        }

        // Always show success to prevent email enumeration
        $_SESSION['success'] = 'If an account with that email exists, a password reset link has been sent.';
        header('Location: /login.php');
        exit;
    }

    public function showResetPassword() {
        $token = $_GET['token'] ?? '';
        include __DIR__ . '/../views/auth/reset-password.php';
    }

    public function resetPassword() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /forgot-password.php');
            exit;
        }

        $token = $_POST['token'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        if (empty($password) || strlen($password) < 8) {
            $_SESSION['error'] = 'Password must be at least 8 characters long.';
            header('Location: /reset-password.php?token=' . urlencode($token));
            exit;
        }

        if ($password !== $confirmPassword) {
            $_SESSION['error'] = 'Passwords do not match.';
            header('Location: /reset-password.php?token=' . urlencode($token));
            exit;
        }

        if ($this->userModel->resetPassword($token, $password)) {
            $_SESSION['success'] = 'Password reset successfully! You can now log in.';
            header('Location: /login.php');
            exit;
        } else {
            $_SESSION['error'] = 'Invalid or expired reset token.';
            header('Location: /forgot-password.php');
            exit;
        }
    }

    private function sendVerificationEmail($email, $token) {
        // Placeholder for email sending
        // In production, use a library like PHPMailer
        $subject = 'Verify your email';
        $message = "Click here to verify: " . APP_URL . "/verify.php?token=$token";
        mail($email, $subject, $message);
    }

    private function sendResetEmail($email, $token) {
        $subject = 'Reset your password';
        $message = "Click here to reset your password: " . APP_URL . "/reset-password.php?token=$token";
        mail($email, $subject, $message);
    }

    public function googleLogin() {
        $provider = new Google([
            'clientId'     => GOOGLE_CLIENT_ID,
            'clientSecret' => GOOGLE_CLIENT_SECRET,
            'redirectUri'  => APP_URL . '/auth/google/callback',
        ]);

        if (!isset($_GET['code'])) {
            // If we don't have an authorization code then get one
            $authUrl = $provider->getAuthorizationUrl();
            $_SESSION['oauth2state'] = $provider->getState();
            header('Location: ' . $authUrl);
            exit;
        } elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
            unset($_SESSION['oauth2state']);
            header('Location: /login.php?error=Invalid state');
            exit;
        } else {
            try {
                $token = $provider->getAccessToken('authorization_code', [
                    'code' => $_GET['code']
                ]);

                $user = $provider->getResourceOwner($token);
                $userData = $user->toArray();

                $oauthUser = $this->userModel->findOrCreateOAuthUser('google', $userData['id'], $userData['email'], $userData['name']);

                session_regenerate_id(true);
                $_SESSION['user'] = $oauthUser;
                header('Location: /dashboard.php');
                exit;
            } catch (Exception $e) {
                header('Location: /login.php?error=Google login failed');
                exit;
            }
        }
    }

    public function facebookLogin() {
        $provider = new Facebook([
            'clientId'     => FACEBOOK_CLIENT_ID,
            'clientSecret' => FACEBOOK_CLIENT_SECRET,
            'redirectUri'  => APP_URL . '/auth/facebook/callback',
            'graphApiVersion' => 'v12.0',
        ]);

        if (!isset($_GET['code'])) {
            $authUrl = $provider->getAuthorizationUrl();
            $_SESSION['oauth2state'] = $provider->getState();
            header('Location: ' . $authUrl);
            exit;
        } elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
            unset($_SESSION['oauth2state']);
            header('Location: /login.php?error=Invalid state');
            exit;
        } else {
            try {
                $token = $provider->getAccessToken('authorization_code', [
                    'code' => $_GET['code']
                ]);

                $user = $provider->getResourceOwner($token);
                $userData = $user->toArray();

                $oauthUser = $this->userModel->findOrCreateOAuthUser('facebook', $userData['id'], $userData['email'], $userData['name']);

                session_regenerate_id(true);
                $_SESSION['user'] = $oauthUser;
                header('Location: /dashboard.php');
                exit;
            } catch (Exception $e) {
                header('Location: /login.php?error=Facebook login failed');
                exit;
            }
        }
    }
}
?>