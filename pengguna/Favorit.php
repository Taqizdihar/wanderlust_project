<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorit</title>
    <link rel="stylesheet" href="Wanderlust2.css">
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
    <h2 class="home-heading">Favorit</h2>
    <div class="card-gallery">
        <?php
        $destinasi = [
            ["Bandung", "Masjid Al-Jabbar", "Images/Masjid Al-Jabbar.jpeg", "14K", "FREE", ["mosque", "square-parking"]],
            ["Rancabali", "Glamping Lakeside", "Images/Glamping Ciwidey.jpg", "18K", "PAID", ["bed", "utensils", "camera"]],
            ["Lembang", "The Great Asia Africa", "Images/The Great Asia Afrika.jpg", "21K", "PAID", ["utensils", "camera", "gifts"]],
            ["Ciater", "D'Castello", "Images/D'Castello.jpg", "12K", "PAID", ["utensils", "camera", "gifts"]],
        ];
        foreach ($destinasi as [$lokasi, $nama, $gambar, $rating, $biaya, $ikon]) {
            echo '<div class="cards-destination">
                    <div class="card-images" style="background-image: url('.$gambar.');">
                        <h4>'.$lokasi.'</h4>
                    </div>
                    <div class="destination-content">
                        <h3>'.$nama.'</h3>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <p>'.$rating.'</p>
                        </div>
                        <div class="home-icons">';
            foreach ($ikon as $icon) {
                echo '<i class="fa-solid fa-'.$icon.'"></i>';
            }
            echo '<p>'.$biaya.'</p>
                        </div>
                        <a href="#" class="card-button">Cek Info Lengkap</a>
                    </div>
                </div>';
        }
        ?>
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