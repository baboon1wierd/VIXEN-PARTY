<?php
require_once '../app/controllers/AuthController.php';
require_once '../app/config/app.php';

if (session_status() === PHP_SESSION_NONE) session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: /login.php');
    exit;
}

include '../app/views/dashboard/my-reports.php';
?>