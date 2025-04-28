<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="Wanderlust.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!--Navbar-->
    <header>
        <div class="header-content">
          <div class="header-logo">
            <img src="Images/Wanderlust Logo Circle.png" height="50" width="50" alt="Wanderlust Logo">
            <a href="Home.html">Wanderlust</a>
          </div>
          <nav class="navbar">
            <ul>
              <li><a href="Login.html">Login</a></li>
              <li><a href="Promo.html">Promo</a></li>
              <li><a href="PemesananTiket.html">Tiket</a></li>
              <li><a href="Tips.html">Tips</a></li>
              <li><a href="ContactUs.html">Kontak Kami</a></li>
              <li><a href="Agenda.html">Agenda</a></li>
              <li><a href="Profile.html"><img src="Images/PP.jpg" alt="Foto Profil"></a></li>
            </ul>
          </nav>
        </div>
      </header>
      <!--Navbar-->
    
    <!--Main Content-->
    <div class="agenda-menu">
        <h2>Agenda</h2>
        <div class="agenda-buttons">
          <div id="agenda-input">
            <input type="text" placeholder="Masukkan Nama Agenda"><i class="fa-solid fa-magnifying-glass"></i>
          </div>
            <button>Destinasi</button>
            <button>Kegiatan</button>
        </div>
    </div>
    <div class="agenda-container">
        <div class="agenda">
            <div class="agenda-content">
              <div class="agenda-image" style="background-image: url(Images/Masjid\ Al-Jabbar.jpeg);"></div>
              <div class="agenda-data">
                  <h3>Masjid Al-Jabbar</h3>
                  <p>Besok, 11:00</p>
                  <p>Bandung</p>
                  <p id="note">Note: Naik ojek online 1 jam sebelum</p>
              </div>
            </div>
            <i class="fa-solid fa-ellipsis"></i>
        </div>
        <div class="agenda">
          <div class="agenda-content">
            <div class="agenda-image" style="background-image: url(Images/URun.png);"></div>
            <div class="agenda-data">
                <h3>U'Run</h3>
                <p>25 Januari, 07:00</p>
                <p>Bandung</p>
                <p id="note">Note: Berangkat setengah jam sebelum</p>
            </div>
          </div>
          <i class="fa-solid fa-ellipsis"></i>
      </div>
    </div>
    <!--Main Content-->

    <!--Footer-->
    <footer>
        <div class="footer-container">
          <div class="footer-logo">
            <img src="Images/Wanderlust Logo Circle.png" height="70" width="70" alt="Wanderlust Logo">
            <div>
              <h5>
                Wanderlust
                <span style="display: block; font: 15px 'Concert One', sans-serif;">Wander for Wonders</span>
              </h5>
            </div>
          </div>
          <div class="footbar">
            <table>
              <tr>
                <td><a href="AboutUs.html">Tentang Kami</a></td>
                <td><a href="Komunitas.html">Komunitas</a></td>
                <td><a href="Profil.html">Profil</a></td>
              </tr>
              <tr>
                <td><a href="ContactUs.html">Kontak Kami</a></td>
                <td><a href="Tips.html">Tips & Trick</a></td>
                <td><a href="Agenda.html">Agenda</a></td>
              </tr>
              <tr>
                <td><a href="FAQs.html">FAQs</a></td>
                <td><a href="Promo.html">Promo</a></td>
                <td><a href="Home.html">Home</a></td>
              </tr>
            </table>
          </div>
        </div>
        <p>Copyright © 2024 Wanderlust. All rights reserved</p>
      </footer>
      <!--Footer-->
</body>
</html>