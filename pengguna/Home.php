<?php
include "config.php";

$ID = $_SESSION['user_id'];
$sqlStatement1 = "SELECT * FROM user WHERE user_id='$ID'";
$query = mysqli_query($conn, $sqlStatement1);
$profile = mysqli_fetch_assoc($query);

$sqlStatement3 = "
    SELECT lokasi.*, foto_lokasi.url_photo
    FROM lokasi
    LEFT JOIN foto_lokasi 
        ON lokasi.id_lokasi = foto_lokasi.id_lokasi 
        AND foto_lokasi.urutan = 1
    WHERE lokasi.pw_id = '$ID'
";
$query = mysqli_query($conn, $sqlStatement3);

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
            <a href="#">Reservasi</a>
            <a href="#">Favorit</a>
            <a href="#">Bantuan</a>
            <div class="profile-icon">👤</div>
        </nav>
    </header>

  <h2 class="section-title">Destinasi Populer</h2>
  <div class="card-gallery">
    <?php foreach ($lokasi as $itemLokasi): ?>
      <div class="cards-destination">
        <div class="card-images" style="background-image: url('<?= $itemLokasi[''] ?>');">
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
      <img src="Umum/photos/Wanderlust Logo Plain.png" height="70" width="70" alt="Wanderlust Logo"/>
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