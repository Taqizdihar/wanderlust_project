<?php
include "config.php";

$ID = $_SESSION['user_id'];
$sqlUser = "SELECT * FROM user WHERE user_id='$ID'";
$queryUser = mysqli_query($conn, $sqlUser);
$profile = mysqli_fetch_assoc($queryUser);

$sqlTempatWisata = "SELECT nama_lokasi FROM tempatwisata WHERE pw_id='$ID'";
$queryTempatWisata = mysqli_query($conn, $sqlTempatWisata);
$lokasi = mysqli_fetch_all($queryTempatWisata, MYSQLI_ASSOC);

$sqlTransaksi = "SELECT jumlah_tiket FROM transaksi WHERE tempatwisata_id ='$lokasi'";
$queryTransaksi = mysqli_query($conn, $sqlTransaksi);
$transaksi = mysqli_fetch_all($queryTransaksi, MYSQLI_ASSOC);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="pemilikWisata/cssWisata/dashboardWisata.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<?php include "pemilikWisata/viewsWisata.php";?>


<div class="main">
    <h2>Welcome, <b><?= $profile['nama']?></b></h2>

        <div class="card">
            <h3>Properties</h3>
            <div class="stat"><?= count($lokasi)?></div>
        </div>

        <div class="card">
            <h3>Revenue</h3>
            <div class="stat"><?= $profile['saldo'];?></div>
        </div>

        <div class="card">
            <h3>Ticket Sold</h3>
            <div class="stat"><?= count($transaksi)?></div>
        </div>
</div>

</body>
</html>
