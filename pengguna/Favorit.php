<?php

include "config.php";

$ID = $_SESSION['user_id'];

$sqlStatement1 = "SELECT * FROM wishlist ";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Saved Destinations</title>
  <link rel="stylesheet" href="pengguna/cssPengguna/Favorit.css">
</head>
<body>

  <header class="header">
    <div class="header-left">
      <img src="Umum/foto/Wanderlust Logo Plain.png" alt="Wanderlust Logo" class="logo-img">
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

  <!-- Title -->
  <h1 class="title">Saved Destination</h1>

  <!-- Destinations -->
  <div class="card-container">
    <?php foreach ($destinations as $dest): ?>
      <div class="card">
        <img src="<?= $dest['image'] ?>" class="card-img" alt="<?= $dest['title'] ?>">
        <div class="card-content">
          <div>
            <h2><?= $dest['title'] ?></h2>
            <div class="card-info">
              <p>🎫 Ticket <?= $dest['ticket'] ?></p>
              <p>📦 Kuota <?= $dest['quota'] ?></p>
              <p>⭐ <?= $dest['rating'] ?> (<?= $dest['reviews'] ?>)</p>
            </div>
          </div>
          <div class="card-buttons">
            <button class="remove-btn">Remove</button>
            <button class="book-btn">Book Now</button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Footer -->
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