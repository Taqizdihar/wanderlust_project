<?php
$destinasi = [
    [
        'nama' => 'Dusun Bambu Lembang',
        'lokasi' => 'Bandung',
        'gambar' => 'uploads/bandung1.jpg',
        'rating' => 4.8,
        'ulasan' => 210,
        'label' => ''
    ],
    [
        'nama' => 'Farmhouse Susu Lembang',
        'lokasi' => 'Lembang, Bandung',
        'gambar' => 'uploads/bandung2.jpg',
        'rating' => 4.5,
        'ulasan' => 300,
        'label' => ''
    ],
    [
        'nama' => 'Orchid Forest Cikole',
        'lokasi' => 'Cikole, Bandung',
        'gambar' => 'Umum/Images/Kawah Putih Ciwidey.jpg',
        'rating' => 4.7,
        'ulasan' => 185,
        'label' => ''
    ],
    [
        'nama' => 'The Great Asia Africa',
        'lokasi' => 'Lembang, Bandung',
        'gambar' => 'uploads/bandung6.jpg',
        'rating' => 4.6,
        'ulasan' => 150,
        'label' => ''
    ],
    [
        'nama' => 'Trans Studio Bandung',
        'lokasi' => 'Bandung Kota',
        'gambar' => 'uploads/bandung5.jpg',
        'rating' => 4.9,
        'ulasan' => 1000,
        'label' => ''
    ],
    [
        'nama' => 'Kawah Putih Ciwidey',
        'lokasi' => 'Ciwidey, Bandung',
        'gambar' => 'uploads/bandung6.jpg',
        'rating' => 4.7,
        'ulasan' => 500,
        'label' => ''
    ],
    [
        'nama' => 'Tebing Keraton',
        'lokasi' => 'Bandung Utara',
        'gambar' => 'uploads/bandung6.jpg',
        'rating' => 4.5,
        'ulasan' => 250,
        'label' => ''
    ],
    [
        'nama' => 'Curug Cimahi',
        'lokasi' => 'Bandung Barat',
        'gambar' => 'uploads/bandung6.jpg',
        'rating' => 4.4,
        'ulasan' => 180,
        'label' => ''
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Pencarian</title>
    <link rel="stylesheet" href="Pencarian.css">
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
            <a href="#">Opsi 1</a>
            <a href="#">Opsi 2</a>
            <a href="#">Favorit</a>
            <div class="profile-icon">👤</div>
        </nav>
    </header>

<main class="main-content">
    <div class="section-title">
        <h2>Menampilkan aktivitas dengan "Bandung"</h2>
        <div class="filter">
            <label>Urutkan dari:</label>
            <select>
                <option selected>Paling Relevan</option>
            </select>
        </div>
    </div>

    <div class="card-container">
        <?php foreach ($destinasi as $item): ?>
            <div class="card">
                <img src="<?= $item['gambar'] ?>" alt="<?= htmlspecialchars($item['nama']) ?>">
                <?php if (!empty($item['label'])): ?>
                    <span class="badge sale"><?= htmlspecialchars($item['label']) ?></span>
                <?php endif; ?>
                <div class="card-info">
                    <p class="lokasi"><?= htmlspecialchars($item['lokasi']) ?></p>
                    <h3><?= htmlspecialchars($item['nama']) ?></h3>
                    <p class="rating">
                        ⭐ <?= htmlspecialchars($item['rating']) ?> (<?= htmlspecialchars($item['ulasan']) ?> review)
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<footer>
  <div class="footer-container">
    <div class="footer-logo">
      <img src="../Images/Wanderlust Logo Circle.png" height="70" width="70" alt="Wanderlust Logo"/>
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