<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Kegiatan</title>
    <link rel="stylesheet" href="Wanderlust2.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!--Navbar-->
    <header>
      <div class="header-content">
        <div class="header-logo">
          <img src="Images/Wanderlust Logo Circle.png" height="50" width="50" alt="Wanderlust Logo">
          <a href="Home.php">Wanderlust</a>
        </div>
        <nav class="navbar">
          <ul>
            <li><a href="Login.php">Login</a></li>
            <li><a href="Promo.php">Promo</a></li>
            <li><a href="pemesananTiket.php">Tiket</a></li>
            <li><a href="Tips.php">Tips</a></li>
            <li><a href="contactUs.php">Kontak Kami</a></li>
            <li><a href="Agenda.php">Agenda</a></li>
            <li><a href="Profile.php"><img src="Images/PP.jpg" alt="Foto Profil"></a></li>
          </ul>
        </nav>
      </div>
    </header>
    <!--Navbar-->

    <div class="info-container">
        <h1>Asia Africa Festival 2024</h1>
        <div class="event-image" style="background-image: url('Images/Asia\ Africa\ Festival.jpg');"></div>
        <h2>Lokasi: Jln. Asia Afrika Bandung</h2>
        <h3>Tanggal: 6 - 7 Juli 2024</h3>
        <p>
            Asia Africa Festival adalah acara tahunan yang diselenggarakan di Kota Bandung untuk
            merayakan semangat persatuan antarnegara Asia dan Afrika, serta mengenang Konferensi Asia Afrika
            tahun 1955 yang bersejarah. Festival ini menghadirkan berbagai kegiatan budaya, seni, dan hiburan
            yang melibatkan masyarakat lokal, delegasi internasional, serta wisatawan dari berbagai penjuru dunia.
        </p>
        <h3>Rangkaian Acara Asia Afrika Festival</h3>
        <ul>
            <li><strong>Parade Budaya:</strong> Penampilan kostum tradisional dari berbagai negara Asia dan Afrika yang berlangsung sepanjang Jalan Asia Afrika. Parade ini menampilkan kekayaan budaya dan tradisi yang memukau.</li>
            <li><strong>Pentas Seni:</strong> Pertunjukan musik tradisional, tarian, dan teater dari negara-negara peserta. Ini menjadi momen untuk menikmati keindahan seni lintas budaya.</li>
            <li><strong>Bazaar Kuliner:</strong> Festival kuliner khas Asia dan Afrika yang menyajikan berbagai makanan tradisional, mulai dari nasi goreng Indonesia hingga tagine khas Afrika Utara.</li>
            <li><strong>Pameran Seni dan Fotografi:</strong> Pameran karya seni dan fotografi yang menampilkan sejarah, keindahan alam, dan budaya dari negara-negara Asia dan Afrika.</li>
            <li><strong>Diskusi Kebudayaan:</strong> Seminar dan diskusi yang dihadiri para ahli dan tokoh budaya untuk membahas persatuan antarnegara dan tantangan global.</li>
        </ul>
        <h3>Tujuan Festival Asia Afrika Festival</h3>
        <p>
            Festival ini bertujuan untuk mempererat hubungan antarnegara, mempromosikan keragaman budaya,
            dan mengenalkan Bandung sebagai kota yang penuh sejarah dan kreativitas. Selain itu, acara ini
            mendukung perekonomian lokal melalui partisipasi UMKM dan pelaku seni.
        </p>
        <h3>Tips Menghadiri Asia Afrika Festival</h3>
        <ul>
            <li>Datang lebih awal untuk mendapatkan tempat terbaik saat parade budaya berlangsung.</li>
            <li>Kenakan pakaian yang nyaman karena sebagian besar acara berlangsung di ruang terbuka.</li>
            <li>Bawa kamera untuk mengabadikan momen spektakuler dari berbagai pertunjukan seni dan parade.</li>
            <li>Jelajahi bazaar kuliner dan nikmati cita rasa khas Asia dan Afrika.</li>
        </ul>
        <button class="back-button" onclick="history.back()">Kembali</button>
    </div>

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
      <p>Copyright © 2025 Wanderlust. All rights reserved</p>
    </footer>
    <!--Footer-->
  </body>
  </html>