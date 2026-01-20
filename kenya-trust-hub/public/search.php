<?php
require_once '../app/controllers/SearchController.php';
require_once '../app/config/app.php';

$searchController = new SearchController();

// Handle RSS feed
if (isset($_GET['rss'])) {
    $searchController->getRSS();
    exit;
}

$searchController->showSearch();
?>