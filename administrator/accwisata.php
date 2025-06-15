<?php
include 'config.php';

$ID = $_SESSION['user_id'];
$sqlStatement = "SELECT * FROM user WHERE user_id='$ID'";
$query = mysqli_query($conn, $sqlStatement);
$profile = mysqli_fetch_assoc($query);

$sqlStatement = "SELECT * FROM pemilikwisata";
$query = mysqli_query($conn, $sqlStatement);
$PWProfile = mysqli_fetch_assoc($query);

$sqlStatement3 = "
    SELECT tempatwisata.*, fotowisata.link_foto, user.nama AS nama_pemilik
    FROM tempatwisata LEFT JOIN fotowisata ON tempatwisata.tempatwisata_id = fotowisata.tempatwisata_id 
    AND fotowisata.urutan = 1 LEFT JOIN pemilikwisata ON tempatwisata.pw_id = pemilikwisata.pw_id
    LEFT JOIN user ON pemilikwisata.pw_id = user.user_id";
$query = mysqli_query($conn, $sqlStatement3);

$lokasi = [];
while ($row = mysqli_fetch_assoc($query)) {
    $lokasi[] = $row;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Property Verification</title>
  <link rel="stylesheet" href="administrator/cssAdmin/accwisata.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <?php include "viewsAdmin.php";?>
    <div class="main">
      <h2>Property Verification List</h2>
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
                <?php elseif($itemLokasi['status'] == 'active'):?>
                <h2><?= $itemLokasi['nama_lokasi'];?><span class="status" style="background-color: #0d8a09;"><?= $itemLokasi['status'];?></span></h2>
                <?php elseif($itemLokasi['status'] == 'rejected'):?>
                <h2><?= $itemLokasi['nama_lokasi'];?><span class="status" style="background-color:rgb(138, 9, 9);"><?= $itemLokasi['status'];?></span></h2>
                <?php endif; ?>
                <div class="hours">
                   <p class="owner"><b>Owner:</b> <?= $itemLokasi['nama_pemilik']?></p>
                </div>
            </div>
            <div class="actions">
                <a href="indeks.php?page=accproperti&id_lokasi=<?= $itemLokasi['tempatwisata_id']; ?>&PWID=" id="see">Review</a>
            </div>
        </div>

        <?php
                }
            }
        mysqli_close($conn);
        ?>

    </div>
</body>
</html>