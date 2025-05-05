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
    <!-- Rekomendasi Destinasi Wisata -->
<section class="card-gallery">
  <!-- Dusun Bambu -->
  <div class="cards-destination">
    <div class="card-images" style="background-image: url('img/dusunbambu.jpg');">
      <h4>Dusun Bambu – Lembang</h4>
    </div>
    <div class="destination-content">
      <p>Tempat wisata keluarga dengan danau, restoran apung, dan taman alam yang asri.</p>
      <div class="stars">⭐⭐⭐⭐⭐</div>
      <a href="#" class="card-button">Lihat Detail</a>
    </div>
  </div>

  <!-- Trans Studio Bandung -->
  <div class="cards-destination">
    <div class="card-images" style="background-image: url('img/transstudio.jpg');">
      <h4>Trans Studio Bandung – Indoor Theme Park</h4>
    </div>
    <div class="destination-content">
      <p>Taman bermain indoor terbesar di Indonesia dengan berbagai wahana seru untuk semua usia.</p>
      <div class="stars">⭐⭐⭐⭐☆</div>
      <a href="#" class="card-button">Lihat Detail</a>
    </div>
  </div>

  <!-- Taman Hutan Raya Ir. H. Djuanda -->
  <div class="cards-destination">
    <div class="card-images" style="background-image: url('img/tahura.jpg');">
      <h4>Taman Hutan Raya – Dago Pakar</h4>
    </div>
    <div class="destination-content">
      <p>Area konservasi alam dengan gua bersejarah, air terjun, dan jalur hiking di tengah hutan pinus.</p>
      <div class="stars">⭐⭐⭐⭐☆</div>
      <a href="#" class="card-button">Lihat Detail</a>
    </div>
  </div>

  <!-- Saung Angklung Udjo -->
  <div class="cards-destination">
    <div class="card-images" style="background-image: url('img/saudjo.jpg');">
      <h4>Saung Angklung Udjo – Padasuka</h4>
    </div>
    <div class="destination-content">
      <p>Pusat seni budaya Sunda dengan pertunjukan angklung interaktif dan workshop kerajinan bambu.</p>
      <div class="stars">⭐⭐⭐⭐⭐</div>
      <a href="#" class="card-button">Lihat Detail</a>
    </div>
  </div>

  <!-- Tebing Keraton -->
  <div class="cards-destination">
    <div class="card-images" style="background-image: url('img/tebingkeraton.jpg');">
      <h4>Tebing Keraton – Dago Atas</h4>
    </div>
    <div class="destination-content">
      <p>Spot foto favorit dengan pemandangan hutan dari ketinggian dan matahari terbit yang menakjubkan.</p>
      <div class="stars">⭐⭐⭐⭐☆</div>
      <a href="#" class="card-button">Lihat Detail</a>
    </div>
  </div>
</section>

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