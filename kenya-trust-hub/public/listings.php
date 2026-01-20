<?php include '../app/views/partials/header.php'; ?>

<section class="py-16 bg-gray-50">
  <div class="max-w-6xl mx-auto px-6">
    <h1 class="text-4xl font-bold text-center mb-12 text-gray-800">Community Listings</h1>

    <!-- Lost & Found -->
    <div class="mb-12">
      <h2 class="text-3xl font-semibold mb-6 text-blue-600">Lost & Found</h2>
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-semibold mb-2">Lost iPhone 12</h3>
          <p class="text-gray-600 mb-2">Black iPhone 12 lost in Westlands, Nairobi. Reward offered.</p>
          <p class="text-sm text-gray-500">Location: Westlands, Nairobi</p>
          <p class="text-sm text-green-600 mt-2">Status: Lost</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-semibold mb-2">Found Wallet</h3>
          <p class="text-gray-600 mb-2">Brown leather wallet found containing ID and cash. Owner please contact.</p>
          <p class="text-sm text-gray-500">Location: CBD, Nairobi</p>
          <p class="text-sm text-blue-600 mt-2">Status: Found</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-semibold mb-2">Lost Laptop</h3>
          <p class="text-gray-600 mb-2">Silver MacBook Pro lost at University of Nairobi. Contains important files.</p>
          <p class="text-sm text-gray-500">Location: University of Nairobi</p>
          <p class="text-sm text-green-600 mt-2">Status: Lost</p>
        </div>
      </div>
    </div>

    <!-- Consumer Protection -->
    <div class="mb-12">
      <h2 class="text-3xl font-semibold mb-6 text-green-600">Consumer Protection Reports</h2>
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-semibold mb-2">Fake Electronics Shop</h3>
          <p class="text-gray-600 mb-2">Shop in River Road selling counterfeit phones. Multiple complaints of faulty products.</p>
          <p class="text-sm text-gray-500">Location: River Road, Nairobi</p>
          <p class="text-sm text-red-600 mt-2">Risk: High</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-semibold mb-2">Overpriced Groceries</h3>
          <p class="text-gray-600 mb-2">Supermarket charging 3x normal prices for basic items. Avoid this location.</p>
          <p class="text-sm text-gray-500">Location: Eastlands, Nairobi</p>
          <p class="text-sm text-orange-600 mt-2">Risk: Medium</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-semibold mb-2">Excellent Service - QuickMart</h3>
          <p class="text-gray-600 mb-2">Great customer service and fair prices. Highly recommended for daily shopping.</p>
          <p class="text-sm text-gray-500">Location: Karen, Nairobi</p>
          <p class="text-sm text-green-600 mt-2">Rating: Excellent</p>
        </div>
      </div>
    </div>

    <!-- Scam Reports -->
    <div class="mb-12">
      <h2 class="text-3xl font-semibold mb-6 text-red-600">Scam Alerts</h2>
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-lg border-l-4 border-red-500">
          <h3 class="text-xl font-semibold mb-2">Job Scam - Fake Employment Agency</h3>
          <p class="text-gray-600 mb-2">Agency promising high-paying jobs but requiring upfront fees. Multiple victims reported.</p>
          <p class="text-sm text-gray-500">Location: Online/Email</p>
          <p class="text-sm text-red-600 mt-2">Scam Type: Employment</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg border-l-4 border-red-500">
          <h3 class="text-xl font-semibold mb-2">Landlord Scam</h3>
          <p class="text-gray-600 mb-2">Fake landlord advertising non-existent apartments and collecting deposits.</p>
          <p class="text-sm text-gray-500">Location: Westlands, Nairobi</p>
          <p class="text-sm text-red-600 mt-2">Scam Type: Rental</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg border-l-4 border-red-500">
          <h3 class="text-xl font-semibold mb-2">Online Shopping Fraud</h3>
          <p class="text-gray-600 mb-2">Website selling electronics but never delivering. Refunds not processed.</p>
          <p class="text-sm text-gray-500">Location: Online</p>
          <p class="text-sm text-red-600 mt-2">Scam Type: E-commerce</p>
        </div>
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
  if (!empty($_FILES['images']['name'][0])) {
    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
      if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
        $path = "../storage/evidence/" . uniqid() . ".jpg";
        move_uploaded_file($tmp_name, $path);
        $pdo->prepare("INSERT INTO evidence (listing_id, file_path) VALUES (?, ?)")->execute([$listing_id, $path]);
      }
    }
  }

  if (!empty($_FILES['screenshot']['name'])) {
    $path = "../storage/evidence/" . uniqid() . ".jpg";
    move_uploaded_file($_FILES['screenshot']['tmp_name'], $path);
    $pdo->prepare("INSERT INTO evidence (listing_id, file_path) VALUES (?, ?)")->execute([$listing_id, $path]);
  }

  echo "<script>alert('Report submitted successfully!');</script>";
}
?>

<?php include '../app/views/partials/footer.php'; ?>