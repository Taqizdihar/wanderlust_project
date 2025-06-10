<?php
// Data dummy - nanti bisa diganti dari $_SESSION, database, atau input sebelumnya
$namaLengkap = "Faiz Syafiq N";
$email = "faizsn@gmail.com";
$telepon = "081234567890";

// Data destinasi
$namaTempat = "Candi Borobudur";
$hargaTiket = 50000;
$jumlahTiket = 2;
$totalBayar = $hargaTiket * $jumlahTiket;
$tanggalKunjungan = date("Y-m-d");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konfirmasi Pembayaran</title>
  <link rel="stylesheet" href="cssPengguna/konfirmasiPembayaran.css">
</head>
<body>

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

  <h1 class="title">Konfirmasi Pembayaran</h1>

  <main class="main-grid">
    <form method="POST" action="prosesPembayaran.php" class="left-column">
      <div class="form-card">
        <h2>Informasi Wisatawan</h2>
        <input type="text" name="nama" value="<?= $namaLengkap ?>" required>
        <input type="email" name="email" value="<?= $email ?>" required>
        <input type="tel" name="telepon" value="<?= $telepon ?>" required>
      </div>

      <div class="form-card">
        <h2>Detail Tiket</h2>
        <p>Harga Tiket: <strong>Rp.<?= number_format($hargaTiket, 0, ',', '.') ?></strong></p>
        <p>Jumlah Tiket: <strong><?= $jumlahTiket ?></strong></p>
        <p>Total: <strong>Rp.<?= number_format($totalBayar, 0, ',', '.') ?></strong></p>
        <input type="date" name="tanggal" value="<?= $tanggalKunjungan ?>" required>
      </div>

      <div class="form-card">
        <label>
          <input type="checkbox" required> Saya setuju dengan <a href="#">syarat & ketentuan</a>
        </label>
        <input type="hidden" name="total_bayar" value="<?= $totalBayar ?>">
        <button type="submit">Bayar Sekarang</button>
      </div>
    </form>

    <div class="right-column">
      <div class="form-card place-info">
        <img src="../Umum/Images/Borobudur Temple.jpg" alt="<?= $namaTempat ?>" class="place-img">
        <h3><?= $namaTempat ?></h3>
        <p>Tempat wisata bersejarah dengan panorama menakjubkan.</p>
      </div>
    </div>
  </main>

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