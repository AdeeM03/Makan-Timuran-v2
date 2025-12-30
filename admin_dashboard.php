<?php
session_start();
require "get_user.php";

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: index.php");
    exit;
}

$totalPlaces = $pdo->query("SELECT COUNT(*) FROM places")->fetchColumn();
$totalUsers = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();

$places = $pdo->query("
    SELECT id, name, city, specialty 
    FROM places 
    ORDER BY id DESC
")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php include "header.php"; ?>

    <section class="container">
        <h1>Admin Dashboard</h1>
        <p>Selamat datang, <strong><?= htmlspecialchars($_SESSION["username"]) ?></strong></p>
    </section>

    <section class="container"
        style="display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:20px;">

        <div class="menu-item">
            <div class="menu-info">
                <h3>Total Users</h3>
                <p><?= $totalUsers ?> Member Terdaftar</p>
            </div>
        </div>

        <div class="menu-item">
            <div class="menu-info">
                <h3>Tempat</h3>
                <p><?= $totalPlaces ?> List Tempat Makan</p>
            </div>
        </div>

        <div class="menu-item">
            <div class="menu-info">
                <h3>Users Online</h3>
                <p id="online-count">Loading...</p>
            </div>
        </div>

    </section>

    <section class="container">
        <h3>Realtime User Monitoring</h3>
        <ul id="admin-online-list"></ul>
    </section>

    <section class="container">
        <h2>Manage Places</h2>

        <div style="overflow-x:auto;">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>City</th>
                        <th>Specialty</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if (empty($places)): ?>
                        <tr>
                            <td colspan="4">No places available</td>
                        </tr>
                    <?php endif; ?>

                    <?php foreach ($places as $p): ?>
                        <tr>
                            <td><?= htmlspecialchars($p["name"]) ?></td>
                            <td><?= htmlspecialchars($p["city"]) ?></td>
                            <td><?= htmlspecialchars($p["specialty"]) ?></td>
                            <td>
                                <div class="admin-actions">
                                    <a class="cta-btn" href="/UTS%20WEB/update_places.php?id=<?= $p['id'] ?>">
                                        Edit
                                    </a>
                                    <a class="cta-btn delete-btn" href="/UTS%20WEB/delete_places.php?id=<?= $p['id'] ?>"
                                        onclick="return confirm('Are you sure you want to delete this place?')">
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </section>
    <script src="admin_online.js"></script>

</body>

</html>
