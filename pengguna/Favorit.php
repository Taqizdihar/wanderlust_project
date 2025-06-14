<?php

include "config.php";

$ID = $_SESSION['user_id'];

$sqlStatement1 = "SELECT * FROM wishlist ";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Saved Destinations</title>
  <link rel="stylesheet" href="pengguna/cssPengguna/Favorit.css">
</head>
<body>

  <?php include "pengguna/Header.php";?>

  <h1 class="page-title">Saved Destination</h1>
  <div class="card-container">
    <?php foreach ($destinations as $dest): ?>
      <div class="card">
        <img src="<?= $dest['image'] ?>" class="card-img" alt="<?= $dest['title'] ?>">
        <div class="card-content">
          <div>
            <h2><?= $dest['title'] ?></h2>
            <div class="card-info">
              <p>🎫 Ticket <?= $dest['ticket'] ?></p>
              <p>📦 Kuota <?= $dest['quota'] ?></p>
              <p>⭐ <?= $dest['rating'] ?> (<?= $dest['reviews'] ?>)</p>
            </div>
          </div>
          <div class="card-buttons">
            <button class="remove-btn">Remove</button>
            <button class="book-btn">Book Now</button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <?php include "pengguna/Footer.php";?>
</body>
</html>