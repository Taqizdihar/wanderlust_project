<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Beranda</title>
  <link rel="stylesheet" href="../Wanderlust.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<header>
  <div class="header-content">
    <div class="header-logo">
      <img src="../Images/Umum/photos/Wanderlust Logo Plain.png" height="50" width="50" alt="Wanderlust Logo" />
      <a href="Home.php">Wanderlust</a>
    </div>
    <nav class="navbar">
      <ul>
        <li><a href="Login.php">Login</a></li>
        <li><a href="Promo.php">Promo</a></li>
        <li><a href="PemesananTiket.php">Tiket</a></li>
        <li><a href="Tips.php">Tips</a></li>
        <li><a href="ContactUs.php">Kontak Kami</a></li>
        <li><a href="Agenda.php">Agenda</a></li>
        <li><a href="Profil.php"><img src="../Images/PP.jpg" alt="Foto Profil" /></a></li>
      </ul>
    </nav>
  </div>
</header>

<div id="home-content">
  <div id="home-banner">
    <h2>Wander for Wonders</h2>
    <form action="" class="search-button">
      <input type="text" placeholder="Cari Destinasi atau Kegiatan" name="search" />
      <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
  </div>

  <h2 class="home-heading">
    Destinasi Top
    <a href="CariDestinasi.php" class="destination">Cek semua destinasi<i class="fa-solid fa-magnifying-glass fa-beat"></i></a>
  </h2>

  <div class="card-gallery">
    <div class="cards-destination">
      <div class="card-images" style="background-image: url('../Images/Masjid Al-Jabbar.jpeg');">
        <h4>Bandung</h4>
      </div>
      <div class="destination-content">
        <h3>Masjid Al-Jabbar</h3>
        <div class="stars">
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
          <p>14K</p>
        </div>
        <div class="home-icons">
          <i class="fa-solid fa-mosque"></i><i class="fa-solid fa-square-parking"></i>
          <p>FREE</p>
        </div>
        <a href="#" class="card-button">Cek Info Lengkap</a>
      </div>
    </div>

    <div class="cards-destination">
      <div class="card-images" style="background-image: url('../Images/Glamping Ciwidey.jpg');">
        <h4>Rancabali</h4>
      </div>
      <div class="destination-content">
        <h3>Glamping Lakeside</h3>
        <div class="stars">
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
          <p>18K</p>
        </div>
        <div class="home-icons">
          <i class="fa-solid fa-bed"></i><i class="fa-solid fa-utensils"></i><i class="fa-solid fa-camera"></i>
          <p>PAID</p>
        </div>
        <a href="#" class="card-button">Cek Info Lengkap</a>
      </div>
    </div>

    <div class="cards-destination">
      <div class="card-images" style="background-image: url('../Images/The Great Asia Afrika.jpg');">
        <h4>Lembang</h4>
      </div>
      <div class="destination-content">
        <h3>The Great Asia Africa</h3>
        <div class="stars">
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
          <p>21K</p>
        </div>
        <div class="home-icons">
          <i class="fa-solid fa-utensils"></i><i class="fa-solid fa-camera"></i><i class="fa-solid fa-gifts"></i>
          <p>PAID</p>
        </div>
        <a href="#" class="card-button">Cek Info Lengkap</a>
      </div>
    </div>

    <div class="cards-destination">
      <div class="card-images" style="background-image: url('../Images/D&#39;Castello.jpg');">
        <h4>Ciater</h4>
      </div>
      <div class="destination-content">
        <h3>D'Castello</h3>
        <div class="stars">
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
          <p>12K</p>
        </div>
        <div class="home-icons">
          <i class="fa-solid fa-utensils"></i><i class="fa-solid fa-camera"></i><i class="fa-solid fa-gifts"></i>
          <p>PAID</p>
        </div>
        <a href="#" class="card-button">Cek Info Lengkap</a>
      </div>
    </div>
  </div>

  <h2 class="home-heading">
    Kegiatan Mendatang
    <a href="CariDestinasi.php" class="destination">Cek semua kegiatan<i class="fa-solid fa-magnifying-glass fa-beat"></i></a>
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
        <h5>Wanderlust <span style="display: block; font: 15px 'Concert One', sans-serif;">Wander for Wonders</span></h5>
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