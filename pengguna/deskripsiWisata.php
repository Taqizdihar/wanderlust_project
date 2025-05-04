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
  <link rel="stylesheet" href="deksripsiWisata.css">
</head>
<body>
  <header class="header">
    <div class="container">
      <h1 class="logo">Wanderlust</h1>
      <nav>
        <ul class="nav">
          <li><a href="index.php">Beranda</a></li>
          <li><a href="destinasi.php">Destinasi</a></li>
          <li><a href="kontak.php">Kontak</a></li>
        </ul>
      </nav>
    </div>
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

  <footer class="footer">
    <p>&copy; 2025 Wanderlust. Semua Hak Dilindungi.</p>
  </footer>
</body>
</html>