<?php
include "config.php";

$ID = $_SESSION['user_id'];
$tempatwisata_id = $_GET['tempatwisata_id'];

$sqlPaket = "SELECT paket_id, foto_paket, nama_paket, deskripsi, harga, jumlah_tiket FROM paketwisata WHERE tempatwisata_id = '$tempatwisata_id'";
$queryPaket = mysqli_query($conn, $sqlPaket);

$paket = [];
while ($row = mysqli_fetch_assoc($queryPaket)) {
    $paket[] = $row;
}


?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Management</title>
    <link rel="stylesheet" href="pemilikWisata/cssWisata/daftarPaket.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include "pemilikWisata/viewsWisata.php"?>
    <div class="main-container">

        <div class="page-header">
            <h1>Paket Wisata Anda</h1>
            <a href="indeks.php?page=addPaket" class="add-package-btn">Add new package</a>
        </div>

        <div class="package-grid">
            <?php
            if ($paket > 0) {
                foreach ($paket as $itemPaket) {
            ?>

            <div class="card">
                <img src="pemilikWisata/foto/paketWisata/<?= $itemPaket['foto_paket']; ?>" alt="Package Photo" class="card-img">
                <div class="card-content">
                    <h2 class="card-title"><?= $itemPaket['nama_paket'] ?></h2>
                    <p class="card-description"><?= $itemPaket['deskripsi']?></p>
                    <div class="card-info">
                        <span class="card-price"><?= $itemPaket['harga']?></span>
                        <span class="card-tickets"><?= $itemPaket['jumlah_tiket']?> Tiket</span>
                    </div>

                    <a href="indeks.php?page=kelolaPaket?paket_id=<?= $itemPaket['paket_id']?>" class="manage-btn">Manage</a>
                </div>
            </div>

            <?php
                }
            } else {
                echo "<div class='no-data'><p>Belum ada paket wisata yang ditambahkan. Silakan klik tombol 'Add new package' untuk memulai.</p></div>";
            }

            ?>
        </div>
    </div>
</body>
</html>
