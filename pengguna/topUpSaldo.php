<?php
$balance = 5000000;
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Top Up Saldo - Wanderlust</title>
  <link rel="stylesheet" href="cssPengguna/riwayatTransaksi.css">
  <link rel="stylesheet" href="cssPengguna/topUpSaldo.css">
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

<div class="content-container">
  <!-- Sidebar -->
  <div class="sidebar">
    <div class="balance-box">
      <div>Balance</div>
      Rp. <?= number_format($balance, 0, ',', '.') ?>
    </div>
    <div class="option">Option 1</div>
    <div class="option" style="background: none;">Option 2</div>
  </div>

  <!-- Halaman Top Up -->
  <div class="transaction-content">
    <div class="transaction-card">
      <h2>Top up</h2>

      <div class="topup-section">
        <!-- E-wallet Tabs -->
        <div>
          <label><strong>Select E-Wallet</strong></label>
          <div class="e-wallet-tabs">
            <button class="active">Option 1</button>
            <div class="divider"></div>
            <button class="inactive">Option 2</button>
            <div class="divider"></div>
            <button class="inactive">Option 3</button>
            <div class="divider"></div>
            <button class="inactive">Option 4</button>
          </div>
        </div>

        <!-- Nominal Top Up -->
        <div>
          <label><strong>Select Top Up Amount</strong></label>
          <div class="amount-buttons">
            <button>Rp. 100.000</button>
            <button>Rp. 200.000</button>
            <button>Rp. 300.000</button>
            <button>Rp. 400.000</button>
            <button>Rp. 500.000</button>
            <button>Rp. 1.000.000</button>
          </div>
          <input type="text" placeholder="Custom amount...">
        </div>

        <!-- Tombol Top Up -->
        <button class="topup-btn">Top up</button>
      </div>
    </div>
  </div>
</div>

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