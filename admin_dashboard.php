<?php
session_start();
require "get_user.php";

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: index.php");
    exit;
}

$totalPlaces = $pdo->query("SELECT COUNT(*) FROM places")->fetchColumn();
$totalUsers = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <script src="admin_online.js"></script>
</head>

<body>

    <?php include "header.php"; ?>

    <section class="container">
        <h1>Admin Dashboard</h1>
        <p>Selamat datang, <strong><?= $_SESSION["username"] ?></strong></p>
    </section>

    <section class="container"
        style="display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:20px;">

        <div class="menu-item">
            <div class="menu-info">
                <h3>Total User</h3>
                <p><?= $totalUsers ?> akun terdaftar</p>
            </div>
        </div>

        <div class="menu-item">
            <div class="menu-info">
                <h3>Tempat Rekomendasi</h3>
                <p><?= $totalPlaces ?> tempat</p>
                <a class="cta-btn" href="rekomendasi.php">Kelola</a>
            </div>
        </div>

        <div class="menu-item">
            <div class="menu-info">
                <h3>User Online</h3>
                <p id="online-count">Memuat...</p>
            </div>
        </div>

    </section>

    <section class="container">
        <h3>Monitoring User Online</h3>
        <ul id="admin-online-list"></ul>
    </section>

    <script src="admin-online.js"></script>

</body>

</html>