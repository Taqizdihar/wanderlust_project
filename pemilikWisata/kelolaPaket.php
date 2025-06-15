<?php
include "config.php"; 

$ID = $_SESSION['user_id'];
$paket_id = $_GET['paket_id'];

$sqlGetPaket = "SELECT * FROM paketwisata WHERE paket_id = '$paket_id'";
$queryGetPaket = mysqli_query($conn, $sqlGetPaket);
$data_paket = mysqli_fetch_assoc($queryGetPaket);

if (isset($_POST['submit'])) {
    $nama_paket_baru = $_POST['nama_paket'];
    $deskripsi_baru = $_POST['deskripsi'];
    $harga_baru = $_POST['harga'];
    $jumlah_baru = $_POST['jumlah'];
    $foto_paket_baru = $_FILES['foto_paket'];

    $nama_paket = !empty($nama_paket_baru) ? $nama_paket_baru : $data_paket['nama_paket'];
    $deskripsi = !empty($deskripsi_baru) ? $deskripsi_baru : $data_paket['deskripsi'];
    $harga = !empty($harga_baru) ? $harga_baru : $data_paket['harga'];
    $jumlah = !empty($jumlah_baru) ? $jumlah_baru : $data_paket['jumlah_tiket'];

    if (isset($foto_paket_baru) && $foto_paket_baru['error'] == 0) {
        $uploadFotoPaket = 'pemilikWisata/foto/paketWisata/'.basename($foto_paket_baru['name']);
        
        if (move_uploaded_file($foto_paket_baru['tmp_name'], $uploadFotoPaket)) {
            $uploadNewPaket = $foto_paket_baru['name'];
        } else {
            $uploadNewPaket = $data_paket['foto_paket'];
        }
    } else {
        $uploadNewPaket = $data_paket['foto_paket'];
    }

    $sqlPaketWisata = "UPDATE paketwisata SET foto_paket = '$uploadNewPaket', nama_paket = '$nama_paket', deskripsi = '$deskripsi', harga = '$harga', jumlah_tiket = '$jumlah' WHERE paket_id = '$paket_id'";
    $queryPaket = mysqli_query($conn, $sqlPaketWisata);

    if (mysqli_affected_rows($conn) != 0) {
        header("location:/Proyek Wanderlust/wanderlust_project/indeks.php?page=daftarPaket");
        exit();
    } else {
        echo "<p>Updating package failed</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit package</title>
    <link rel="stylesheet" href="pemilikWisata/cssWisata/addWisata.css">
</head>
<body>
    <?php include "pemilikWisata/viewsWisata.php";?>
    <div class="container">
        <h2>Edit tourism package</h2>
        <p class="subtitle">Update the necessary package information below</p>

        <form action="?paketwisata_id=<?php echo $paketwisata_id; ?>" method="post" enctype="multipart/form-data">
            <div class="photo-group">
                <label for="foto_paket">Upload new package photo (optional)</label><br>
                <p style="font-size: 12px; color: #888;">Current photo:</p>
                <img id="preview" src="pemilikWisata/foto/paketWisata/<?php echo $data_paket['foto_paket']; ?>" alt="Pratinjau Foto" style="display:block; max-height: 200px; border: 1px solid #ccc; margin-top:10px;">
                <br>
                <input type="file" name="foto_paket" id="foto_paket" accept="image/*" onchange="previewFoto()"><br><br>
            </div>    

            <div class="form-group">
                <label for="nama_paket">Package Name</label>
                <input type="text" id="nama_paket" name="nama_paket" required placeholder="Example: Family Package" 
                       value="<?php echo htmlspecialchars($data_paket['nama_paket']); ?>">
            </div>

            <div class="form-group">
                <label for="deskripsi">Description</label>
                <textarea id="deskripsi" name="deskripsi" rows="3" required placeholder="Add real description here"><?php echo htmlspecialchars($data_paket['deskripsi']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="harga">Price</label>
                <input type="number" id="harga" name="harga" required placeholder="Example: 100000"
                       value="<?php echo $data_paket['harga']; ?>">
            </div>

            <div class="form-group">
                <label for="jumlah">Stock</label>
                <input type="number" id="jumlah" name="jumlah" required placeholder="Example: 50"
                       value="<?php echo $data_paket['jumlah_tiket']; ?>">
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="submit-btn">Update package</button>
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