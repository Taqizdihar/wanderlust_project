<?php
session_start();
$_SESSION['nama'] = $_SESSION['nama'] ?? 'Faiz Syafiq Nabily';
$_SESSION['email'] = $_SESSION['email'] ?? 'faizsn@gmail.com';
$_SESSION['telepon'] = $_SESSION['telepon'] ?? '081234567890';
$_SESSION['tanggal_lahir'] = $_SESSION['tanggal_lahir'] ?? '2005-04-04';
$_SESSION['jenis_kelamin'] = $_SESSION['jenis_kelamin'] ?? 'Laki-laki';
$_SESSION['alamat'] = $_SESSION['alamat'] ?? 'Ciamis, Jawa Barat';
$_SESSION['preferensi'] = $_SESSION['preferensi'] ?? 'Pantai, Pegunungan';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Wanderlust</title>
    <link rel="stylesheet" href="Profil.css">
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
</body>
</html>

<main class="profil-container">
    <div class="profil-card">
        <img src="img/user.jpg" alt="Foto Profil">
        <h2><?= htmlspecialchars($_SESSION['nama']) ?></h2>
        <table class="profil-table">
            <tr><th>Email:</th><td><?= htmlspecialchars($_SESSION['email']) ?></td></tr>
            <tr><th>Telepon:</th><td><?= htmlspecialchars($_SESSION['telepon']) ?></td></tr>
            <tr><th>Tanggal Lahir:</th><td><?= htmlspecialchars($_SESSION['tanggal_lahir']) ?></td></tr>
            <tr><th>Jenis Kelamin:</th><td><?= htmlspecialchars($_SESSION['jenis_kelamin']) ?></td></tr>
            <tr><th>Alamat:</th><td><?= htmlspecialchars($_SESSION['alamat']) ?></td></tr>
            <tr><th>Preferensi Destinasi:</th><td><?= htmlspecialchars($_SESSION['preferensi']) ?></td></tr>
        </table>
        <a href="#" class="edit-button">Edit Profil</a>
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

</body>
</html>