<?php
require_once __DIR__ . '/../models/SearchModel.php';

class SearchController {
    private $searchModel;

    public function __construct() {
        $this->searchModel = new SearchModel();
    }

    public function showSearch() {
        $query = $_GET['q'] ?? '';
        $filters = [
            'type' => $_GET['type'] ?? '',
            'location' => $_GET['location'] ?? '',
            'min_price' => $_GET['min_price'] ?? '',
            'max_price' => $_GET['max_price'] ?? '',
            'date_from' => $_GET['date_from'] ?? '',
            'date_to' => $_GET['date_to'] ?? '',
            'sort' => $_GET['sort'] ?? 'created_at',
            'order' => $_GET['order'] ?? 'DESC',
            'limit' => $_GET['limit'] ?? 20,
            'offset' => $_GET['offset'] ?? 0
        ];

        $results = $this->searchModel->searchListings($query, $filters);
        $filterOptions = $this->searchModel->getFilterOptions();
        $popularSearches = $this->searchModel->getPopularSearches();

        include __DIR__ . '/../views/listings/search.php';
    }

    public function apiSearch() {
        header('Content-Type: application/json');

        $query = $_GET['q'] ?? '';
        $filters = [
            'type' => $_GET['type'] ?? '',
            'location' => $_GET['location'] ?? '',
            'min_price' => $_GET['min_price'] ?? '',
            'max_price' => $_GET['max_price'] ?? '',
            'date_from' => $_GET['date_from'] ?? '',
            'date_to' => $_GET['date_to'] ?? '',
            'sort' => $_GET['sort'] ?? 'created_at',
            'order' => $_GET['order'] ?? 'DESC',
            'limit' => $_GET['limit'] ?? 20,
            'offset' => $_GET['offset'] ?? 0
        ];

        $results = $this->searchModel->searchListings($query, $filters);

        echo json_encode([
            'success' => true,
            'query' => $query,
            'filters' => $filters,
            'results' => $results,
            'count' => count($results)
        ]);
    }

    public function getSuggestions() {
        header('Content-Type: application/json');

        $query = $_GET['q'] ?? '';
        $suggestions = $this->searchModel->getSearchSuggestions($query);

        echo json_encode([
            'suggestions' => $suggestions
        ]);
    }

    public function getRSS() {
        header('Content-Type: application/rss+xml');
        echo $this->searchModel->generateRSS();
    }
}
?>