<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rekomendasi Makanan Jawa Timur</title>
  <link rel="stylesheet" href="styles.css">
  <script src="rekom_script.js" defer></script>
</head>

<body>
<?php include "header.php"; ?>

  <section class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-text container">
      <h1>Rekomendasi Makanan Tradisional Jawa Timur</h1>
      <p>Dan daftar tempat makan otentik dari berbagai kota.</p>
    </div>
  </section>

  <section class="container">
    <h2>Daftar Tempat Makan Yang Kami Rekomendasikan </h2>

    <div id="places-grid" class="grid-menu"></div>

    <div id="place-detail" style="display:none; margin-top:30px;"></div>
  </section>

  <section>
    <?php if (isset($_SESSION["role"]) && $_SESSION["role"] === "admin"): ?>
    
      <section class="container">
        <h2>Tambah Tempat Rekomendasi (Admin)</h2>
    
        <form class="contact-form" method="POST" action="add_place.php">
          <input type="text" name="name" placeholder="Nama Tempat" required>
          <input type="text" name="city" placeholder="Kota" required>
          <input type="text" name="specialty" placeholder="Spesialis Makanan" required>
          <input type="text" name="address" placeholder="Alamat" required>
          <input type="text" name="hours" placeholder="Jam Buka">
          <input type="text" name="phone" placeholder="Telepon">
          <input type="text" name="image" placeholder="URL Gambar">
          <button class="cta-btn">Tambah Tempat</button>
        </form>
      </section>
    
    <?php endif; ?>
  </section>

  <footer class="site-footer">
    <div class="container">
      <p>© 2025 Makan Timuran. Semua hak cipta dilindungi.</p>
    </div>
  </footer>
  
</body>
</html>
