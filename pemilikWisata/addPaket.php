<?php
include "config.php"; 

$ID = $_SESSION['user_id'];
$tempatwisata_id = $_GET['tempatwisata_id'];

if (isset($_POST['submit'])) {
    $nama_paket = $_POST['nama_paket'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $foto_paket = $_FILES['foto_paket'];

    if (isset($foto_paket)) {
    $uploadFotoPaket = 'pemilikWisata/foto/paketWisata/'.basename($foto_paket['name']);
    
      if (move_uploaded_file($foto_paket['tmp_name'], $uploadFotoPaket)) {
        $uploadNewPaket = $foto_paket['name'];
      } else {
        $uploadNewPaket = null;
      }
    }

    $sqlPaketWisata = "INSERT INTO paketwisata (tempatwisata_id, foto_paket, nama_paket, deskripsi, harga, jumlah_tiket) 
                         VALUES ('$tempatwisata_id', '$uploadNewPaket', '$nama_paket', '$deskripsi', '$harga', '$jumlah')";
    $queryPaket = mysqli_query($conn, $sqlPaketWisata);

    if (mysqli_affected_rows($conn) != 0) {
        header("location: /Proyek Wanderlust/wanderlust_project/indeks.php?page=daftarPaket");
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
    <title>Add new package</title>
    <link rel="stylesheet" href="pemilikWisata/cssWisata/addWisata.css">
</head>
<body>
    <?php include "pemilikWisata/viewsWisata.php";?>
    <div class="container">
        <h2>Add new tourism package</h2>
        <p class="subtitle">Fill all necessary informations for the package below</p>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="photo-group">
                <label for="foto_paket">Upload package photo</label><br>
                <input type="file" name="foto_paket" id="foto_paket" accept="image/*" onchange="previewFoto()"><br><br>
                <img id="preview" src="#" alt="Pratinjau Foto" style="display:none; max-height: 200px; border: 1px solid #ccc; margin-top:10px;">
            </div>    

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
                <input type="number" id="harga" name="harga" required placeholder="Example: 100000">
            </div>

            <div class="form-group">
                <label for="jumlah">Stock</label>
                <input type="number" id="jumlah" name="jumlah" required placeholder="Example: 50">
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="submit-btn">Add package</button>
            </div>
        </form>
    </div>

    <script>
    function previewFoto() {
        const input = document.getElementById('foto_paket');
        const preview = document.getElementById('preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>

</body>
</html>
