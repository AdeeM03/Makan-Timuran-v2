<?php
require "get_user.php";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    if (strlen($username) < 3) {
        $error = "Username minimal 3 karakter";
    } elseif (strlen($password) < 4) {
        $error = "Password minimal 4 karakter";
    } else {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username=?");
        $stmt->execute([$username]);

        if ($stmt->fetch()) {
            $error = "Username sudah digunakan";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $pdo->prepare("
                INSERT INTO users (username, password)
                VALUES (?, ?)
            ")->execute([$username, $hash]);

            $success = "Akun berhasil dibuat. Silakan login.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Akun</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php include "header.php"; ?>

    <div class="contact-form">
        <h2>Daftar Akun</h2>

        <?php if ($error): ?>
            <p style="color:red"><?= $error ?></p>
        <?php endif; ?>

        <?php if ($success): ?>
            <p style="color:green"><?= $success ?></p>
            <a href="login.php">Login sekarang</a>
        <?php else: ?>
            <form method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button class="cta-btn">Daftar</button>
            </form>
        <?php endif; ?>
    </div>

</body>

</html>
