<?php
include "config.php";

$ID = $_SESSION['user_id'];
$lokasi_id = $_GET['id_lokasi'];

$sqlStatement1 = "SELECT * FROM user WHERE user_id='$ID'";
$query1 = mysqli_query($conn, $sqlStatement1);
$profile = mysqli_fetch_assoc($query1);

$sqlStatement2 = "SELECT * FROM tempatwisata WHERE tempatwisata_id='$lokasi_id'";
$query2 = mysqli_query($conn, $sqlStatement2);
$dataLokasi = mysqli_fetch_assoc($query2);

$sqlStatement3 = "SELECT link_foto FROM fotowisata WHERE tempatwisata_id='$lokasi_id' ORDER BY urutan";
$foto = mysqli_query($conn, $sqlStatement3);
$fotos = [];

while ($barisTabel = mysqli_fetch_assoc($foto)) {
    $fotos[] = $barisTabel['link_foto'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Verification</title>
    <link rel="stylesheet" href="administrator/cssAdmin/accproperti.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
    include "viewsAdmin.php";
    ?>
    <div class="main">
        <div class="container">
            <button class="back-button" onclick="history.back()">← Kembali</button>
            
            <img src="pemilikWisata/foto/<?= $fotos[0]?>" alt="Foto Utama Lokasi" class="main-image">
            
            <div class="image-grid">
                <?php for ($i=1; $i < count($fotos); $i++) { ?>
                    <img src="pemilikWisata/foto/<?= $fotos[$i]?>" alt="Foto 1" class="grid-image">
                <?php }?>
            </div>
            
            <div class="location-info">
                <h1></h1>
                <h1 class="location-name"><?= $dataLokasi['nama_lokasi'] ?></h1>
                <p class="location-type"><?= $dataLokasi['jenis_wisata'] ?></p>
                <p class="location-hours"><?= $dataLokasi['waktu_buka'] ?> - <?= $dataLokasi['waktu_tutup'] ?></p>
                
                <div class="ticket-info">
                </div>
            </div>
            
            <div class="description">
                <h2>Deskripsi:</h2>
                <p><?= $dataLokasi['deskripsi'] ?></p>
            </div>
            
            <div class="divider"></div>
            
            <div class="legal-document">
                <p><strong>Nomor PIC: </strong><?= $dataLokasi['nomor_pic'] ?></p>
                <a href="pengelolaWisata/photos/<?= $dataLokasi['surat_izin']?>" target="_blank">View Legal Document</a>
            </div>
            <?php if($dataLokasi['status'] != 'active'): ?>
            <div class="actions">
                <a href="indeks.php?page=propertiStatus&id=<?= $lokasi_id?>&status=active" class="edit-btn" id="active" onclick="return confirm('Are you sure you want to approve this property?')">Approve</a>
                <a href="indeks.php?page=propertiStatus&id=<?= $lokasi_id?>&status=rejected" class="edit-btn" id="rejected" onclick="return confirm('Are you sure you want to reject this property?')">Reject</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>