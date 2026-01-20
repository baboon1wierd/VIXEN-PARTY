<?php
require_once '../app/controllers/NewsletterController.php';
require_once '../app/config/app.php';
if (session_status() === PHP_SESSION_NONE) session_start();

$newsletterController = new NewsletterController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $newsletterController->subscribe();
} else {
  $newsletterController->showNewsletter();
}
?>