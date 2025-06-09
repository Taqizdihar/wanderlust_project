<?php
$saldo = 0;
$riwayat = "Terakhir digunakan untuk memesan tiket ke Trans Studio Bandung pada 5 Mei 2025.";
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Saldo | Wanderlust</title>
  <link rel="stylesheet" href="cssPengguna/Saldo.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
<header class="main-header">
        <div class="logo-container">
            <img src="../Umum/photos/Wanderlust Logo Plain.png" alt="Wanderlust Logo" class="logo">
            <div class="logo-text">
                <div class="title">Wanderlust</div>
                <div class="subtitle">WANDERINGS FOR WONDERS</div>
            </div>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
            <span class="search-icon"></span>
        </div>
        <nav class="nav-links">
            <a href="#">Opsi 1</a>
            <a href="#">Opsi 2</a>
            <a href="#">Favorit</a>
            <div class="profile-icon">👤</div>
        </nav>
    </header>

  <div class="container">
    <div class="header">
      <img src="Umum/photos/Wanderlust Logo Plain.png" alt="Wanderlust Icon">
      <div>
        <h1>Wanderlust</h1>
        <p class="subtitle">Cek Saldo Dompet Wisatamu!</p>
      </div>
    </div>

    <div class="balance-info">
      <span>Saldo Anda:</span>
      <strong>Rp <?= number_format($saldo, 0, ',', '.') ?></strong>
    </div>

    <div class="tabs">
      <div class="tab active">Riwayat</div>
      <div class="tab">Top Up</div>
      <div class="tab">Pengaturan</div>
    </div>

    <div class="tab-content">
      <?= htmlspecialchars($riwayat) ?>
    </div>
  </div>
  <footer>
  <div class="footer-container">
    <div class="footer-logo">
      <img src="../Umum/photos/Wanderlust Logo Plain.png" height="70" width="70" alt="Wanderlust Logo"/>
      <div>
        <h5>Wanderlust <span style="display: block; font: 15px 'Concert One', sans-serif;">WANDERINGS FOR WONDERS</span></h5>
      </div>
    </div>
    <div class="footbar">
      <table>
        <tr>
          <td><a href="AboutUs.php">Tentang Kami</a></td>
          <td><a href="Komunitas.php">Komunitas</a></td>
          <td><a href="Profil.php">Profil</a></td>
        </tr>
        <tr>
          <td><a href="ContactUs.php">Kontak Kami</a></td>
          <td><a href="Tips.php">Tips & Trick</a></td>
          <td><a href="Agenda.php">Agenda</a></td>
        </tr>
        <tr>
          <td><a href="FAQs.php">FAQs</a></td>
          <td><a href="Promo.php">Promo</a></td>
          <td><a href="Home.php">Home</a></td>
        </tr>
      </table>
    </div>
  </div>
  <p>Copyright © 2025 Wanderlust. All rights reserved</p>
</footer>

</body>
</html>