<?php
require "get_user.php"; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("
        INSERT INTO places
        (name, city, specialty, address, hours, phone, image)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->execute([
        $_POST["name"],
        $_POST["city"],
        $_POST["specialty"],
        $_POST["address"],
        $_POST["hours"],
        $_POST["phone"],
        $_POST["image"]
    ]);

    header("Location: rekomendasi.php");
    exit;
}
