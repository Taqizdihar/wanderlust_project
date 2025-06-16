<?php
include "config.php";

$ID = $_SESSION['user_id'];
$tempatwisata_id = $_GET['tempatwisata_id'];

$sqlStatement = "SELECT * FROM tempatwisata WHERE tempatwisata_id='$tempatwisata_id' AND pw_id ='$ID'";
$query = mysqli_query($conn, $sqlStatement);
$dataLokasi = mysqli_fetch_assoc($query);

if ($dataLokasi) {
    
    $deleteFoto = "DELETE FROM fotowisata WHERE tempatwisata_id = '$tempatwisata_id'";
    mysqli_query($conn, $deleteFoto);

    $deletePaket = "DELETE FROM paketwisata WHERE tempatwisata_id = $tempatwisata_id";
    mysqli_query($conn, $deletePaket);

    $deleteLokasi = "DELETE FROM tempatwisata WHERE tempatwisata_id = '$tempatwisata_id'";
    mysqli_query($conn, $deleteLokasi);

    $deleteFotoFolder = "SELECT link_foto FROM fotowisata WHERE tempatwisata_id='$tempatwisata_id'";
    $queryFolder = mysqli_query($conn, $deleteFotoFolder);
    $foto = mysqli_fetch_assoc($queryFolder);

    while ($foto) {
            $path = 'pemilikWisata/foto/'.$foto['link_foto'];
            if (file_exists($path)) {
            unlink($path);
        }
    }

    header("location: indeks.php?page=daftarWisata");
    exit();
} else {
    echo "Delete failed";
}
mysqli_close($conn);
?>