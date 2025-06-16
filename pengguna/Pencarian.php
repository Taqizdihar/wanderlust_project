<?php
include "config.php";

$ID = $_SESSION['user_id'] ?? null;
$kataKunci = $_GET['kataKunci'];

$sqlStatement1 = "SELECT tempatwisata.*, fotowisata.link_foto FROM tempatwisata JOIN fotowisata
ON tempatwisata.tempatwisata_id = fotowisata.tempatwisata_id AND fotowisata.urutan = 1
WHERE tempatwisata.nama_lokasi LIKE '%$kataKunci%' OR
tempatwisata.deskripsi LIKE '%$kataKunci%' OR tempatwisata.sumir LIKE '%$kataKunci%'";
$query1 = mysqli_query($conn, $sqlStatement1);

$hasilPencarian = [];
while ($row = mysqli_fetch_assoc($query1)) {
    $hasilPencarian[] = $row;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Pencarian</title>
    <link rel="stylesheet" href="pengguna/cssPengguna/Pencarian.css">
</head>
<body>

    <?php include "pengguna/Header.php";?>

<main class="main-content">
    <div class="section-title">
        <h2>Result for <?= $kataKunci?></h2>

        <div class="filter">
            <label>Category</label>
            <select>
                <option selected>Most Relevant</option>
            </select>
        </div>
    </div>

    <div class="card-gallery">
        <?php foreach ($hasilPencarian as $hasil): ?>
            <div class="cards-destination">
            <div class="card-images" style="background-image: url('pemilikWisata/foto/<?= $hasil['link_foto']; ?>');">
                <h4><?= $hasil['nama_lokasi']; ?></h4>
            </div>
            <div class="destination-content">
                <p><?= $hasil['sumir']; ?></p>
                <div class="stars"></div>
                <a class="card-button" href="indeks.php?page=detailDestinasiWisata&tempatwisata_id=<?= $hasil['tempatwisata_id']; ?>">Check</a>
            </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

    <?php include "pengguna/Footer.php";?>

</body>
</html>