<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="Wanderlust2.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
</head>
<body>
    <header>
        <div class="header-content">
            <div class="header-logo">
                <img src="Images/Wanderlust Logo Circle.png" height="50" width="50" alt="Logo Wanderlust">
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

    <main class="profil-container">
        <div class="profil-card">
            <img src="Images/PP.jpg" alt="Foto Profil Pengguna">
            <h2>Nama Pengguna</h2>
            <p>Email: pengguna@example.com</p>
            <p>Telepon: 0812-XXXX-XXXX</p>
            <a href="EditProfil.php" class="edit-button">Edit Profil</a>
        </div>
    </main>

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
        <p>Copyright © 2025 Wanderlust. All rights reserved</p>
    </footer>
</body>
</html>