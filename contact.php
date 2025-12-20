<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kontak — Makan Timuran</title>
  <link rel="stylesheet" href="styles.css" />
  <script src="script.js" defer></script>
</head>

<body>

<?php include "header.php"; ?>

  <section class="container kontak">
    <h1>Hubungi Kami</h1>
    <p>Kami senang mendengar cerita dari Anda! Silakan kirim pesan, pertanyaan, atau saran melalui formulir di bawah ini.</p>

    <form class="contact-form" onsubmit="event.preventDefault(); showSuccessMessage();">
      <div class="form-group">
        <label for="name">Nama Lengkap</label>
        <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" required>
      </div>

      <div class="form-group">
        <label for="email">Alamat Email</label>
        <input type="email" id="email" name="email" placeholder="emailanda@example.com" required>
      </div>

      <div class="form-group">
        <label for="message">Pesan</label>
        <textarea id="message" name="message" rows="6" placeholder="Tulis pesan Anda di sini..." required></textarea>
      </div>

  <button type="submit" class="cta-btn">Kirim Pesan</button>

  <p class="success-msg" id="success-msg" style="display: none;">
    Pesan Anda telah berhasil dikirim. Terima kasih!
  </p>
    </form>

  <section class="kontak container">
    <h2>Kontak & Sosial Media</h2>
    <p>Email: info@makantimuran.com | Telepon: +62 812 3456 7890</p>
    <p>Instagram: @makantimuran | Facebook: Makan Timuran</p>
  </section>
    
  <footer class="site-footer">
    <div class="container">
      <p>© 2025 Makan Timuran. Semua hak cipta dilindungi.</p>
    </div>
  </footer>
</body>
</html>
