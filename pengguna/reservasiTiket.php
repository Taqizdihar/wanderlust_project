<?php
$nama = "";
$email = "";
$telepon = "";
$tiket = 0;
$tanggal = "";
$harga_per_tiket = 50000;

$saldo = 200000;
$total_bayar = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $tiket = (int)$_POST['jumlah_tiket'];
    $tanggal = $_POST['tanggal'];

    $total_bayar = $harga_per_tiket * $tiket;
    if ($saldo >= $total_bayar) {
        $saldo -= $total_bayar;
        $pesan_sukses = "Tiket berhasil dipesan!";
    } else {
        $pesan_error = "Saldo tidak mencukupi.";
    }
}

$nama = $nama ?: "Faiz Syafiq N";
$email = $email ?: "faizsn@gmail.com";
$telepon = $telepon ?: "081234567890";
$tiket = $tiket ?: 2;
$tanggal = $tanggal ?: date("Y-m-d");
$total_bayar = $harga_per_tiket * $tiket;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reservasi Tiket</title>
    <link rel="stylesheet" href="cssPengguna/reservasiTiket.css">
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

<main>
    <h1 class="title">Book Ticket</h1>

    <?php if (!empty($pesan_sukses)) : ?>
        <p style="color:green; text-align:center;"><?= $pesan_sukses ?></p>
    <?php elseif (!empty($pesan_error)) : ?>
        <p style="color:red; text-align:center;"><?= $pesan_error ?></p>
    <?php endif; ?>

    <form action="" method="POST" class="main-grid">
        <div class="left-column">
            <div class="form-card">
                <h2>Tourist Information</h2>
                <input type="text" name="nama" placeholder="Full name" value="<?= htmlspecialchars($nama) ?>" required>
                <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($email) ?>" required>
                <input type="tel" name="telepon" placeholder="Phone Number" value="<?= htmlspecialchars($telepon) ?>" required>
            </div>

            <div class="form-card">
                <h2>Ticket</h2>
                <input type="number" name="jumlah_tiket" placeholder="Ticket number" min="1" value="<?= $tiket ?>" required>
                <input type="date" name="tanggal" value="<?= htmlspecialchars($tanggal) ?>" required>

                <div class="payment-summary">
                    <p>Harga tiket: Rp.<?= number_format($harga_per_tiket, 0, ',', '.') ?></p>
                    <p>Total: Rp.<?= number_format($harga_per_tiket * $tiket, 0, ',', '.') ?></p>
                    <h3>Total payment: Rp.<?= number_format($total_bayar, 0, ',', '.') ?></h3>
                </div>
            </div>
        </div>

        <div class="right-column">
            <div class="form-card place-info">
                <img src="../Umum/Images/Mount Bromo.jpg" alt="Mount Bromo" class="place-img">
                <h3>Gunung Bromo, Probolinggo</h3>
                <p>Rating: 4,8 (1.257 reviews)</p>
                <div class="icons">
                    <span title="Bus">🚌</span>
                    <span title="Nature">🏞️</span>
                    <span title="Photography Spot">📷</span>
                </div>
            </div>

            <div class="form-card balance-card">
                <h2>Balance</h2>
                <p>Rp.<?= number_format($saldo, 0, ',', '.') ?></p>
                <a href="topUpSaldo.php" class="topup-btn">Top Up</a>
                <button type="submit" class="topup-btn">Pesan Tiket</button>
            </div>
        </div>
    </form>
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