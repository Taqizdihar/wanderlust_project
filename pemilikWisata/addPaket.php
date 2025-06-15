<?php
include "config.php"; 

$ID = $_SESSION['user_id'];
$tempatwisata_id = $_GET['tempatwisata_id'];

if (isset($_POST['submit'])) {
    $nama_paket = $_POST['nama_paket'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    if (isset($suratIzin)) {
    $uploadSIUP = 'pemilikWisata/foto/dokumen/'.basename($suratIzin['name']);
    
      if (move_uploaded_file($suratIzin['tmp_name'], $uploadSIUP)) {
        $uploadNewSIUP = $suratIzin['name'];
      } else {
        $uploadNewSIUP = null;
      }
    }

    $sqlTempatWisata = "INSERT INTO tempatwisata (pw_id, nama_paket, deskripsi, jenis_wisata, waktu_buka, waktu_tutup, deskripsi, sumir, nomor_pic, surat_izin, status) 
                         VALUES ('$ID', '$nama_paket', '$deskripsi', '$jenis_wisata', '$waktu_buka', '$waktu_tutup', '$deskripsi', '$sumir', '$nomor_pic', '$uploadSuratIzin', '$status')";
    $queryTempatWisata = mysqli_query($conn, $sqlTempatWisata);

    $tempatwisata_id = mysqli_insert_id($conn);

    if (isset($_FILES['foto_wisata']) && count($_FILES['foto_wisata']['name']) == 6) {
        for ($i = 0; $i < 6; $i++) {
            $uploadFoto = 'pemilikWisata/foto/'.basename($_FILES["foto_wisata"]["name"][$i]);
            if (move_uploaded_file($_FILES['foto_wisata']['tmp_name'][$i], $uploadFoto)) {
                $link_foto = $uploadFoto;
                $urutan = $i + 1;
                $sqlFotoWisata = "INSERT INTO fotowisata (tempatwisata_id, link_foto, urutan) VALUES ('$tempatwisata_id', '$link_foto', '$urutan')";
                $queryFoto = mysqli_query($conn, $sqlFotoWisata);
            }
        }
    }

    if (mysqli_affected_rows($conn) != 0) {
        header("location: /Proyek Wanderlust/wanderlust_project/indeks.php?page=daftarWisata");
        exit();
    } else {
        echo "<p>Adding property failed</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Tempat Wisata</title>
    <link rel="stylesheet" href="pemilikWisata/cssWisata/addWisata.css">
</head>
<body>
    <?php include "pemilikWisata/viewsWisata.php";?>
    <div class="container">
        <h2>Add new tourism package</h2>
        <p class="subtitle">Fill all necessary informations for the package below</p>

        <form action="" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="nama_paket">Package Name</label>
                <input type="text" id="nama_paket" name="nama_paket" required placeholder="Example: Family Package">
            </div>

            <div class="form-group">
                <label for="deskripsi">Description</label>
                <textarea id="deskripsi" name="deskripsi" rows="3" required placeholder="Add real description here"></textarea>
            </div>

            <div class="form-group">
                <label for="harga">Price</label>
                <input type="text" id="harga" name="harga" required placeholder="Example: 100000">
            </div>

            <div class="form-group">
                <label for="jumlah">Stock</label>
                <input type="text" id="jumlah" name="jumlah" required placeholder="Example: 50">
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="submit-btn">Add package</button>
            </div>
        </form>
    </div>
</body>
</html>
