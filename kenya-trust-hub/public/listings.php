<?php include '../app/views/partials/header.php'; ?>

<section class="py-16 bg-gray-50">
  <div class="max-w-6xl mx-auto px-6">
    <h1 class="text-4xl font-bold text-center mb-12 text-gray-800">Community Listings</h1>

    <!-- Lost & Found -->
    <div class="mb-12">
      <h2 class="text-3xl font-semibold mb-6 text-blue-600">Lost & Found</h2>
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        include '../app/config/database.php';
        $stmt = $pdo->prepare("SELECT * FROM listings WHERE type = 'lost_found' ORDER BY id DESC");
        $stmt->execute();
        $listings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($listings)) {
          echo '<p class="text-gray-600">No listings yet. Be the first to submit!</p>';
        } else {
          foreach ($listings as $listing) {
            echo '<div class="bg-white p-4 rounded-lg shadow-lg mb-4 flex">';
            echo '<div class="flex flex-col items-center mr-4">';
            echo '<button class="upvote-btn text-gray-400 hover:text-orange-500 text-lg" onclick="vote(this, 1)">▲</button>';
            echo '<span class="vote-count text-sm font-bold">0</span>';
            echo '<button class="downvote-btn text-gray-400 hover:text-blue-500 text-lg" onclick="vote(this, -1)">▼</button>';
            echo '</div>';
            echo '<div class="flex-1">';
            echo '<img src="https://via.placeholder.com/100x60?text=Img" alt="Evidence" class="float-right ml-4 mb-2 w-24 h-16 object-cover rounded">';
            echo '<h3 class="text-lg font-semibold mb-1">' . htmlspecialchars($listing['title']) . '</h3>';
            echo '<p class="text-gray-600 text-sm mb-2">' . htmlspecialchars(substr($listing['description'], 0, 150)) . '...</p>';
            echo '<p class="text-xs text-gray-500 mb-1">Location: ' . htmlspecialchars($listing['location']) . ' | Status: ' . htmlspecialchars($listing['status']) . '</p>';
            echo '<div class="flex items-center space-x-4 text-xs text-gray-500">';
            echo '<span>Views: <span class="view-count">42</span></span>';
            echo '<button class="donate-btn text-blue-500 hover:underline" onclick="window.location.href=\'donations.php\'">Donate</button>';
            echo '<div class="flex space-x-1">';
            echo '<button class="social-btn text-blue-600" onclick="share(\'facebook\', \'' . htmlspecialchars($listing['title']) . '\')">FB</button>';
            echo '<button class="social-btn text-blue-400" onclick="share(\'twitter\', \'' . htmlspecialchars($listing['title']) . '\')">TW</button>';
            echo '<button class="social-btn text-green-500" onclick="share(\'whatsapp\', \'' . htmlspecialchars($listing['title']) . '\')">WA</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
        }
        ?>
      </div>
    </div>

    <!-- Consumer Protection -->
    <div class="mb-12">
      <h2 class="text-3xl font-semibold mb-6 text-green-600">Consumer Protection Reports</h2>
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        $stmt = $pdo->prepare("SELECT * FROM listings WHERE type = 'consumer' ORDER BY id DESC");
        $stmt->execute();
        $listings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($listings)) {
          echo '<p class="text-gray-600">No reports yet. Be the first to report!</p>';
        } else {
          foreach ($listings as $listing) {
            echo '<div class="bg-white p-4 rounded-lg shadow-lg mb-4 flex">';
            echo '<div class="flex flex-col items-center mr-4">';
            echo '<button class="upvote-btn text-gray-400 hover:text-orange-500 text-lg" onclick="vote(this, 1)">▲</button>';
            echo '<span class="vote-count text-sm font-bold">0</span>';
            echo '<button class="downvote-btn text-gray-400 hover:text-blue-500 text-lg" onclick="vote(this, -1)">▼</button>';
            echo '</div>';
            echo '<div class="flex-1">';
            echo '<img src="https://via.placeholder.com/100x60?text=Img" alt="Evidence" class="float-right ml-4 mb-2 w-24 h-16 object-cover rounded">';
            echo '<h3 class="text-lg font-semibold mb-1">' . htmlspecialchars($listing['title']) . '</h3>';
            echo '<p class="text-gray-600 text-sm mb-2">' . htmlspecialchars(substr($listing['description'], 0, 150)) . '...</p>';
            echo '<p class="text-xs text-gray-500 mb-1">Location: ' . htmlspecialchars($listing['location']) . ' | Status: ' . htmlspecialchars($listing['status']) . '</p>';
            echo '<div class="flex items-center space-x-4 text-xs text-gray-500">';
            echo '<span>Views: <span class="view-count">67</span></span>';
            echo '<button class="donate-btn text-blue-500 hover:underline" onclick="window.location.href=\'donations.php\'">Donate</button>';
            echo '<div class="flex space-x-1">';
            echo '<button class="social-btn text-blue-600" onclick="share(\'facebook\', \'' . htmlspecialchars($listing['title']) . '\')">FB</button>';
            echo '<button class="social-btn text-blue-400" onclick="share(\'twitter\', \'' . htmlspecialchars($listing['title']) . '\')">TW</button>';
            echo '<button class="social-btn text-green-500" onclick="share(\'whatsapp\', \'' . htmlspecialchars($listing['title']) . '\')">WA</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
        }
        ?>
      </div>
    </div>

    <!-- Scam Reports -->
    <div class="mb-12">
      <h2 class="text-3xl font-semibold mb-6 text-red-600">Scam Alerts</h2>
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        $stmt = $pdo->prepare("SELECT * FROM listings WHERE type = 'scam' ORDER BY id DESC");
        $stmt->execute();
        $listings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($listings)) {
          echo '<p class="text-gray-600">No alerts yet. Be the first to report a scam!</p>';
        } else {
          foreach ($listings as $listing) {
            echo '<div class="bg-white p-4 rounded-lg shadow-lg mb-4 flex border-l-4 border-red-500">';
            echo '<div class="flex flex-col items-center mr-4">';
            echo '<button class="upvote-btn text-gray-400 hover:text-orange-500 text-lg" onclick="vote(this, 1)">▲</button>';
            echo '<span class="vote-count text-sm font-bold">0</span>';
            echo '<button class="downvote-btn text-gray-400 hover:text-blue-500 text-lg" onclick="vote(this, -1)">▼</button>';
            echo '</div>';
            echo '<div class="flex-1">';
            echo '<img src="https://via.placeholder.com/100x60?text=Img" alt="Evidence" class="float-right ml-4 mb-2 w-24 h-16 object-cover rounded">';
            echo '<h3 class="text-lg font-semibold mb-1">' . htmlspecialchars($listing['title']) . '</h3>';
            echo '<p class="text-gray-600 text-sm mb-2">' . htmlspecialchars(substr($listing['description'], 0, 150)) . '...</p>';
            echo '<p class="text-xs text-gray-500 mb-1">Location: ' . htmlspecialchars($listing['location']) . ' | Status: ' . htmlspecialchars($listing['status']) . '</p>';
            echo '<div class="flex items-center space-x-4 text-xs text-gray-500">';
            echo '<span>Views: <span class="view-count">123</span></span>';
            echo '<button class="donate-btn text-blue-500 hover:underline" onclick="window.location.href=\'donations.php\'">Donate</button>';
            echo '<div class="flex space-x-1">';
            echo '<button class="social-btn text-blue-600" onclick="share(\'facebook\', \'' . htmlspecialchars($listing['title']) . '\')">FB</button>';
            echo '<button class="social-btn text-blue-400" onclick="share(\'twitter\', \'' . htmlspecialchars($listing['title']) . '\')">TW</button>';
            echo '<button class="social-btn text-green-500" onclick="share(\'whatsapp\', \'' . htmlspecialchars($listing['title']) . '\')">WA</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
        }
        ?>
      </div>
    </div>

    <!-- Report Submission Form -->
    <div id="report-form" class="mt-16 bg-white p-8 rounded-lg shadow-lg">
      <h2 class="text-3xl font-semibold mb-6 text-center text-gray-800">Submit a Report</h2>

      <form method="post" enctype="multipart/form-data" class="space-y-6">
        <div>
          <label class="block text-gray-700 font-semibold mb-2">Report Type</label>
          <select name="type" id="report-type" class="w-full px-4 py-2 border rounded-lg" required>
            <option value="">Select Type</option>
            <option value="lost_found">Lost & Found</option>
            <option value="scam">Scam Alert</option>
            <option value="consumer">Consumer Protection</option>
          </select>
        </div>

        <!-- Lost & Found Fields -->
        <div id="lost-found-fields" class="hidden space-y-4">
          <div>
            <label class="block text-gray-700 font-semibold mb-2">Item Name</label>
            <input type="text" name="item_name" class="w-full px-4 py-2 border rounded-lg">
          </div>
          <div>
            <label class="block text-gray-700 font-semibold mb-2">Description</label>
            <textarea name="description" rows="3" class="w-full px-4 py-2 border rounded-lg"></textarea>
          </div>
          <div>
            <label class="block text-gray-700 font-semibold mb-2">Location</label>
            <input type="text" name="location" class="w-full px-4 py-2 border rounded-lg" required>
          </div>
          <div>
            <label class="block text-gray-700 font-semibold mb-2">Contact Address</label>
            <input type="text" name="contact" class="w-full px-4 py-2 border rounded-lg" required>
          </div>
          <div>
            <label class="block text-gray-700 font-semibold mb-2">Images (up to 3)</label>
            <input type="file" name="images[]" multiple accept="image/*" class="w-full px-4 py-2 border rounded-lg">
          </div>
        </div>

        <!-- Scam Fields -->
        <div id="scam-fields" class="hidden space-y-4">
          <div>
            <label class="block text-gray-700 font-semibold mb-2">Brand/Company Name</label>
            <input type="text" name="brand_name" class="w-full px-4 py-2 border rounded-lg" required>
          </div>
          <div>
            <label class="block text-gray-700 font-semibold mb-2">Website/Social Media Link</label>
            <input type="url" name="link" class="w-full px-4 py-2 border rounded-lg">
          </div>
          <div>
            <label class="block text-gray-700 font-semibold mb-2">Description</label>
            <textarea name="description" rows="3" class="w-full px-4 py-2 border rounded-lg" required></textarea>
          </div>
          <div>
            <label class="block text-gray-700 font-semibold mb-2">Screenshot (Optional)</label>
            <input type="file" name="screenshot" accept="image/*" class="w-full px-4 py-2 border rounded-lg">
          </div>
        </div>

        <!-- Consumer Protection Fields -->
        <div id="consumer-fields" class="hidden space-y-4">
          <div>
            <label class="block text-gray-700 font-semibold mb-2">Brand/Product Name</label>
            <input type="text" name="brand_name" class="w-full px-4 py-2 border rounded-lg" required>
          </div>
          <div>
            <label class="block text-gray-700 font-semibold mb-2">Price (if applicable)</label>
            <input type="number" name="price" step="0.01" class="w-full px-4 py-2 border rounded-lg">
          </div>
          <div>
            <label class="block text-gray-700 font-semibold mb-2">Short Description</label>
            <textarea name="description" rows="3" class="w-full px-4 py-2 border rounded-lg" required></textarea>
          </div>
          <div>
            <label class="block text-gray-700 font-semibold mb-2">Images</label>
            <input type="file" name="images[]" multiple accept="image/*" class="w-full px-4 py-2 border rounded-lg">
          </div>
          <div>
            <label class="block text-gray-700 font-semibold mb-2">Social Media Posts (Optional)</label>
            <input type="url" name="social_links" placeholder="Links to social media posts" class="w-full px-4 py-2 border rounded-lg">
          </div>
        </div>

        <div class="text-center">
          <button type="submit" name="submit_report" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700">Submit Report</button>
        </div>
      </form>
    </div>

    <div class="text-center mt-8">
      <p class="text-gray-600 mb-4">Want to contribute to the community?</p>
      <a href="#report-form" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700">Submit a Report</a>
    </div>
  </div>
</section>

<script>
function vote(button, delta) {
  const countSpan = button.querySelector('.vote-count');
  let count = parseInt(countSpan.textContent);
  count += delta;
  countSpan.textContent = count;
  button.disabled = true; // Prevent multiple votes
}

function share(platform, title) {
  const url = window.location.href;
  let shareUrl = '';
  switch(platform) {
    case 'facebook':
      shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
      break;
    case 'twitter':
      shareUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(title)}&url=${encodeURIComponent(url)}`;
      break;
    case 'whatsapp':
      shareUrl = `https://wa.me/?text=${encodeURIComponent(title + ' ' + url)}`;
      break;
  }
  window.open(shareUrl, '_blank');
}


  document.getElementById('report-type').addEventListener('change', function() {
    const type = this.value;
    document.getElementById('lost-found-fields').classList.toggle('hidden', type !== 'lost_found');
    document.getElementById('scam-fields').classList.toggle('hidden', type !== 'scam');
    document.getElementById('consumer-fields').classList.toggle('hidden', type !== 'consumer');
  });
