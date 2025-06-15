<?php
include "config.php";

$ID = $_SESSION['user_id'];
$paket_id = $_GET['paket_id'];
$tempatwisata_id = $_GET['tempatwisata_id'];

$sqlCheck = "SELECT * FROM paketwisata WHERE paket_id='$paket_id' AND tempatwisata_id ='$tempatwisata_id'";
$queryCheck = mysqli_query($conn, $sqlCheck);
$paketCheck = mysqli_fetch_assoc($queryCheck);

if ($paketCheck) {
    
    $deletePaket = "DELETE FROM paketwisata WHERE paket_id = '$paket_id'";
    mysqli_query($conn, $deletePaket);

    header("location: /Proyek Wanderlust/wanderlust_project/indeks.php?page=daftarPaket&tempatwisata_id=$tempatwisata_id");
    exit();
} else {
    echo "<p>Adding property failed</p>";
}

mysqli_close($conn);
?>