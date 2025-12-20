<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "get_user.php";
if (isset($_SESSION["user_id"])) {
    $pdo->prepare("
        UPDATE user_sessions
        SET last_activity = NOW(), is_active = 1
        WHERE user_id = ?
    ")->execute([$_SESSION["user_id"]]);
}
?>

<header class="site-header">
  <div class="container header-content">

    <div class="logo">
      Makan <span>Timuran</span>
    </div>

    <nav class="main-nav">

  <ul class="nav-left">
    <li><a href="index.php">Beranda</a></li>
    <li><a href="tentang.php">Tentang</a></li>
    <li><a href="menu.php">Menu</a></li>
    <li><a href="galeri.php">Galeri</a></li>
    <li><a href="cerita.php">Cerita</a></li>
    <li><a href="contact.php">Kontak</a></li>
    <li><a href="rekomendasi.php">Rekomendasi</a></li>
  </ul>

  <ul class="nav-right">
    <?php if (isset($_SESSION['user_id'])): ?>
    
                <?php if (isset($_SESSION["role"]) && $_SESSION["role"] === "admin"): ?>
                    <li>
                        <a href="admin_dashboard.php" class="admin-link">Dashboard</a>
                    </li>
                <?php endif; ?>
    
                <li class="username">👤 <?= $_SESSION['username']; ?></li>
                <li><a href="logout.php" class="logout">Logout</a></li>
    
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    
    </nav>


    </div>
</header>