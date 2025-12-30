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

$stmt = $pdo->prepare("SELECT * FROM places WHERE id = ?");
$stmt->execute([$id]);
$place = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$place) {
    header("Location: admin_dashboard.php");
    exit;
}

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $city = trim($_POST['city']);
    $specialty = trim($_POST['specialty']);
    $address = trim($_POST['address']);
    $hours = trim($_POST['hours']);
    $phone = trim($_POST['phone']);
    $image = trim($_POST['image']);

    if ($name === '' || $city === '' || $specialty === '') {
        $error = "Name, City and Specialty are required.";
    } else {
        $upd = $pdo->prepare("
            UPDATE places
            SET name = ?, city = ?, specialty = ?, address = ?, hours = ?, phone = ?, image = ?
            WHERE id = ?
        ");
        $upd->execute([
            $name,
            $city,
            $specialty,
            $address,
            $hours,
            $phone,
            $image,
            $id
        ]);

        header("Location: admin_dashboard.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edit Place</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include "header.php"; ?>

    <section class="container">
        <h1>Edit Place</h1>

        <?php if ($error): ?>
            <p style="color:red"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form method="POST" class="admin-form">
            <input type="text" name="name" placeholder="Place Name" value="<?= htmlspecialchars($place['name']) ?>"
                required>
            <input type="text" name="city" placeholder="City" value="<?= htmlspecialchars($place['city']) ?>" required>
            <input type="text" name="specialty" placeholder="Specialty"
                value="<?= htmlspecialchars($place['specialty']) ?>" required>
            <input type="text" name="address" placeholder="Address" value="<?= htmlspecialchars($place['address']) ?>">
            <input type="text" name="hours" placeholder="Opening Hours"
                value="<?= htmlspecialchars($place['hours']) ?>">
            <input type="text" name="phone" placeholder="Phone" value="<?= htmlspecialchars($place['phone']) ?>">
            <input type="text" name="image" placeholder="Image URL" value="<?= htmlspecialchars($place['image']) ?>">
            <div style="margin-top:10px;">
                <button class="cta-btn" type="submit">Save Changes</button>
                <a class="cta-btn" href="admin_dashboard.php" style="background:#bbb; margin-left:8px;">Cancel</a>
            </div>
        </form>
    </section>
</body>

</html>