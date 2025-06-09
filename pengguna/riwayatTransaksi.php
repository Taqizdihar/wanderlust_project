<?php
$saldo = 5000000;

$transaksi = [
    ['tanggal' => 'June 01, 2025', 'jumlah' => 200000, 'tujuan' => 'Trans Studio Bandung'],
    ['tanggal' => 'June 02, 2025', 'jumlah' => 50000, 'tujuan' => 'Borobudur Temple'],
    ['tanggal' => 'June 03, 2025', 'jumlah' => 44000, 'tujuan' => 'The Great Asia Africa'],
    ['tanggal' => 'June 04, 2025', 'jumlah' => 30000, 'tujuan' => 'D’Castello Flora Tourism'],
    ['tanggal' => 'June 05, 2025', 'jumlah' => 350000, 'tujuan' => 'Lava Tour Merapi']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Riwayat Transaksi</title>
  <link rel="stylesheet" href="cssPengguna/Profil.css">
  <link rel="stylesheet" href="cssPengguna/riwayatTransaksi.css">
</head>
<body>
  <!-- Header -->
  <div class="header">
    <div class="logo">Wanderlust</div>
    <input class="search-bar" type="text" placeholder="Search..."/>
    <div class="nav-options">
      <a href="#">Option 3</a>
      <a href="#">Option 2</a>
      <a href="#">Option 1</a>
    </div>
    <div class="user-avatar">
      <img src="https://via.placeholder.com/40" alt="User Avatar" />
    </div>
  </div>

  <!-- Main Content -->
  <div class="content-container">
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="balance-box">
        <div>Balance</div>
        Rp. <?= number_format($saldo, 0, ',', '.') ?>
      </div>
      <div class="option">Option 1</div>
      <div class="option">Option 2</div>
    </div>

    <!-- Transaction Table -->
    <div class="transaction-content">
      <div class="transaction-card">
        <table>
          <thead>
            <tr>
              <th>No.</th>
              <th>Transaction Date</th>
              <th>Total Transaction</th>
              <th>Destination</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($transaksi as $index => $trx): ?>
              <tr>
                <td><?= $index + 1 ?>.</td>
                <td><?= $trx['tanggal'] ?></td>
                <td><?= number_format($trx['jumlah'], 0, ',', '.') ?></td>
                <td><?= $trx['tujuan'] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    <div class="footer-logo">Wanderlust</div>
    <div class="footer-links">
      <a href="#">Tentang Kami</a>
      <a href="#">Kontak Kami</a>
      <a href="#">FAQs</a>
      <a href="#">Komunitas</a>
      <a href="#">Tips & Trick</a>
      <a href="#">Promo</a>
      <a href="#">Profil</a>
      <a href="#">Agenda</a>
      <a href="#">Home</a>
    </div>
    <div>Copyright © 2025 Wanderlust. All rights reserved</div>
  </div>
</body>
</html>