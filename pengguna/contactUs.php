<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami</title>
    <link rel="stylesheet" href="Wanderlust.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert+One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Header -->
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
                    <li><a href="PemesananTiket.php">Tiket</a></li>
                    <li><a href="Tips.php">Tips</a></li>
                    <li><a href="ContactUs.php">Kontak Kami</a></li>
                    <li><a href="Agenda.php">Agenda</a></li>
                    <li><a href="Profil.php"><img src="Images/PP.jpg" alt="Foto Profil"></a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <div class="home-content">
        <div class="form-container">
            <div class="form-banner"></div>
            <div class="the-form">
                <h2>Kontak Kami</h2>
                <p>Mari mengenal <span>Wanderlust</span> lebih dekat dengan mengontak kami</p>
                <form action="#" method="post" class="form-content">
                    <div class="form-name">
                        <label for="input-name">Nama Lengkap</label>
                        <input type="text" id="input-name" name="namalengkap" placeholder="Masukkan Nama Lengkap" required>
                    </div>
                    <div class="form-contacts">
                        <div class="form-email">
                            <label for="input-email">Email</label>
                            <input type="email" id="input-email" name="email" placeholder="Masukkan Email" required> 
                        </div>
                        <div class="form-phone">
                            <label for="input-phone">Telepon</label>
                            <input type="tel" id="input-phone" name="phone" placeholder="Masukkan Telepon" required>
                        </div>
                    </div>
                    <div class="form-select">
                        <div class="nationality">
                            <label>Negara Asal</label>
                            <select name="kewarganegaraan" required>
                                <option value="indonesia">Indonesia</option>
                                <option value="non-indonesia">Non-Indonesia</option>
                            </select>
                        </div>
                        <div class="reason">
                            <label>Tujuan Kontak</label>
                            <select name="tujuan" required>
                                <option value="pertanyaan">Pertanyaan</option>
                                <option value="kritik-saran">Kritik & Saran</option>
                                <option value="laporan">Laporan</option>
                            </select>
                        </div>
                    </div>
                    <div class="lower-form">
                        <label for="pesan">Pesan</label>
                        <textarea name="pesan" id="pesan" placeholder="Tulis Pesan Anda" required></textarea>
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
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
        <p>&copy; 2025 Wanderlust. All rights reserved.</p>
    </footer>
</body>
</html>