<?php
include "config.php";

$sqlStatement = "
    SELECT tempatwisata.*, fotowisata.link_foto FROM tempatwisata LEFT JOIN fotowisata ON tempatwisata.tempatwisata_id = fotowisata.tempatwisata_id AND fotowisata.urutan = 1";
$query = mysqli_query($conn, $sqlStatement);

$lokasi = [];
while ($row = mysqli_fetch_assoc($query)) {
    $lokasi[] = $row;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wanderlust | Home</title>
  <link rel="stylesheet" href="pengguna/cssPengguna/Home.css">
</head>
<body>

    <header class="main-header">
        <div class="logo-container">
            <img src="Umum/foto/Wanderlust Logo Plain.png" alt="Wanderlust Logo" class="logo">
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
            <a href="notFound.php">Reservasi</a>
            <a href="notFound.php">Favorit</a>
            <a href="notFound.php">Bantuan</a>
            <div class="profile-icon">👤</div>
        </nav>
    </header>

  <h2 class="section-title">Destinasi Populer</h2>
  <div class="card-gallery">
  <?php foreach ($lokasi as $itemLokasi): ?>
    <div class="cards-destination">
      <div class="card-images" style="background-image: url('pemilikWisata/foto/<?= $itemLokasi['link_foto'] ?>');">
        <h4><?= $itemLokasi['nama_lokasi'] ?></h4>
      </div>
      <div class="destination-content">
        <p><?= $itemLokasi['sumir'] ?></p>
        <div class="stars"></div>
        <a class="card-button" href="#">Lihat Selengkapnya</a>
      </div>
    </div>
  <?php endforeach; ?>
</div>

  <h2 class="section-title">Rekomendasi Destinasi</h2>
<div class="card-gallery">
  <?php foreach ($lokasi as $itemLokasi): ?>
    <a href="">
      <div class="cards-destination">
        <div class="card-images" style="background-image: url('pemilikWisata/foto/<?= $itemLokasi['link_foto'] ?>');">
          <h4><?= $itemLokasi['nama_lokasi'] ?></h4>
        </div>
        <div class="destination-content">
          <p><?= $itemLokasi['sumir'] ?></p>
          <div class="stars"></div>
          <a class="card-button" href="#">Lihat Selengkapnya</a>
        </div>
      </div>
    </a>
  <?php endforeach; ?>
</div>

<footer>
  <div class="footer-container">
    <div class="footer-logo">
      <img src="Umum/foto/Wanderlust Logo Plain.png" height="70" width="70" alt="Wanderlust Logo"/>
      <div>
        <h5>Wanderlust <span style="display: block; font: 15px 'Concert One', sans-serif;">WANDERINGS FOR WONDERS</span></h5>
      </div>
    </div>
    <div class="footbar">
      <table>
        <tr>
          <td><a href="">Tentang Kami</a></td>
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