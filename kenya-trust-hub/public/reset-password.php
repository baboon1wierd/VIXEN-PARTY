<?php
require_once '../app/controllers/AuthController.php';
require_once '../app/config/app.php';
if (session_status() === PHP_SESSION_NONE) session_start();

$authController = new AuthController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $authController->resetPassword();
} else {
  $authController->showResetPassword();
}
?>