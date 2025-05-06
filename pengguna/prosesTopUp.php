<?php
session_start();

$saldo = isset($_SESSION['saldo']) ? $_SESSION['saldo'] : 0;
$status = '';
$pesan = '';

if (isset($_POST['jumlah'])) {
    $jumlahTopUp = (int) $_POST['jumlah'];

    if ($jumlahTopUp >= 10000) {
        $_SESSION['saldo'] = $saldo + $jumlahTopUp;
        $status = 'success';
        $pesan = "Top up sebesar Rp " . number_format($jumlahTopUp, 0, ',', '.') . " berhasil!";
        $saldo = $_SESSION['saldo'];
    } else {
        $status = 'error';
        $pesan = "Jumlah minimum top up adalah Rp 10.000.";
    }
} else {
    $status = 'error';
    $pesan = "Data tidak valid.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Top Up - Wanderlust</title>
    <link rel="stylesheet" href="topUpSaldo.css">
</head>
<body>

    <header class="main-header">
        <div class="logo-container">
            <img src="Umum/photos/Wanderlust Logo Plain.png" alt="Wanderlust Logo" class="logo">
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
            <img src="icon.png" alt="Wanderlust Icon">
            <h1>Wanderlust</h1>
        </div>
        <p>Hasil Top Up Dompet Wisatamu</p>

        <div class="balance-box">
            Saldo Anda Sekarang: <strong>Rp <?= number_format($saldo, 0, ',', '.') ?></strong>
        </div>

        <nav>
            <a href="riwayat.php">Riwayat</a>
            <a href="topUpSaldo.php" class="active">Top Up</a>
            <a href="pengaturan.php">Pengaturan</a>
        </nav>

        <div style="margin-top: 20px;">
            <?php if ($status === 'success'): ?>
                <p style="color: green; font-weight: bold;"><?= $pesan ?></p>
            <?php else: ?>
                <p style="color: red; font-weight: bold;"><?= $pesan ?></p>
            <?php endif; ?>
        </div>

        <a href="topUpSaldo.php">
            <button style="margin-top: 20px;">Kembali ke Top Up</button>
        </a>

        <div class="footer-text">
        </div>
    </div>
    <footer>
  <div class="footer-container">
    <div class="footer-logo">
      <img src="../Images/Wanderlust Logo Circle.png" height="70" width="70" alt="Wanderlust Logo"/>
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