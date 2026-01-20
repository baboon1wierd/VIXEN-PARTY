<?php
require_once __DIR__ . '/../config/database.php';

class NewsletterController {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function showNewsletter() {
        include __DIR__ . '/../views/static/newsletter.php';
    }

    public function subscribe() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /newsletter.php');
            exit;
        }

        $email = trim($_POST['email']);
        $categories = $_POST['categories'] ?? [];

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'Please enter a valid email address.';
            header('Location: /newsletter.php');
            exit;
        }

        try {
            $stmt = $this->pdo->prepare("INSERT OR IGNORE INTO newsletter (email) VALUES (?)");
            $stmt->execute([$email]);

            // Here you could store category preferences in a separate table
            // For now, just subscribe to general newsletter

            $_SESSION['success'] = 'Successfully subscribed to our newsletter! Check your email for confirmation.';
            header('Location: /newsletter.php');
            exit;
        } catch (Exception $e) {
            $_SESSION['error'] = 'Subscription failed. Please try again.';
            header('Location: /newsletter.php');
            exit;
        }
    }
}
?>