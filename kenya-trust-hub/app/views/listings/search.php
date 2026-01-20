<?php include __DIR__ . '/../partials/header.php'; ?>

<div class="search-container">
    <div class="search-header">
        <h1>Search Listings</h1>
        <p>Find consumer protection reports, lost items, and verified listings</p>
    </div>

    <div class="search-section">
        <form id="search-form" method="get" action="/search.php">
            <div class="search-input-group">
                <input type="text" id="search-input" name="q" placeholder="Search for lost items, scams, products..."
                       value="<?php echo htmlspecialchars($_GET['q'] ?? ''); ?>" autocomplete="off">
                <button type="submit" id="search-button">
                    <span class="search-icon">🔍</span> Search
                </button>
            </div>

            <!-- Search Suggestions -->
            <div id="suggestions" class="suggestions-dropdown" style="display: none;"></div>
        </form>

        <!-- RSS Feed Link -->
        <div class="rss-link">
            <a href="/search.php?rss=1" target="_blank" class="rss-button">
                📡 Subscribe to RSS Feed
            </a>
        </div>
    </div>

    <div class="search-content">
        <div class="filters-sidebar">
            <div class="filter-section">
                <h3>Filters</h3>

                <div class="filter-group">
                    <label for="type-filter">Category</label>
                    <select id="type-filter" name="type">
                        <option value="">All Categories</option>
                        <?php foreach ($filterOptions['types'] as $type): ?>
                            <option value="<?php echo htmlspecialchars($type); ?>"
                                    <?php echo (($_GET['type'] ?? '') === $type) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars(ucfirst($type)); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="location-filter">Location</label>
                    <select id="location-filter" name="location">
                        <option value="">All Locations</option>
                        <?php foreach ($filterOptions['locations'] as $location): ?>
                            <option value="<?php echo htmlspecialchars($location); ?>"
                                    <?php echo (($_GET['location'] ?? '') === $location) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($location); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="filter-group">
                    <label>Price Range</label>
                    <div class="price-range">
                        <input type="number" id="min-price" name="min_price" placeholder="Min"
                               value="<?php echo htmlspecialchars($_GET['min_price'] ?? ''); ?>">
                        <span>-</span>
                        <input type="number" id="max-price" name="max_price" placeholder="Max"
                               value="<?php echo htmlspecialchars($_GET['max_price'] ?? ''); ?>">
                    </div>
                </div>

                <div class="filter-group">
                    <label>Date Range</label>
                    <input type="date" id="date-from" name="date_from"
                           value="<?php echo htmlspecialchars($_GET['date_from'] ?? ''); ?>">
                    <span>to</span>
                    <input type="date" id="date-to" name="date_to"
                           value="<?php echo htmlspecialchars($_GET['date_to'] ?? ''); ?>">
                </div>

                <div class="filter-group">
                    <label for="sort-select">Sort By</label>
                    <select id="sort-select" name="sort">
                        <option value="created_at" <?php echo (($_GET['sort'] ?? '') === 'created_at') ? 'selected' : ''; ?>>Date</option>
                        <option value="title" <?php echo (($_GET['sort'] ?? '') === 'title') ? 'selected' : ''; ?>>Title</option>
                        <option value="price" <?php echo (($_GET['sort'] ?? '') === 'price') ? 'selected' : ''; ?>>Price</option>
                        <option value="location" <?php echo (($_GET['sort'] ?? '') === 'location') ? 'selected' : ''; ?>>Location</option>
                    </select>
                    <select id="order-select" name="order">
                        <option value="DESC" <?php echo (($_GET['order'] ?? '') === 'DESC') ? 'selected' : ''; ?>>Newest First</option>
                        <option value="ASC" <?php echo (($_GET['order'] ?? '') === 'ASC') ? 'selected' : ''; ?>>Oldest First</option>
                    </select>
                </div>

                <button type="button" id="apply-filters" class="apply-filters-btn">Apply Filters</button>
                <button type="button" id="clear-filters" class="clear-filters-btn">Clear All</button>
            </div>

            <!-- Popular Searches -->
            <div class="popular-searches">
                <h4>Popular Searches</h4>
                <ul>
                    <?php foreach ($popularSearches as $search): ?>
                        <li><a href="/search.php?q=<?php echo urlencode($search); ?>"><?php echo htmlspecialchars($search); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="results-section">
            <div id="search-results">
                <?php if (empty($results)): ?>
                    <div class="no-results">
                        <h3>No results found</h3>
                        <p>Try adjusting your search terms or filters.</p>
                        <?php if (!empty($_GET['q'])): ?>
                            <p>Did you mean: <a href="/search.php?q=<?php echo urlencode($_GET['q']); ?>&type=scam">Search in scams</a></p>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <div class="results-header">
                        <h2><?php echo count($results); ?> Results Found</h2>
                        <div class="results-view-toggle">
                            <button id="grid-view" class="view-btn active">Grid</button>
                            <button id="list-view" class="view-btn">List</button>
                        </div>
                    </div>

                    <div id="results-container" class="results-grid">
                        <?php foreach ($results as $result): ?>
                            <div class="result-card">
                                <div class="result-header">
                                    <span class="result-type <?php echo htmlspecialchars($result['type']); ?>">
                                        <?php echo htmlspecialchars(ucfirst($result['type'])); ?>
                                    </span>
                                    <span class="result-date">
                                        <?php echo date('M j, Y', strtotime($result['created_at'])); ?>
                                    </span>
                                </div>

                                <h3 class="result-title">
                                    <a href="/listing.php?id=<?php echo $result['id']; ?>">
                                        <?php echo htmlspecialchars($result['title']); ?>
                                    </a>
                                </h3>

                                <p class="result-description">
                                    <?php echo htmlspecialchars(substr($result['description'], 0, 150)); ?>...
                                </p>

                                <div class="result-meta">
                                    <?php if (!empty($result['location'])): ?>
                                        <span class="location">📍 <?php echo htmlspecialchars($result['location']); ?></span>
                                    <?php endif; ?>

                                    <?php if (!empty($result['price'])): ?>
                                        <span class="price">💰 KSh <?php echo number_format($result['price']); ?></span>
                                    <?php endif; ?>

                                    <?php if (!empty($result['user_name'])): ?>
                                        <span class="user">👤 <?php echo htmlspecialchars($result['user_name']); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="result-actions">
                                    <a href="/listing.php?id=<?php echo $result['id']; ?>" class="view-btn">View Details</a>
                                    <button class="share-btn" data-url="/listing.php?id=<?php echo $result['id']; ?>">Share</button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Pagination would go here -->
                    <div class="pagination">
                        <!-- Pagination controls -->
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style>
.search-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 20px;
}

