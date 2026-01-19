<?php include '../partials/header.php'; ?>

<h2>Lost & Found Report</h2>

<form method="post" enctype="multipart/form-data">

  <input name="item" placeholder="Item name">

  <input name="location" placeholder="Location">

  <input type="file" name="evidence">

  <button>Submit</button>

</form>

<?php include '../partials/footer.php'; ?>