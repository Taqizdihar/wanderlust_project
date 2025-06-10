<?php
// Contoh data dinamis
$fullname = "Michael Santoso";
$email = "michaelsantoso@gmail.com";
$telephone = "08123456789";
$birthdate = "March 14, 1999";
$gender = "Male";
$address = "Los Angeles, California, Amerika Serikat";
$totalVisit = 15;
$totalPayment = 500000;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profil - Wanderlust</title>
  <link rel="stylesheet" href="cssPengguna/Profil.css">
</head>
<body>

  <header class="header">
    <div class="logo">W<span>anderlust</span></div>
    <input type="text" class="search-bar" placeholder="Search...">
    <nav class="nav-options">
      <a href="#">Option 1</a>
      <a href="#">Option 2</a>
      <a href="#">Option 3</a>
    </nav>
    <div class="user-avatar">
      <img src="avatar.jpg" alt="Avatar">
    </div>
  </header>

  <main class="profile-container">
    <aside class="sidebar">
      <img src="../Umum/photos/Images/Michael I Roma.jpg" class="profile-pic" alt="Profile Picture">
      <button class="edit-btn">Edit Foto Profil</button>
      <ul class="menu-options">
        <li>Option 1</li>
        <li>Option 2</li>
        <li>Option 3</li>
      </ul>
    </aside>

    <section class="profile-card">
      <h2><?php echo $fullname; ?></h2>

      <div class="stats">
        <div class="stat-box">
          <p>Total Visit</p>
          <strong><?php echo $totalVisit; ?></strong>
        </div>
        <div class="stat-box">
          <p>Total Payment</p>
          <strong><?php echo number_format($totalPayment, 0, ',', '.'); ?></strong>
        </div>
      </div>

      <table class="user-info bordered-table">
        <tr>
          <td>Full Name</td>
          <td><?php echo $fullname; ?></td>
        </tr>
          <td>Email</td>
          <td><?php echo $email; ?></td>
        </tr>
        <tr>
          <td>Telephone</td>
          <td><?php echo $telephone; ?></td>
        </tr>
        <tr>
          <td>Birth Date</td>
          <td><?php echo $birthdate; ?></td>
        </tr>
        <tr>
          <td>Gender</td>
          <td><?php echo $gender; ?></td>
        </tr>
        <tr>
          <td>Address</td>
          <td><?php echo $address; ?></td>
        </tr>
      </table>

      <div class="action-buttons">
        <button class="btn">✏️ Edit Profil</button>
        <button class="btn">📄 Riwayat Transaksi</button>
        <button class="btn favorite">❤️ Favorit Saya</button>
      </div>
    </section>
  </main>

  <footer class="footer">
    <div class="footer-logo">WA Wanderlust</div>
    <div class="footer-links">
      <a href="#">Tentang Kami</a>
      <a href="#">Kontak Kami</a>
      <a href="#">FAQs</a>
      <a href="#">Komunitas</a>
      <a href="#">Tips & Trik</a>
      <a href="#">Promo</a>
      <a href="#">Agenda</a>
    </div>
    <p>Copyright © 2025 Wanderlust. All rights reserved</p>
  </footer>

</body>
</html>