.search-header {
    text-align: center;
    margin-bottom: 30px;
}

.search-header h1 {
    color: #333;
    margin-bottom: 10px;
}

.search-section {
    background: #f8f9fa;
    padding: 30px;
    border-radius: 10px;
    margin-bottom: 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.search-input-group {
    display: flex;
    flex: 1;
    max-width: 600px;
}

#search-input {
    flex: 1;
    padding: 15px 20px;
    border: 2px solid #ddd;
    border-radius: 25px 0 0 25px;
    font-size: 16px;
    outline: none;
}

#search-input:focus {
    border-color: #667eea;
}

#search-button {
    background: #667eea;
    color: white;
    border: none;
    padding: 15px 25px;
    border-radius: 0 25px 25px 0;
    cursor: pointer;
    font-size: 16px;
    transition: background 0.3s ease;
}

#search-button:hover {
    background: #5a6fd8;
}

.suggestions-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    z-index: 1000;
    max-height: 300px;
    overflow-y: auto;
}

.suggestion-item {
    padding: 10px 15px;
    border-bottom: 1px solid #eee;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
}

.suggestion-item:hover {
    background: #f8f9fa;
}

.suggestion-type {
    color: #666;
    font-size: 0.9em;
}

.rss-link {
    margin-left: 20px;
}

.rss-button {
    background: #ff6600;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
}

.rss-button:hover {
    background: #e55a00;
}

.search-content {
    display: flex;
    gap: 30px;
}

.filters-sidebar {
    width: 300px;
    flex-shrink: 0;
}

