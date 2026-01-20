<?php
require_once __DIR__ . '/../config/database.php';

class SearchModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function searchListings($query, $filters = []) {
        $sql = "SELECT l.*, u.name as user_name FROM listings l
                LEFT JOIN users u ON l.user_id = u.id
                WHERE l.status = 'verified'";

        $params = [];
        $conditions = [];

        // Text search
        if (!empty($query)) {
            $conditions[] = "(l.title LIKE ? OR l.description LIKE ? OR l.location LIKE ?)";
            $searchTerm = '%' . $query . '%';
            $params = array_merge($params, [$searchTerm, $searchTerm, $searchTerm]);
        }

        // Category/Type filter
        if (!empty($filters['type'])) {
            $conditions[] = "l.type = ?";
            $params[] = $filters['type'];
        }

        // Location filter
        if (!empty($filters['location'])) {
            $conditions[] = "l.location LIKE ?";
            $params[] = '%' . $filters['location'] . '%';
        }

        // Price range filter
        if (!empty($filters['min_price'])) {
            $conditions[] = "l.price >= ?";
            $params[] = $filters['min_price'];
        }
        if (!empty($filters['max_price'])) {
            $conditions[] = "l.price <= ?";
            $params[] = $filters['max_price'];
        }

        // Date range filter
        if (!empty($filters['date_from'])) {
            $conditions[] = "l.created_at >= ?";
            $params[] = $filters['date_from'];
        }
        if (!empty($filters['date_to'])) {
            $conditions[] = "l.created_at <= ?";
            $params[] = $filters['date_to'];
        }

        if (!empty($conditions)) {
            $sql .= " AND " . implode(" AND ", $conditions);
        }

        // Sorting
        $sortBy = $filters['sort'] ?? 'created_at';
        $sortOrder = $filters['order'] ?? 'DESC';
        $allowedSorts = ['created_at', 'title', 'price', 'location'];
        $allowedOrders = ['ASC', 'DESC'];

        if (in_array($sortBy, $allowedSorts) && in_array($sortOrder, $allowedOrders)) {
            $sql .= " ORDER BY l.$sortBy $sortOrder";
        } else {
            $sql .= " ORDER BY l.created_at DESC";
        }

        // Pagination
        $limit = (int)($filters['limit'] ?? 20);
        $offset = (int)($filters['offset'] ?? 0);
        $sql .= " LIMIT ? OFFSET ?";
        $params[] = $limit;
        $params[] = $offset;

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSearchSuggestions($query) {
        if (empty($query) || strlen($query) < 2) {
            return [];
        }

        $stmt = $this->pdo->prepare("
            SELECT DISTINCT title as suggestion, 'title' as type FROM listings
            WHERE title LIKE ? AND status = 'verified'
            UNION
            SELECT DISTINCT location as suggestion, 'location' as type FROM listings
            WHERE location LIKE ? AND status = 'verified' AND location != ''
            LIMIT 10
        ");
        $searchTerm = $query . '%';
        $stmt->execute([$searchTerm, $searchTerm]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPopularSearches() {
        // This could be implemented with a search_logs table
        // For now, return some default popular searches
        return [
            'lost phone',
            'stolen car',
            'fake products',
            'rental scam',
            'job fraud'
        ];
    }

    public function getFilterOptions() {
        $types = $this->pdo->query("SELECT DISTINCT type FROM listings WHERE status = 'verified' ORDER BY type")->fetchAll(PDO::FETCH_COLUMN);
        $locations = $this->pdo->query("SELECT DISTINCT location FROM listings WHERE status = 'verified' AND location != '' ORDER BY location LIMIT 50")->fetchAll(PDO::FETCH_COLUMN);

        return [
            'types' => $types,
            'locations' => $locations
        ];
    }

    public function generateRSS() {
        $listings = $this->searchListings('', ['limit' => 50]);

        $rss = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $rss .= '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">' . "\n";
        $rss .= '<channel>' . "\n";
        $rss .= '<title>Kenya Trust Hub - Latest Listings</title>' . "\n";
        $rss .= '<description>Stay updated with the latest consumer protection listings and reports from Kenya Trust Hub</description>' . "\n";
        $rss .= '<link>' . APP_URL . '</link>' . "\n";
        $rss .= '<atom:link href="' . APP_URL . '/search.php?rss=1" rel="self" type="application/rss+xml" />' . "\n";
        $rss .= '<language>en-us</language>' . "\n";
        $rss .= '<lastBuildDate>' . date('r') . '</lastBuildDate>' . "\n";

        foreach ($listings as $listing) {
            $rss .= '<item>' . "\n";
            $rss .= '<title>' . htmlspecialchars($listing['title']) . '</title>' . "\n";
            $rss .= '<description>' . htmlspecialchars(substr($listing['description'], 0, 200) . '...') . '</description>' . "\n";
            $rss .= '<link>' . APP_URL . '/listing.php?id=' . $listing['id'] . '</link>' . "\n";
            $rss .= '<guid>' . APP_URL . '/listing.php?id=' . $listing['id'] . '</guid>' . "\n";
            $rss .= '<pubDate>' . date('r', strtotime($listing['created_at'])) . '</pubDate>' . "\n";
            $rss .= '<category>' . htmlspecialchars($listing['type']) . '</category>' . "\n";
            if (!empty($listing['location'])) {
                $rss .= '<category>' . htmlspecialchars($listing['location']) . '</category>' . "\n";
            }
            $rss .= '</item>' . "\n";
        }

        $rss .= '</channel>' . "\n";
        $rss .= '</rss>';

        return $rss;
    }
}
?>