<?php
include 'config.php';

$ID = $_SESSION['user_id'];
$sqlStatement1 = "SELECT * FROM user WHERE user_id='$ID'";
$query = mysqli_query($conn, $sqlStatement1);
$profile = mysqli_fetch_assoc($query);

$sqlStatement2 = "SELECT * FROM pemilikwisata";
$query = mysqli_query($conn, $sqlStatement2);
$PWProfile = mysqli_fetch_assoc($query);

$sqlStatement3 = "
    SELECT lokasi.*, foto_lokasi.url_photo, user.nama AS nama_pemilik
    FROM lokasi
    LEFT JOIN foto_lokasi 
        ON lokasi.id_lokasi = foto_lokasi.id_lokasi 
        AND foto_lokasi.urutan = 1
    LEFT JOIN pemilikwisata 
        ON lokasi.pw_id = pemilikwisata.pw_id
    LEFT JOIN user 
        ON pemilikwisata.pw_id = user.user_id";
$query = mysqli_query($conn, $sqlStatement3);

$lokasi = [];
while ($row = mysqli_fetch_assoc($query)) {
    $lokasi[] = $row;
}

if (isset($_GET['aksi'], $_GET['id'])) {
  $id = $_GET['id'];
  $aksi = $_GET['aksi'];
  $message = "";

  if ($aksi === 'acc') {
    $message = "✅ Wisata ID $id diterima.";
  } else if ($aksi === 'tolak') {
    $message = "❌ Wisata ID $id ditolak.";
  }
  $feedback = $message;
}


?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Verifikasi Tempat Wisata</title>
  <link rel="stylesheet" href="administrator/cssAdmin/accwisata.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <?php include "viewsAdmin.php";?>
    <div class="main">
      <h2>Property Verification</h2>
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
                <h2><?= $itemLokasi['nama_lokasi'];?><span class="status"><?= $itemLokasi['status'];?></span></h2>
                <div class="hours">
                   <p class="owner"><b>Owner:</b> <?= $itemLokasi['nama_pemilik']?></p>
                </div>
            </div>
            <div class="actions">
                <a href="indeks.php?page=accproperti&id_lokasi=<?= $itemLokasi['id_lokasi']; ?>&PWID=" id="see">Review</a>
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