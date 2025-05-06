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
    "rating" => 4
  ],
  [
    "img" => "img/the-great-asia-afrika.jpg",
    "title" => "The Great Asia Afrika",
    "desc" => "Wisata budaya menampilkan miniatur negara-negara Asia dan Afrika.",
    "rating" => 4
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
    "rating" => 4
  ],
  [
    "img" => "img/asia-afrika-street.jpg",
    "title" => "Jalan Asia Afrika",
    "desc" => "Jalan bersejarah di pusat kota Bandung, cocok untuk berfoto dan mengenal sejarah.",
    "rating" => 4
  ],
  [
    "img" => "img/braga.jpg",
    "title" => "Jalan Braga",
    "desc" => "Kawasan ikonik dengan bangunan kolonial dan kafe-kafe bergaya vintage.",
    "rating" => 5
  ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wanderlust | Home</title>
  <link rel="stylesheet" href="Home.css">
</head>
<body>
  <header>
    <div class="header-content">
      <div class="header-logo">
        <a href="Home.php">Wanderlust</a>
      </div>
      <nav class="navbar">
        <ul>
          <li><a href="Home.php">Home</a></li>
          <li><a href="PemesananTiket.php">Pesan Tiket</a></li>
          <li><a href="Promo.php">Promo</a></li>
          <li><a href="Tips.php">Tips</a></li>
          <li><a href="Saldo.php"><img src="img/user-icon.png" alt="Akun"></a></li>
        </ul>
      </nav>
    </div>
  </header>

  <section id="home-banner">
    <h1>Selamat Datang di Wanderlust!</h1>
    <p>Temukan destinasi impianmu dan nikmati petualangan yang luar biasa</p>
    <div class="search-button">
      <input type="text" placeholder="Cari destinasi impianmu...">
      <button>Cari</button>
    </div>
  </section>

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
        <strong>Wanderlust</strong>
      </div>
      <div class="footbar">
        <table>
          <tr>
            <td><a href="#">Tentang Kami</a></td>
            <td><a href="#">Kontak</a></td>
            <td><a href="#">Syarat & Ketentuan</a></td>
          </tr>
        </table>
      </div>
    </div>
    <p>&copy; <?= date('Y'); ?> Wanderlust. All rights reserved.</p>
  </footer>
</body>
</html>