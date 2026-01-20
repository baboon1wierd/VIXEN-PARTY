<nav>

  <!-- LEFT SIDE -->
  <div class="nav-left">
    <a href="/index.php"><strong>TrustHub KE</strong></a>

    <a href="/listings.php">Listings</a>

    <a href="/listings.php#report-form">
      Report
      <span class="badge">Alert</span>
    </a>

    <a href="/newsletter.php">Newsletter</a>
  </div>

  <!-- CENTER - SEARCH BAR -->
  <div class="nav-center">
    <form action="/search.php" method="get" class="search-form">
      <input type="text" name="q" placeholder="Search listings, scams, lost items..." autocomplete="off">
      <button type="submit">🔍</button>
    </form>
  </div>

  <!-- RIGHT SIDE -->
  <div class="nav-right">
    <?php if (isset($_SESSION['user'])): ?>

      <a href="/dashboard.php">Dashboard</a>
      <a href="/app/views/dashboard/my-reports.php">My Reports</a>
      <a href="/logout.php">Logout</a>

    <?php else: ?>

      <a href="/login.php">Login</a>
      <a href="/register.php">Register</a>

    <?php endif; ?>
  </div>

</nav>