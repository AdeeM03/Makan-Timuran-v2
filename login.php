<?php
session_start();
require "get_user.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["role"] = $user["role"];

        $pdo->prepare("
            INSERT INTO user_sessions (user_id, last_activity, is_active)
            VALUES (?, NOW(), 1)
            ON DUPLICATE KEY UPDATE
                last_activity = NOW(),
                is_active = 1
        ")->execute([$user["id"]]);

        header("Location: index.php");
        exit;
    } else {
        $error = "Username atau password salah";
    }
}

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php include "header.php"; ?>

    <div class="contact-form">
        <h2>Login</h2>

        <?php if ($error): ?>
            <p style="color:red"><?= $error ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button class="cta-btn">Login</button>
        </form>

        <p style="margin-top:12px; font-size:14px;">
            Belum punya akun?
            <a href="register.php">Daftar di sini</a>
        </p>
    </div>

</body>

</html>