<?php
$reservasi = [
  [
    'destinasi' => 'Bali',
    'gambar' => 'bali.jpg',
    'total_tiket' => 2,
    'total_bayar' => 500000,
    'tanggal' => '2025-06-10'
  ],
  [
    'destinasi' => 'Lombok',
    'gambar' => 'lombok.jpg',
    'total_tiket' => 3,
    'total_bayar' => 750000,
    'tanggal' => '2025-05-28'
  ],
  [
    'destinasi' => 'Yogyakarta',
    'gambar' => 'jogja.jpg',
    'total_tiket' => 1,
    'total_bayar' => 200000,
    'tanggal' => '2025-05-15'
  ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat Reservasi</title>
  <link rel="stylesheet" href="pengguna/cssPengguna/riwayatReservasi.css">
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

  <h1 class="title">Reservation History</h1>

  <!-- Search form -->
  <div class="search-wrapper">
    <input type="text" class="history-search-input" placeholder="Cari destinasi...">
    <button class="history-search-btn">🔍</button>
  </div>

  <!-- Card Container -->
  <main class="history-container">
    <?php foreach ($reservasi as $item): ?>
      <div class="history-card">
        <div class="history-left">
          <img src="<?= $item['gambar'] ?>" alt="<?= $item['destinasi'] ?>" class="history-img">
          <div class="history-text">
            <strong class="destination-name"><?= htmlspecialchars($item['destinasi']) ?></strong>
          </div>
        </div>
        <div class="history-center">
          <p>Total Tickets: <strong><?= $item['total_tiket'] ?></strong></p>
          <p>Total Payment: <strong>Rp<?= number_format($item['total_bayar'], 0, ',', '.') ?></strong></p>
        </div>
        <div class="history-right">
          <p>Date:</p>
          <strong><?= $item['tanggal'] ?></strong>
        </div>
      </div>
    <?php endforeach; ?>
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