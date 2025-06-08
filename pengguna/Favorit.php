<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saved Destination - Wanderlust</title>
    <link rel="stylesheet" href="cssPengguna/Favorit.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="logo">🌍 Wanderlust</div>
        <input type="text" class="search-bar" placeholder="Search...">
        <nav class="nav">
            <a href="#">Option 1</a>
            <a href="#">Option 2</a>
            <a href="#">Option 3</a>
            <img src="profile.jpg" alt="Profile" class="profile-img">
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <h1 class="page-title">Saved Destination</h1>

        <div class="destination-list">
            <?php
            $destinations = [
                [
                    'name' => 'National Museum of Indonesia',
                    'price' => 'Rp 25.000',
                    'quota' => '100 tickets',
                    'rating' => '4.5',
                    'reviews' => '1315',
                    'image' => '../Umum/Images/National Museum of Indonesia.jpg'
                ],
                [
                    'name' => 'Bandung Zoo',
                    'price' => 'Rp 50.000',
                    'quota' => '80 tickets',
                    'rating' => '4.7',
                    'reviews' => '1320',
                    'image' => '../Umum/Images/Bandung Zoo.jpg'
                ],
                [
                    'name' => 'Mount Bromo',
                    'price' => 'Rp 125.000',
                    'quota' => '60 tickets',
                    'rating' => '4.9',
                    'reviews' => '1602',
                    'image' => '../Umum/Images/Mount Bromo.jpg'
                ],
                [
                    'name' => 'Borobudur Temple',
                    'price' => 'Rp 50.000',
                    'quota' => '90 tickets',
                    'rating' => '4.8',
                    'reviews' => '1370',
                    'image' => '../Umum/Images/Borobudur Temple.jpg'
                ],
                [
                    'name' => 'The Great Asia Africa',
                    'price' => 'Rp 44.000',
                    'quota' => '70 tickets',
                    'rating' => '4.6',
                    'reviews' => '1209',
                    'image' => '../Umum/Images/The Great Asia Africa.jpg'
                ]
            ];

            foreach ($destinations as $d) {
                echo "
                <div class='card'>
                    <img src='{$d['image']}' alt='{$d['name']}' class='card-img'>
                    <div class='card-content'>
                        <h2>{$d['name']}</h2>
                        <p>🎫 Ticket: {$d['price']}</p>
                        <p>📦 Quota: {$d['quota']}</p>
                        <p>⭐ {$d['rating']} ({$d['reviews']} reviews)</p>
                    </div>
                    <div class='card-actions'>
                        <button class='remove-btn'>Remove</button>
                        <button class='book-btn'>Book Now</button>
                    </div>
                </div>
                ";
            }
            ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-left">
                <div class="logo">🌍 Wanderlust</div>
            </div>
            <div class="footer-links">
                <a href="#">Tentang Kami</a>
                <a href="#">Kontak Kami</a>
                <a href="#">FAQs</a>
                <a href="#">Komunitas</a>
                <a href="#">Tips & Trik</a>
                <a href="#">Promo</a>
                <a href="#">Profil</a>
                <a href="#">Agenda</a>
                <a href="#">Home</a>
            </div>
        </div>
        <p class="copyright">© 2025 Wanderlust. All rights reserved</p>
    </footer>
</body>
</html>