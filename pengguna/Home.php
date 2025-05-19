<?php
$destinasi = [
[
    "img" => "img/kawah-putih.jpg",
    "title" => "Kawah Putih",
    "desc" => "Danau vulkanik dengan air berwarna putih kehijauan yang eksotis di Ciwidey.",
    "rating" => 5
],
  
[
    "img" => "img/farm-house.jpg",
    "title" => "Farm House Lembang",
    "desc" => "Tempat wisata bergaya Eropa dengan mini zoo dan rumah hobbit.",
    "rating" => 5
],
  
[
    "img" => "img/the-great-asia-afrika.jpg",
    "title" => "The Great Asia Afrika",
    "desc" => "Wisata budaya menampilkan miniatur negara-negara Asia dan Afrika.",
    "rating" => 5
],

[
    "img" => "img/gedung-sate.jpg",
    "title" => "Gedung Sate",
    "desc" => "Ikon kota Bandung dengan arsitektur khas dan museum sejarah.",
    "rating" => 5
]
];

$rekomendasi = [
  [
    "img" => "img/tangkuban-perahu.jpg",
    "title" => "Gunung Tangkuban Perahu",
    "desc" => "Gunung aktif dengan kawah yang bisa dikunjungi langsung.",
    "rating" => 5
  ],
  [
    "img" => "img/dusun-bambu.jpg",
    "title" => "Dusun Bambu",
    "desc" => "Wisata alam dan kuliner keluarga dengan pemandangan danau dan pegunungan.",
    "rating" => 5
  ],
  [
    "img" => "img/asia-afrika-street.jpg",
    "title" => "Jalan Asia Afrika",
    "desc" => "Jalan bersejarah di pusat kota Bandung, cocok untuk berfoto dan mengenal sejarah.",
    "rating" => 5
  ],
  [
    "img" => "img/braga.jpg",
    "title" => "Jalan Braga",
    "desc" => "Kawasan ikonik dengan bangunan kolonial dan kafe-kafe bergaya vintage.",
    "rating" => 5
  ]
];

include "config.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wanderlust | Home</title>
  <link rel="stylesheet" href="pengguna/Home.css">
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

  <h2 class="section-title">Destinasi Populer</h2>
  <div class="card-gallery">
    <?php foreach ($destinasi as $item): ?>
      <div class="cards-destination">
        <div class="card-images" style="background-image: url('<?= $item['img'] ?>');">
          <h4><?= $item['title'] ?></h4>
        </div>
        <div class="destination-content">
          <p><?= $item['desc'] ?></p>
          <div class="stars"><?= str_repeat('★', $item['rating']) ?></div>
          <a class="card-button" href="#">Lihat Selengkapnya</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <h2 class="section-title">Rekomendasi Destinasi</h2>
<div class="card-gallery">
  <?php foreach ($rekomendasi as $item): ?>
    <div class="cards-destination">
      <div class="card-images" style="background-image: url('<?= $item['img'] ?>');">
        <h4><?= $item['title'] ?></h4>
      </div>
      <div class="destination-content">
        <p><?= $item['desc'] ?></p>
        <div class="stars"><?= str_repeat('★', $item['rating']) ?></div>
        <a class="card-button" href="#">Lihat Selengkapnya</a>
      </div>
    </div>
  <?php endforeach; ?>
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