</script>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_report'])) {
  include '../app/config/database.php';
  if (session_status() === PHP_SESSION_NONE) session_start();

  // Create table if not exists
  $pdo->exec("CREATE TABLE IF NOT EXISTS listings (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER,
    type TEXT,
    title TEXT,
    description TEXT,
    location TEXT,
    price REAL,
    status TEXT DEFAULT 'reported',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
  )");

  $pdo->exec("CREATE TABLE IF NOT EXISTS evidence (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    listing_id INTEGER,
    file_path TEXT,
    FOREIGN KEY (listing_id) REFERENCES listings(id)
  )");

  $user_id = $_SESSION['user']['id'] ?? null;
  $type = $_POST['type'];
  $title = $_POST['item_name'] ?? $_POST['brand_name'] ?? 'Report';
  $description = $_POST['description'];
  $location = $_POST['location'] ?? '';
  $price = $_POST['price'] ?? null;

  $stmt = $pdo->prepare("INSERT INTO listings (user_id, type, title, description, location, price, status) VALUES (?, ?, ?, ?, ?, ?, 'reported')");
  $stmt->execute([$user_id, $type, $title, $description, $location, $price]);
  $listing_id = $pdo->lastInsertId();

  // Handle file uploads
  $evidenceDir = "../storage/evidence/";
  if (!is_dir($evidenceDir)) {
    mkdir($evidenceDir, 0755, true);
  }

  if (!empty($_FILES['images']['name'][0])) {
    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
      if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
        $path = $evidenceDir . uniqid() . ".jpg";
        move_uploaded_file($tmp_name, $path);
        $pdo->prepare("INSERT INTO evidence (listing_id, file_path) VALUES (?, ?)")->execute([$listing_id, $path]);
      }
    }
  }

  if (!empty($_FILES['screenshot']['name'])) {
    $path = $evidenceDir . uniqid() . ".jpg";
    move_uploaded_file($_FILES['screenshot']['tmp_name'], $path);
    $pdo->prepare("INSERT INTO evidence (listing_id, file_path) VALUES (?, ?)")->execute([$listing_id, $path]);
  }

  header('Location: listings.php');
  exit;
}
?>

<?php include '../app/views/partials/footer.php'; ?>