<?php
session_start();
$namaDestinasi = $_SESSION['destinasi'] ?? 'Tujuan Wisata';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pembayaran Berhasil</title>
  <link rel="stylesheet" href="cssPengguna/pembayaranBerhasil.css">
</head>
<body>

  <!-- Header -->
  <header class="header">
    <div class="header-left">
      <img src="logo.png" alt="Logo" class="logo-img">
      <span class="logo-text">WisataKu</span>
    </div>
    <div class="header-center">
      <input type="text" class="search-bar" placeholder="Cari destinasi...">
    </div>
    <div class="header-right">
      <nav>
        <a href="beranda.php">Beranda</a>
        <a href="tiketSaya.php">Tiket Saya</a>
        <a href="logout.php">Keluar</a>
      </nav>
      <img src="profile.jpg" alt="Profil" class="profile-img">
    </div>
  </header>

  <!-- Konten Utama -->
  <div class="container">
    <h1 class="title">Payment Successfull!</h1>

    <div class="success-ticket">
      <div class="ticket-shape">
        <h2 class="ticket-title">Tiket to <span class="destination"><?= htmlspecialchars($namaDestinasi) ?></span></h2>
        <p class="ticket-text">telah berhasil dibayar.</p>
        <div class="button-group">
          <a href="tiketSaya.php" class="btn-primary">Lihat Tiket</a>
          <a href="beranda.php" class="btn-secondary">Kembali ke Beranda</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer-top">
      <div class="footer-left">
        <div class="footer-logo">
          <img src="logo.png" alt="Logo" class="logo-img">
          <span class="logo-text">WisataKu</span>
        </div>
      </div>
      <div class="footer-links">
        <a href="#">Tentang Kami</a>
        <a href="#">Kontak</a>
        <a href="#">Kebijakan</a>
        <a href="#">Bantuan</a>
        <a href="#">Syarat & Ketentuan</a>
        <a href="#">FAQ</a>
      </div>
    </div>
    <div class="footer-center">
      &copy; <?= date("Y") ?> WisataKu. Semua hak dilindungi undang-undang.
    </div>
  </footer>

</body>
</html>