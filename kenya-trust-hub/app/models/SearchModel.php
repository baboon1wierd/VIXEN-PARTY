<?php
require_once __DIR__ . '/../config/database.php';

class SearchModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
        $this->createTable();
    }

    private function createTable() {
        $sql = "CREATE TABLE IF NOT EXISTS listings (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            description TEXT,
            type TEXT,
            location TEXT,
            price REAL,
            user_id INTEGER,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id)
        )";
        $this->pdo->exec($sql);
    }

    public function searchListings($query, $filters) {
        $sql = "SELECT * FROM listings WHERE 1=1";
        $params = [];

        if (!empty($query)) {
            $sql .= " AND (title LIKE ? OR description LIKE ?)";
            $params[] = "%$query%";
            $params[] = "%$query%";
        }

        if (!empty($filters['type'])) {
            $sql .= " AND type = ?";
            $params[] = $filters['type'];
        }

        if (!empty($filters['location'])) {
            $sql .= " AND location LIKE ?";
            $params[] = "%" . $filters['location'] . "%";
        }

        if (!empty($filters['min_price'])) {
            $sql .= " AND price >= ?";
            $params[] = $filters['min_price'];
        }

        if (!empty($filters['max_price'])) {
            $sql .= " AND price <= ?";
            $params[] = $filters['max_price'];
        }

        if (!empty($filters['date_from'])) {
            $sql .= " AND created_at >= ?";
            $params[] = $filters['date_from'];
        }

        if (!empty($filters['date_to'])) {
            $sql .= " AND created_at <= ?";
            $params[] = $filters['date_to'];
        }

        $sort = $filters['sort'] ?? 'created_at';
        $order = strtoupper($filters['order'] ?? 'DESC');
        $sql .= " ORDER BY $sort $order";

        $limit = $filters['limit'] ?? 20;
        $offset = $filters['offset'] ?? 0;
        $sql .= " LIMIT ? OFFSET ?";
        $params[] = $limit;
        $params[] = $offset;

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFilterOptions() {
        $types = $this->pdo->query("SELECT DISTINCT type FROM listings WHERE type IS NOT NULL ORDER BY type")->fetchAll(PDO::FETCH_COLUMN);
        $locations = $this->pdo->query("SELECT DISTINCT location FROM listings WHERE location IS NOT NULL ORDER BY location")->fetchAll(PDO::FETCH_COLUMN);
        return [
            'types' => $types,
            'locations' => $locations
        ];
    }

    public function getPopularSearches() {
        // Placeholder: return some popular searches
        return ['electronics', 'cars', 'houses', 'jobs'];
    }

    public function getSearchSuggestions($query) {
        if (empty($query)) return [];

        $stmt = $this->pdo->prepare("SELECT title FROM listings WHERE title LIKE ? LIMIT 10");
        $stmt->execute(["%$query%"]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function generateRSS() {
        $listings = $this->pdo->query("SELECT * FROM listings ORDER BY created_at DESC LIMIT 20")->fetchAll(PDO::FETCH_ASSOC);

        $rss = '<?xml version="1.0" encoding="UTF-8"?>';
        $rss .= '<rss version="2.0">';
        $rss .= '<channel>';
        $rss .= '<title>Kenya Trust Hub Listings</title>';
        $rss .= '<description>Latest listings from Kenya Trust Hub</description>';
        $rss .= '<link>' . APP_URL . '</link>';

        foreach ($listings as $listing) {
            $rss .= '<item>';
            $rss .= '<title>' . htmlspecialchars($listing['title']) . '</title>';
            $rss .= '<description>' . htmlspecialchars($listing['description']) . '</description>';
            $rss .= '<link>' . APP_URL . '/listing.php?id=' . $listing['id'] . '</link>';
            $rss .= '<pubDate>' . date('r', strtotime($listing['created_at'])) . '</pubDate>';
            $rss .= '</item>';
        }

        $rss .= '</channel>';
        $rss .= '</rss>';

        return $rss;
    }
}
?>
