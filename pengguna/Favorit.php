<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Saved Destination</title>
  <link rel="stylesheet" href="cssPengguna/Favorit.css">
</head>
<body>
  <header class="header">
    <div class="logo">Wanderlust</div>
    <input type="text" placeholder="Search..." class="search-bar">
    <nav>
      <a href="#">Option 3</a>
      <a href="#">Option 2</a>
      <a href="#">Option 1</a>
      <img src="profile.jpg" alt="Profile" class="profile-img">
    </nav>
  </header>

  <main>
    <h1 class="title">Saved Destination</h1>
    
    <div class="card-container">
      <?php
        $destinations = [
          [
            'image' => '../Umum/Images/National Museum of Indonesia.jpg',
            'name' => 'National Museum of Indonesia',
            'price' => 'Rp 25.000',
            'quota' => '100 tickets',
            'rating' => '4.5',
            'reviews' => '1315'
          ],
          [
            'image' => '../Umum/Images/Bandung Zoo.jpg',
            'name' => 'Bandung Zoo',
            'price' => 'Rp 50.000',
            'quota' => '80 tickets',
            'rating' => '4.7',
            'reviews' => '1320'
          ],
          [
            'image' => '../Umum/Images/Mount Bromo.jpg',
            'name' => 'Mount Bromo',
            'price' => 'Rp 125.000',
            'quota' => '60 tickets',
            'rating' => '4.9',
            'reviews' => '1602'
          ],
          [
            'image' => '../Umum/Images/Borobudur Temple.jpg',
            'name' => 'Borobudur Temple',
            'price' => 'Rp 50.000',
            'quota' => '90 tickets',
            'rating' => '4.7',
            'reviews' => '920'
          ],
          [
            'image' => '../Umum/Images/The Great Asia Africa.jpg',
            'name' => 'The Great Asia Africa',
            'price' => 'Rp 44.000',
            'quota' => '75 tickets',
            'rating' => '4.6',
            'reviews' => '834'
          ]
        ];

        foreach ($destinations as $dest) {
          echo "
          <div class='card'>
            <img src='{$dest['image']}' alt='{$dest['name']}' class='card-img'>
            <div class='card-content'>
              <h2>{$dest['name']}</h2>
              <p>🎟️ Ticket: {$dest['price']}</p>
              <p>📦 Quota: {$dest['quota']}</p>
              <p>⭐ {$dest['rating']} ({$dest['reviews']} reviews)</p>
              <div class='card-buttons'>
                <button class='remove-btn'>Remove</button>
                <button class='book-btn'>Book Now</button>
              </div>
            </div>
          </div>
          ";
        }
      ?>
    </div>
  </main>

  <footer class="footer">
    <div class="footer-left">
      <div class="logo">Wanderlust</div>
      <p>Copyright © 2025 Wanderlust. All rights reserved</p>
    </div>
    <div class="footer-links">
      <a href="#">Tentang Kami</a>
      <a href="#">Kontak Kami</a>
      <a href="#">FAQs</a>
      <a href="#">Komunitas</a>
      <a href="#">Tips & Tix</a>
      <a href="#">Promo</a>
      <a href="#">Profil</a>
      <a href="#">Home</a>
    </div>
  </footer>
</body>
</html>