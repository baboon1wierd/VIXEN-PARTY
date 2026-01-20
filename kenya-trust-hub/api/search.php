<?php
require_once '../app/controllers/SearchController.php';
require_once '../app/config/app.php';

$searchController = new SearchController();

$action = $_GET['action'] ?? 'search';

switch ($action) {
    case 'suggestions':
        $searchController->getSuggestions();
        break;
    case 'search':
    default:
        $searchController->apiSearch();
        break;
}
?>