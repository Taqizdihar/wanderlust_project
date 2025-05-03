<?php
include "config.php";

$ID = $_SESSION['user_id'];
$lokasi_id = $_GET['id_lokasi'];

$sqlStatement = "SELECT * FROM lokasi WHERE id_lokasi='$lokasi_id' AND pw_id ='$ID'";
$query = mysqli_query($conn, $sqlStatement);
$dataLokasi = mysqli_fetch_assoc($query);

if ($dataLokasi) {
    
    $deleteFoto = "DELETE FROM foto_lokasi WHERE id_lokasi = '$lokasi_id'";
    mysqli_query($conn, $deleteFoto);

    $deleteLokasi = "DELETE FROM lokasi WHERE id_lokasi = '$lokasi_id'";
    mysqli_query($conn, $deleteLokasi);

    $deleteFotoFolder = "SELECT url_photo FROM foto_lokasi WHERE id_lokasi='$lokasi_id'";
    $queryFolder = mysqli_query($conn, $deleteFotoFolder);
    $foto = mysqli_fetch_assoc($queryFolder);

    while ($foto) {
            $path = 'pengelolaWisata/photos/'.$foto['url_photo'];
            if (file_exists($path)) {
            unlink($path); // Hapus file
        }
    }

    header("location: indeks.php?page=daftarWisata");
    exit();
} else {
    echo "Delete failed";
}
mysqli_close($conn);
?>