<?php
// Load environment variables
function loadEnv($path) {
    if (!file_exists($path)) {
        return;
    }
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);
        if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
            putenv(sprintf('%s=%s', $name, $value));
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }
}

loadEnv(__DIR__ . '/../../.env');

// App configuration
define('APP_NAME', getenv('APP_NAME') ?: 'Kenya Trust Hub');
define('APP_URL', getenv('APP_URL') ?: 'http://localhost:8000');
define('DB_PATH', getenv('DB_PATH') ?: 'app/config/database.db');

// OAuth
define('GOOGLE_CLIENT_ID', getenv('GOOGLE_CLIENT_ID'));
define('GOOGLE_CLIENT_SECRET', getenv('GOOGLE_CLIENT_SECRET'));
define('FACEBOOK_CLIENT_ID', getenv('FACEBOOK_CLIENT_ID'));
define('FACEBOOK_CLIENT_SECRET', getenv('FACEBOOK_CLIENT_SECRET'));

// Email
define('SMTP_HOST', getenv('SMTP_HOST'));
define('SMTP_PORT', getenv('SMTP_PORT') ?: 587);
define('SMTP_USER', getenv('SMTP_USER'));
define('SMTP_PASS', getenv('SMTP_PASS'));

// Start session if not started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>