.filter-section {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.filter-section h3 {
    margin-bottom: 20px;
    color: #333;
}

.filter-group {
    margin-bottom: 20px;
}

.filter-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

.filter-group select,
.filter-group input {
    width: 100%;
    padding: 8px 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

.price-range {
    display: flex;
    align-items: center;
    gap: 10px;
}

.price-range input {
    flex: 1;
}

.apply-filters-btn,
.clear-filters-btn {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    margin-top: 10px;
}

.apply-filters-btn {
    background: #667eea;
    color: white;
}

.clear-filters-btn {
    background: #6c757d;
    color: white;
}

.popular-searches {
    margin-top: 20px;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.popular-searches h4 {
    margin-bottom: 10px;
    color: #333;
}

.popular-searches ul {
    list-style: none;
    padding: 0;
}

.popular-searches li {
    margin-bottom: 5px;
}

.popular-searches a {
    color: #667eea;
    text-decoration: none;
}

.popular-searches a:hover {
    text-decoration: underline;
}

.results-section {
    flex: 1;
}

.results-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.results-view-toggle {
    display: flex;
    gap: 5px;
}

.view-btn {
    padding: 8px 15px;
    border: 1px solid #ddd;
    background: white;
    cursor: pointer;
    border-radius: 5px;
}

.view-btn.active {
    background: #667eea;
    color: white;
    border-color: #667eea;
}

.results-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 20px;
}

.results-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.result-card {
    background: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.result-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
}

.result-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.result-type {
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.8em;
    font-weight: bold;
    text-transform: uppercase;
}

.result-type.scam { background: #fee; color: #c33; }
.result-type.lost-found { background: #efe; color: #363; }
.result-type.consumer { background: #eff; color: #336; }

.result-date {
    color: #666;
    font-size: 0.9em;
}

.result-title {
    margin-bottom: 10px;
}

.result-title a {
    color: #333;
    text-decoration: none;
    font-size: 1.2em;
}

.result-title a:hover {
    color: #667eea;
}

.result-description {
    color: #666;
    margin-bottom: 15px;
    line-height: 1.5;
}

.result-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    margin-bottom: 15px;
    font-size: 0.9em;
    color: #666;
}

.result-actions {
    display: flex;
    gap: 10px;
}

.view-btn {
    background: #667eea;
    color: white;
    padding: 8px 15px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-size: 0.9em;
    transition: background 0.3s ease;
}

.view-btn:hover {
    background: #5a6fd8;
}

.share-btn {
    background: #6c757d;
    color: white;
    padding: 8px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 0.9em;
    transition: background 0.3s ease;
}

.share-btn:hover {
    background: #5a6268;
}

.no-results {
    text-align: center;
    padding: 60px 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.no-results h3 {
    color: #666;
    margin-bottom: 10px;
}

.no-results p {
    color: #999;
}

.pagination {
    margin-top: 30px;
    text-align: center;
}

@media (max-width: 768px) {
    .search-content {
        flex-direction: column;
    }

    .filters-sidebar {
        width: 100%;
    }

    .search-section {
        flex-direction: column;
        gap: 15px;
        align-items: stretch;
    }

    .rss-link {
        margin-left: 0;
        text-align: center;
    }

    .results-grid {
        grid-template-columns: 1fr;
    }

    .results-header {
        flex-direction: column;
        gap: 15px;
        align-items: stretch;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const suggestions = document.getElementById('suggestions');
    const searchForm = document.getElementById('search-form');
    let suggestionTimeout;

    // Search suggestions
    searchInput.addEventListener('input', function() {
        clearTimeout(suggestionTimeout);
        const query = this.value.trim();

        if (query.length < 2) {
            suggestions.style.display = 'none';
            return;
        }

        suggestionTimeout = setTimeout(() => {
            fetch(`/api/search.php?action=suggestions&q=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.suggestions && data.suggestions.length > 0) {
                        suggestions.innerHTML = data.suggestions.map(item => `
                            <div class="suggestion-item" onclick="selectSuggestion('${item.suggestion}')">
                                <span>${item.suggestion}</span>
                                <span class="suggestion-type">${item.type}</span>
                            </div>
                        `).join('');
                        suggestions.style.display = 'block';
                    } else {
                        suggestions.style.display = 'none';
                    }
                })
                .catch(error => {
                    console.error('Error fetching suggestions:', error);
                    suggestions.style.display = 'none';
                });
        }, 300);
    });

    // Hide suggestions when clicking outside
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !suggestions.contains(e.target)) {
            suggestions.style.display = 'none';
        }
    });

    // Filter functionality
    document.getElementById('apply-filters').addEventListener('click', function() {
        const formData = new FormData(searchForm);
        const params = new URLSearchParams(formData);
        window.location.href = `/search.php?${params.toString()}`;
    });

    document.getElementById('clear-filters').addEventListener('click', function() {
        window.location.href = '/search.php';
    });

    // View toggle
    document.getElementById('grid-view').addEventListener('click', function() {
        document.getElementById('results-container').className = 'results-grid';
        this.classList.add('active');
        document.getElementById('list-view').classList.remove('active');
    });

    document.getElementById('list-view').addEventListener('click', function() {
        document.getElementById('results-container').className = 'results-list';
        this.classList.add('active');
        document.getElementById('grid-view').classList.remove('active');
    });

    // Share functionality
    document.querySelectorAll('.share-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const url = this.dataset.url;
            if (navigator.share) {
                navigator.share({
                    title: 'Check out this listing',
                    url: window.location.origin + url
                });
            } else {
                navigator.clipboard.writeText(window.location.origin + url);
                alert('Link copied to clipboard!');
            }
        });
    });
});

function selectSuggestion(suggestion) {
    document.getElementById('search-input').value = suggestion;
    document.getElementById('suggestions').style.display = 'none';
    document.getElementById('search-form').submit();
}
</script>

<?php include __DIR__ . '/../partials/footer.php'; ?>