<?php
include "config.php";

$sqlStatement = "
    SELECT lokasi.*, foto_lokasi.url_photo
    FROM lokasi
    LEFT JOIN foto_lokasi 
        ON lokasi.id_lokasi = foto_lokasi.id_lokasi 
        AND foto_lokasi.urutan = 1
    WHERE lokasi.pw_id = '$ID'
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
    <link rel="stylesheet" href="pengelolaWisata/cssWisata/daftarWisata.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include "pengelolaWisata/viewsWisata.php";?>

    <div class="main">


        <?php
            if ($PWProfile['entity_approval'] == 'review') {
        ?>

            <div class="reviewed">
                <i class="fa-solid fa-money-check"></i>
                <p>Your identity and business legals are in review.
                    Please come back later to add your property. Our most regards.
                </p>
            </div>

        <?php
            }    
            if ($PWProfile['entity_approval'] == 'approved') {
        ?>

        <a href="indeks.php?page=addWisata" class="approved">Click here to add a property +</a>

        <?php
            if (!empty($lokasi)) {
                foreach ($lokasi as $itemLokasi) {
                    $lokasiID = $itemLokasi['id_lokasi'];
                    $sqlFoto = "SELECT * FROM foto_lokasi WHERE id_lokasi='$lokasiID' AND urutan=1";
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
                    <img src="pengelolaWisata/photos/<?= $itemLokasi['url_photo']?>" alt="Property Image">
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
                <div class="details">
                    <div><b>Ticket Price: </b><?= $itemLokasi['harga_tiket'];?></div>
                    <div><b>Ticket Quota: </b><?= $itemLokasi['jumlah_tiket'];?></div>
                </div>
            </div>
            <div class="actions">
                <a href="indeks.php?page=seeWisata&id_lokasi=<?= $itemLokasi['id_lokasi']; ?>" id="see">View</a>
                <a href="indeks.php?page=editWisata&id_lokasi=<?= $itemLokasi['id_lokasi']; ?>" id="edit">Edit</a>
                <a href="indeks.php?page=deleteWisata&id_lokasi=<?= $itemLokasi['id_lokasi']; ?>" id="delete" onclick="return confirm('Are you sure you want to delete this property? Action cannot be undone')">Delete</a>
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