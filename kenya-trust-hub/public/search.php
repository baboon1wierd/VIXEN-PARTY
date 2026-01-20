<?php
include '../app/config/database.php';
$results = [];
if (isset($_GET['q'])) {
  $query = '%' . $_GET['q'] . '%';
  $stmt = $pdo->prepare("SELECT * FROM listings WHERE title LIKE ? OR description LIKE ? AND status = 'verified'");
  $stmt->execute([$query, $query]);
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<?php include '../app/views/partials/header.php'; ?>

<h2>Search</h2>
<form method="get">
  <input name="q" placeholder="Search listings..." value="<?php echo htmlspecialchars($_GET['q'] ?? ''); ?>">
  <button>Search</button>
</form>

<?php foreach ($results as $result): ?>
  <div>
    <h3><?php echo htmlspecialchars($result['title']); ?></h3>
    <p><?php echo htmlspecialchars($result['description']); ?></p>
  </div>
<?php endforeach; ?>

<?php include '../app/views/partials/footer.php'; ?>