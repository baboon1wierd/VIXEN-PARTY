<?php
require_once '../../app/controllers/AuthController.php';
require_once '../../app/config/app.php';

$authController = new AuthController();
$authController->facebookLogin();
?>