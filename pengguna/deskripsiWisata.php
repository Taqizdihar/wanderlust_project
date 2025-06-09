<?php
$wisataList = [
  "kawah-putih" => [
    "nama" => "Kawah Putih Ciwidey",
    "lokasi" => "Jl. Raya Ciwidey - Patengan, Rancabali, Bandung Selatan",
    "deskripsi" => "Kawah Putih Ciwidey adalah danau vulkanik terkenal karena airnya yang putih kehijauan dan suasana berkabut. Tempat ini berada di ketinggian 2.430 mdpl dan merupakan hasil letusan Gunung Patuha.",
    "fasilitas" => "Area parkir, shuttle, toilet umum, kios makanan, dan spot foto menarik.",
    "jam" => "07.00 - 17.00 WIB",
    "harga" => "Rp 28.000 (domestik), Rp 81.000 (wisatawan asing)",
    "gambar" => "https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Kawah_Putih_Ciwidey.jpg/1280px-Kawah_Putih_Ciwidey.jpg"
  ]
];

$id = $_GET['id'] ?? 'kawah-putih';
$wisata = $wisataList[$id] ?? null;
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Wanderlust - <?= $wisata ? $wisata['nama'] : 'Destinasi Tidak Ditemukan' ?></title>
  <link rel="stylesheet" href="cssPengguna/deskripsiWisata.css">
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

  <main class="container">
    <?php if ($wisata): ?>
      <section class="wisata-detail">
        <img src="<?= $wisata['gambar'] ?>" alt="<?= $wisata['nama'] ?>" class="featured-image">
        <div class="detail-content">
          <h2><?= $wisata['nama'] ?></h2>
          <p><strong>Lokasi:</strong> <?= $wisata['lokasi'] ?></p>
          <p><?= $wisata['deskripsi'] ?></p>
          <p><strong>Fasilitas:</strong> <?= $wisata['fasilitas'] ?></p>
          <p><strong>Jam Operasional:</strong> <?= $wisata['jam'] ?></p>
          <p><strong>Harga Tiket:</strong> <?= $wisata['harga'] ?></p>
        </div>
      </section>
    <?php else: ?>
      <section class="wisata-detail">
        <h2>Destinasi Tidak Ditemukan</h2>
        <p>Maaf, destinasi wisata yang Anda cari tidak tersedia.</p>
      </section>
    <?php endif; ?>
  </main>

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