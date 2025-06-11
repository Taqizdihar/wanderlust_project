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

<header class="header">
    <div class="header-left">
      <img src="logo.png" alt="Wanderlust Logo" class="logo-img">
      <div class="logo-text">Wanderlust</div>
    </div>
    <div class="header-center">
      <input type="text" class="search-bar" placeholder="Search" />
    </div>
    <nav class="header-right">
      <a href="#">Option 3</a>
      <a href="#">Option 2</a>
      <a href="#">Option 1</a>
      <img src="profile.jpg" alt="Profile" class="profile-img">
    </nav>
</header>

<body>
  <div class="page-wrapper">
    <h1 class="payment-success">Payment Successful!</h1>

    <div class="ticket-wrapper">
      <div class="ticket-card">
        <h2 class="ticket-message">
          Tickets to <span class="destination"><?= htmlspecialchars($namaDestinasi) ?></span>
        </h2>
        <p class="ticket-subtext">have been paid</p>

        <div class="button-group">
          <a href="tiketSaya.php" class="btn-primary">Lihat Tiket</a>
          <a href="beranda.php" class="btn-secondary">Beranda</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<footer class="footer">
    <div class="footer-top">
      <div class="footer-left">
        <div class="footer-logo">
          <img src="logo.png" alt="Wanderlust Logo" class="logo-img">
          <span class="logo-text">Wanderlust</span>
        </div>
      </div>
      <div class="footer-links">
        <a href="#">Tentang Kami</a>
        <a href="#">Kontak Kami</a>
        <a href="#">FAQs</a>
        <a href="#">Komunitas</a>
        <a href="#">Tips & Tik</a>
        <a href="#">Promo</a>
        <a href="#">Profil</a>
        <a href="#">Agenda</a>
        <a href="#">Home</a>
      </div>
    </div>
    <div class="footer-center">
      Copyright © 2025 Wanderlust. All rights reserved
    </div>
</footer>

</body>
</html>