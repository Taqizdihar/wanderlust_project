<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wanderlust</title>
    <link rel="stylesheet" href="Home.css">
    <!-- Google Fonts dan Font Awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

    <!-- Header -->
    <header>
        <div class="header-content">
            <div class="header-logo">
                <a href="#">Wanderlust</a>
            </div>
            <nav class="navbar">
                <ul>
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Destinasi</a></li>
                    <li><a href="#">Event</a></li>
                    <li><a href="#">Tentang</a></li>
                    <li><a href="#"><img src="user.jpg" alt="User"></a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Banner -->
    <section id="home-banner">
        <h1>Selamat Datang di Wanderlust</h1>
        <p>Temukan keindahan dunia, satu langkah dalam petualanganmu</p>
        <div class="search-button">
            <input type="text" placeholder="Cari destinasi impianmu...">
            <button><i class="fas fa-search"></i> Cari</button>
        </div>
    </section>

    <!-- Heading -->
    <div class="home-heading">
        <h2>Destinasi Populer</h2>
        <a class="destination" href="#">Lihat semua</a>
    </div>

    <!-- Card Gallery -->
    <div class="card-gallery">
        <div class="cards-destination">
            <div class="card-images" style="background-image: url('bali.jpg');">
                <h4>Bali</h4>
            </div>
            <div class="destination-content">
                <p>Pulau Dewata dengan pantai eksotis dan budaya unik.</p>
                <div class="stars">
                    <i class="fas fa-star"></i><span>4.8</span>
                </div>
                <a class="card-button" href="#">Jelajahi</a>
            </div>
        </div>
        <div class="cards-destination">
            <div class="card-images" style="background-image: url('yogyakarta.jpg');">
                <h4>Yogyakarta</h4>
            </div>
            <div class="destination-content">
                <p>Kota budaya dengan candi megah dan kuliner khas.</p>
                <div class="stars">
                    <i class="fas fa-star"></i><span>4.7</span>
                </div>
                <a class="card-button" href="#">Jelajahi</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-logo">
                <i class="fas fa-map-marked-alt"></i>
                <span>Wanderlust</span>
            </div>
            <div class="footbar">
                <table>
                    <tr><td><a href="#">Kontak Kami</a></td></tr>
                    <tr><td><a href="#">Kebijakan Privasi</a></td></tr>
                    <tr><td><a href="#">Syarat & Ketentuan</a></td></tr>
                </table>
            </div>
        </div>
        <p>&copy; <?php echo date("Y"); ?> Wanderlust. All rights reserved.</p>
    </footer>

</body>
</html>