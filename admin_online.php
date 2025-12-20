<?php
session_start();
require "get_user.php";

header("Content-Type: application/json");

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    echo json_encode([]);
    exit;
}

$sql = "
    SELECT u.username, MAX(us.last_activity) AS last_activity
    FROM user_sessions us
    JOIN users u ON us.user_id = u.id
    WHERE us.is_active = 1
    GROUP BY us.user_id
    ORDER BY last_activity DESC
";

$stmt = $pdo->query($sql);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
