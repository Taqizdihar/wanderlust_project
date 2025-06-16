<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include "config.php";

$ID = $_SESSION['user_id'] ?? null;

$sqlStatement = "
    SELECT tempatwisata.*, fotowisata.link_foto 
    FROM tempatwisata 
    LEFT JOIN fotowisata 
    ON tempatwisata.tempatwisata_id = fotowisata.tempatwisata_id 
    AND fotowisata.urutan = 1";
$query = mysqli_query($conn, $sqlStatement);

if (!$query) {
    die("Query error: " . mysqli_error($conn));
}

$lokasi = [];
while ($row = mysqli_fetch_assoc($query)) {
    $lokasi[] = $row;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="pengguna/cssPengguna/Home.css">
</head>
<body>
  <?php include "pengguna/Header.php"; ?>

  <h2 class="section-title">Popular Destinations</h2>
  <div class="card-gallery">
    <?php foreach ($lokasi as $itemLokasi): 
      $foto = $itemLokasi['link_foto'] ?? 'default.jpg';
    ?>
    <div class="cards-destination">
      <div class="card-images" style="background-image: url('pemilikWisata/foto/<?= $foto; ?>');">
        <h4><?= $itemLokasi['nama_lokasi']; ?></h4>
      </div>
      <div class="destination-content">
        <p><?= $itemLokasi['sumir']; ?></p>
        <div class="stars"></div>
        <a class="card-button" href="indeks.php?page=detailDestinasiWisata&tempatwisata_id=<?= $itemLokasi['tempatwisata_id']; ?>">Details</a>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <h2 class="section-title">Recommendations</h2>
  <div class="card-gallery">
    <?php foreach ($lokasi as $itemLokasi): 
      $foto = $itemLokasi['link_foto'] ?? 'default.jpg';
    ?>
    <div class="cards-destination">
      <div class="card-images" style="background-image: url('pemilikWisata/foto/<?= $foto; ?>');">
        <h4><?= $itemLokasi['nama_lokasi']; ?></h4>
      </div>
      <div class="destination-content">
        <p><?= $itemLokasi['sumir']; ?></p>
        <div class="stars"></div>
        <a class="card-button" href="indeks.php?page=detailDestinasiWisata&tempatwisata_id=<?= $itemLokasi['tempatwisata_id']; ?>">Details</a>
      </div>
    </div>
    <?php endforeach; ?>
  </div>    

  <?php include "pengguna/Footer.php"; ?>
</body>
</html>