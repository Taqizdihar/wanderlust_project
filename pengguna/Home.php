<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Beranda</title>
  <link rel="stylesheet" href="cssPengguna/Home.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

  <h2 class="home-heading">
    Top Destinasi Wisata
    <a href="CariDestinasi.php" class="destination">Cek semua destinasi<i class="fa-solid fa-magnifying-glass fa-beat"></i></a>
  </h2>

  <!-- Top Destinasi Bandung -->
<section class="card-gallery">
  <!-- Kawah Putih -->
  <div class="cards-destination">
    <div class="card-images" style="background-image: url('Umum/Images/kawahputih.jpg');">
      <h4>Kawah Putih – Ciwidey</h4>
    </div>
    <div class="destination-content">
      <p>Danau vulkanik dengan pemandangan magis dan kabut alami yang indah, cocok untuk foto dan relaksasi.</p>
      <div class="stars">⭐⭐⭐⭐⭐</div>
      <a href="#" class="card-button">Lihat Detail</a>
    </div>
  </div>

  <!-- Gedung Sate -->
  <div class="cards-destination">
    <div class="card-images" style="background-image: url('img/gedungsate.jpg');">
      <h4>Gedung Sate – Pusat Kota</h4>
    </div>
    <div class="destination-content">
      <p>Bangunan ikonik dengan arsitektur kolonial dan taman kota yang luas di sekelilingnya.</p>
      <div class="stars">⭐⭐⭐⭐☆</div>
      <a href="#" class="card-button">Lihat Detail</a>
    </div>
  </div>

  <!-- Jalan Braga -->
  <div class="cards-destination">
    <div class="card-images" style="background-image: url('img/braga.jpg');">
      <h4>Jalan Braga – Heritage Bandung</h4>
    </div>
    <div class="destination-content">
      <p>Jalan legendaris dengan suasana klasik, galeri seni, dan kafe vintage khas Bandung.</p>
      <div class="stars">⭐⭐⭐⭐☆</div>
      <a href="#" class="card-button">Lihat Detail</a>
    </div>
  </div>

  <!-- Orchid Forest -->
  <div class="cards-destination">
    <div class="card-images" style="background-image: url('img/orchidforest.jpg');">
      <h4>Orchid Forest Cikole</h4>
    </div>
    <div class="destination-content">
      <p>Taman anggrek terbesar di Indonesia dengan jembatan gantung dan udara sejuk pegunungan.</p>
      <div class="stars">⭐⭐⭐⭐⭐</div>
      <a href="#" class="card-button">Lihat Detail</a>
    </div>
  </div>

  <h2 class="home-heading">
    Rekomendasi Destinasi Wisata
    <a href="CariDestinasi.php" class="destination">Cek semua Destinasi<i class="fa-solid fa-magnifying-glass fa-beat"></i></a>
  </h2>

  <div class="card-gallery">
    <div class="cards-event">
      <div class="card-images" style="background-image: url('../Images/URun.png');"></div>
      <div class="event-content">
        <h3>U'Run</h3>
        <div class="event-description">
          <p><i class="fa-solid fa-location-dot"></i><span>Lanud Sulaiman</span></p>
          <p><i class="fa-solid fa-calendar-days"></i><span>25 Januari 2025</span></p>
        </div>
        <a href="#" class="card-button">Cek Info Lengkap</a>
      </div>
    </div>

    <div class="cards-event">
      <div class="card-images" style="background-image: url('../Images/Festive Fortune.jpg');"></div>
      <div class="event-content">
        <h3>Festive Fortune</h3>
        <div class="event-description">
          <p><i class="fa-solid fa-location-dot"></i><span>Festival CityLink</span></p>
          <p><i class="fa-solid fa-calendar-days"></i><span>19 Jan - 16 Feb 2025</span></p>
        </div>
        <a href="#" class="card-button">Cek Info Lengkap</a>
      </div>
    </div>

    <div class="cards-event">
      <div class="card-images" style="background-image: url('../Images/Pameran Pernikahan Tradisional.png');"></div>
      <div class="event-content">
        <h3>Pameran Pernikahan Tradisional</h3>
        <div class="event-description">
          <p><i class="fa-solid fa-location-dot"></i><span>Pusat Dakwah Islam</span></p>
          <p><i class="fa-solid fa-calendar-days"></i><span>17 - 19 Jan 2025</span></p>
        </div>
        <a href="#" class="card-button">Cek Info Lengkap</a>
      </div>
    </div>

    <div class="cards-event">
      <div class="card-images" style="background-image: url('../Images/Creative Market.png');"></div>
      <div class="event-content">
        <h3>Creative Market</h3>
        <div class="event-description">
          <p><i class="fa-solid fa-location-dot"></i><span>Summarecon Mall Bandung</span></p>
          <p><i class="fa-solid fa-calendar-days"></i><span>9 - 12 Jan 2025</span></p>
        </div>
        <a href="#" class="card-button">Cek Info Lengkap</a>
      </div>
    </div>
  </div>
</div>

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