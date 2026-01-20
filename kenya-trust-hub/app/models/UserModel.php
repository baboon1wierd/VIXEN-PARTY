<?php
require_once __DIR__ . '/../config/database.php';

class UserModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
        $this->createTable();
    }

    private function createTable() {
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            email TEXT UNIQUE NOT NULL,
            password_hash TEXT,
            email_verified INTEGER DEFAULT 0,
            verification_token TEXT,
            reset_token TEXT,
            reset_expires DATETIME,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            oauth_provider TEXT,
            oauth_id TEXT
        )";
        $this->pdo->exec($sql);
    }

    public function register($name, $email, $password) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $verificationToken = bin2hex(random_bytes(32));

        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password_hash, verification_token) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $passwordHash, $verificationToken]);

        return $verificationToken;
    }

    public function login($email, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password_hash'])) {
            return $user;
        }
        return false;
    }

    public function findByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function verifyEmail($token) {
        $stmt = $this->pdo->prepare("UPDATE users SET email_verified = 1, verification_token = NULL WHERE verification_token = ?");
        return $stmt->execute([$token]);
    }

    public function createResetToken($email) {
        $resetToken = bin2hex(random_bytes(32));
        $expires = date('Y-m-d H:i:s', time() + 3600); // 1 hour

        $stmt = $this->pdo->prepare("UPDATE users SET reset_token = ?, reset_expires = ? WHERE email = ?");
        $stmt->execute([$resetToken, $expires, $email]);

        return $resetToken;
    }

    public function resetPassword($token, $password) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->pdo->prepare("UPDATE users SET password_hash = ?, reset_token = NULL, reset_expires = NULL WHERE reset_token = ? AND reset_expires > datetime('now')");
        return $stmt->execute([$passwordHash, $token]);
    }

    public function findOrCreateOAuthUser($provider, $providerId, $email, $name) {
        // Check if user exists with this oauth
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE oauth_provider = ? AND oauth_id = ?");
        $stmt->execute([$provider, $providerId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user;
        }

        // Check if email exists
        $existingUser = $this->findByEmail($email);
        if ($existingUser) {
            // Link oauth to existing user
            $stmt = $this->pdo->prepare("UPDATE users SET oauth_provider = ?, oauth_id = ? WHERE id = ?");
            $stmt->execute([$provider, $providerId, $existingUser['id']]);
            return $existingUser;
        }

        // Create new user
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, email_verified, oauth_provider, oauth_id) VALUES (?, ?, 1, ?, ?)");
        $stmt->execute([$name, $email, $provider, $providerId]);

        return $this->findByEmail($email);
    }
}
?>