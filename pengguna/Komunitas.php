<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komunitas</title>
    <link rel="stylesheet" href="Wanderlust2.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
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

    <main>
        <div class="search-container">
            <input type="text" placeholder="Cari Postingan">
            <a href="Post.php"><i class="fa-solid fa-circle-plus"></i></a>
        </div>

        <div class="post-container">
            <?php
                $posts = [
                    [
                        'avatar' => 'Faiz.jpg',
                        'name' => 'Faiz Syafiq N',
                        'image' => 'Fireworks.jpg',
                        'content' => 'Pesta kembang api terbaik yang pernah saya kunjungi di Bandung untuk malam tahun baru di Bandung! Ayo terus jalan-jalan bersama Wanderlust!',
                        'time' => '1 minggu yang lalu'
                    ],
                    [
                        'avatar' => 'Taqi.jpg',
                        'name' => 'Taqi Izdihar',
                        'image' => 'Kawah Putih.jpg',
                        'content' => 'Kawah Putih Ciwidey Bandung adalah destinasi wisata yang sangat unik dan menarik bagi saya...',
                        'time' => 'kemarin'
                    ],
                    [
                        'avatar' => 'Riska.jpg',
                        'name' => 'Riska Dea Bakri',
                        'image' => 'Concert.jpg',
                        'content' => 'Konser di Bandung berlangsung meriah!! Untungnya saya tidak melewatkannya...',
                        'time' => '3 hari yang lalu'
                    ],
                    [
                        'avatar' => 'person1.jpg',
                        'name' => 'Nabila Hasna K',
                        'image' => 'Culinary Festival.jpeg',
                        'content' => 'Festival Kuliner Bandung menurut saya sangat memuaskan dengan beragam makanan khas lokal...',
                        'time' => '5 hari yang lalu'
                    ],
                    [
                        'avatar' => 'person3.jpg',
                        'name' => 'Ayaas Ahmad G',
                        'image' => 'Bunbinban.jpeg',
                        'content' => 'Kebun Binatang di Bandung ini sangat menyenangkan untuk saya dan keluarga saya...',
                        'time' => '2 minggu yang lalu'
                    ],
                    [
                        'avatar' => 'person2.jpg',
                        'name' => 'Azkiya Latifa H',
                        'image' => 'Trans Studio Mall.jpeg',
                        'content' => 'Trans Studio Mall ini menurut saya salah satu mall di Bandung yang lengkap dengan suasana modern...',
                        'time' => '1 bulan yang lalu'
                    ],
                ];

                foreach ($posts as $post) {
                    echo '<div class="post-card">
                        <div class="post-header">
                            <div class="avatar" style="background-image: url(Images/'.$post['avatar'].');"></div>
                            <p>'.$post['name'].'</p>
                        </div>
                        <img src="Images/'.$post['image'].'" alt="Post Image">
                        <p class="post-content">'.$post['content'].'</p>
                        <p class="post-time">'.$post['time'].'</p>
                    </div>';
                }
            ?>
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