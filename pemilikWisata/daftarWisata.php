<?php
include "config.php";

$ID = $_SESSION['user_id'];
$sqlStatement1 = "SELECT * FROM user WHERE user_id='$ID'";
$query = mysqli_query($conn, $sqlStatement1);
$profile = mysqli_fetch_assoc($query);

$sqlStatement2 = "SELECT * FROM pemilikwisata WHERE pw_id='$ID'";
$query = mysqli_query($conn, $sqlStatement2);
$PWProfile = mysqli_fetch_assoc($query);

$sqlStatement3 = "
    SELECT tempatwisata.*, fotowisata.link_foto
    FROM tempatwisata
    LEFT JOIN fotowisata 
        ON tempatwisata.tempatwisata_id = fotowisata.tempatwisata_id
        AND fotowisata.urutan = 1
    WHERE tempatwisata.pw_id = '$ID'
";
$query = mysqli_query($conn, $sqlStatement3);

$lokasi = [];
while ($row = mysqli_fetch_assoc($query)) {
    $lokasi[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place List</title>
    <link rel="stylesheet" href="pemilikWisata/cssWisata/daftarWisata.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include "pemilikWisata/viewsWisata.php";?>

    <div class="main">


        <?php
            if ($PWProfile['status'] == 'review') {
        ?>
            <div class="reviewed">
                <i class="fa-solid fa-money-check"></i>
                <p>Your identity and business legals are in review.
                    Please come back later to add your property. Our most regards.
                </p>
            </div>
        <?php
            }    
            if ($PWProfile['status'] == 'approved') {
        ?>

        <a href="indeks.php?page=addWisata" class="approved">Click here to add a property +</a>

        <?php
            if (!empty($lokasi)) {
                foreach ($lokasi as $itemLokasi) {
                    $lokasiID = $itemLokasi['tempatwisata_id'];
                    $sqlFoto = "SELECT * FROM fotowisata WHERE tempatwisata_id='$lokasiID' AND urutan=1";
                    $queryFoto = mysqli_query($conn, $sqlFoto);

                    $fotos = [];
                    while ($rowFoto = mysqli_fetch_assoc($queryFoto)) {
                    $fotos[] = $rowFoto;
                    }
        ?>
        <div class="card">
                <?php foreach ($fotos as $foto) {
                ?>

                <div class="image">
                    <img src="pemilikWisata/foto/<?= $itemLokasi['link_foto']?>" alt="Property Image">
                </div>

                <?php
                }
                ?>
            <div class="info">
                <?php if($itemLokasi['status'] == 'review'): ?>
                <h2><?= $itemLokasi['nama_lokasi'];?><span class="status" style="background-color: #888;"><?= $itemLokasi['status'];?></span></h2>
                <?php elseif($itemLokasi['status'] == 'active'): ?>
                <h2><?= $itemLokasi['nama_lokasi'];?><span class="status" style="background-color: #0d8a09;"><?= $itemLokasi['status'];?></span></h2>
                <?php elseif($itemLokasi['status'] == 'rejected'): ?>
                <h2><?= $itemLokasi['nama_lokasi'];?><span class="status" style="background-color:rgb(138, 9, 9);"><?= $itemLokasi['status'];?></span></h2>
                <?php endif; ?>
                <div class="hours">
                    <span><?= $itemLokasi['waktu_buka'];?></span> - <span><?= $itemLokasi['waktu_tutup'];?></span>
                </div>
            </div>
            <div class="actions">
                <a href="indeks.php?page=editWisata&tempatwisata_id=<?= $itemLokasi['tempatwisata_id']; ?>" id="see">Edit</a>
                <a href="indeks.php?page=addPaket&tempatwisata_id=<?= $itemLokasi['tempatwisata_id']; ?>" id="edit">Add Package</a>
                <a href="indeks.php?page=editWisata&tempatwisata_id=<?= $itemLokasi['tempatwisata_id']; ?>" id="edit">Manage Packages</a>
                <a href="indeks.php?page=deleteWisata&tempatwisata_id=<?= $itemLokasi['tempatwisata_id']; ?>" id="delete" onclick="return confirm('Are you sure you want to delete this property? Action cannot be undone')">Delete</a>
            </div>
        </div>

        <?php
                }
            }
        }
        mysqli_close($conn);
        ?>

    </div>
</body>
</html>