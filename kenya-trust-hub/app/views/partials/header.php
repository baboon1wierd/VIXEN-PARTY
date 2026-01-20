<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Kenya Trust & Alert Hub</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Basic styling (replace later) -->
  <style>
    body { margin:0; font-family: Arial, sans-serif; background:#f7f7f7; }
    header { background:#0f172a; color:#fff; }
    nav { max-width:1400px; margin:auto; display:flex; align-items:center; justify-content:space-between; padding:14px; }
    nav a { color:#fff; margin-right:15px; text-decoration:none; font-size:14px; }
    nav a:hover { text-decoration:underline; }
    .nav-left, .nav-right { display:flex; align-items:center; }
    .nav-center { flex:1; max-width:400px; margin:0 20px; }
    .search-form { display:flex; width:100%; }
    .search-form input { flex:1; padding:8px 12px; border:none; border-radius:20px 0 0 20px; outline:none; font-size:14px; }
    .search-form button { background:#667eea; color:#fff; border:none; padding:8px 15px; border-radius:0 20px 20px 0; cursor:pointer; }
    .search-form button:hover { background:#5a6fd8; }
    .badge { background:#dc2626; padding:3px 6px; font-size:11px; border-radius:6px; margin-left:6px; }
    main { max-width:1400px; margin:auto; padding:20px; }
  </style>
</head>
<body class="bg-gray-50 text-gray-900">

<header>
  <?php include __DIR__ . '/nav.php'; ?>
</header>

<main>