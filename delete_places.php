<?php
session_start();
require "get_user.php"; 

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: index.php");
    exit;
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: admin_dashboard.php");
    exit;
}
$id = (int) $_GET['id'];

$check = $pdo->prepare("SELECT id FROM places WHERE id = ?");
$check->execute([$id]);
if (!$check->fetch()) {
    header("Location: admin_dashboard.php");
    exit;
}

$pdo->prepare("DELETE FROM places WHERE id = ?")->execute([$id]);

header("Location: admin_dashboard.php");
exit;
