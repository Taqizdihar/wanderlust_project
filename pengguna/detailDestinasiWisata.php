<?php
include "config.php";

if (isset($_POST['tambah_favorit'])) {
    $tempatwisata_id = $_POST['tempatwisata_id'];
    $wisatawan_id = $_SESSION['user_id'];

    $cekQuery = "SELECT * FROM wishlist WHERE wisatawan_id = '$wisatawan_id' AND tempatwisata_id = '$tempatwisata_id'";
    $cekResult = mysqli_query($conn, $cekQuery);

    if (mysqli_num_rows($cekResult) == 0) {
        $sqlInsert = "INSERT INTO wishlist (wisatawan_id, tempatwisata_id) VALUES ('$wisatawan_id', '$tempatwisata_id')";
        mysqli_query($conn, $sqlInsert);
    }
}

$ID = $_SESSION['user_id'];
$tempatwisata_id = $_GET['tempatwisata_id'];

$sqlStatement1 = "SELECT * FROM tempatwisata WHERE tempatwisata_id = '$tempatwisata_id'";
$query1 = mysqli_query($conn, $sqlStatement1);
$tempatwisata = mysqli_fetch_assoc($query1);

$sqlStatement2 = "SELECT * FROM ulasan WHERE tempatwisata_id = '$tempatwisata_id'";
$query2 = mysqli_query($conn, $sqlStatement2);

$sqlStatement3 = "SELECT * FROM paketwisata WHERE tempatwisata_id = '$tempatwisata_id'";
$query3 = mysqli_query($conn, $sqlStatement3);

$sqlStatement4 = "SELECT link_foto FROM fotowisata WHERE tempatwisata_id='$tempatwisata_id' ORDER BY urutan";
$foto_query = mysqli_query($conn, $sqlStatement4);
$fotos = [];
while ($barisTabel = mysqli_fetch_assoc($foto_query)) {
    $fotos[] = $barisTabel['link_foto'];
}

$pw_id = $tempatwisata['pw_id'];
$sqlStatement5 = "SELECT * FROM pemilikwisata WHERE pw_id = '$pw_id'";
$query5 = mysqli_query($conn, $sqlStatement5);
$pemilikwisata = mysqli_fetch_assoc($query5);

$sqlRating = "SELECT AVG(rating) as avg_rating, COUNT(ulasan_id) as total_reviews FROM ulasan WHERE tempatwisata_id = '$tempatwisata_id'";
$ratingQuery = mysqli_query($conn, $sqlRating);
$ratingData = mysqli_fetch_assoc($ratingQuery);
$avg_rating = round($ratingData['avg_rating'], 1);
$total_reviews = $ratingData['total_reviews'];

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Wisata - <?= $tempatwisata['nama_lokasi']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="pengguna/cssPengguna/detailDestinasiWisata.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <?php include "pengguna/Header.php";?>    

    <div class="header-image" style="background-image: url('pemilikWisata/foto/<?= $fotos[0]; ?>');">
        <button onclick="history.back()" class="back-button">Go back</button>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8">
                <h2><?= $tempatwisata['nama_lokasi']; ?></h2>
                <p class="text-muted"><?= $tempatwisata['jenis_wisata']; ?></p>
                <p><strong><i class="fas fa-clock"></i> Operational Hours:</strong> <?= $tempatwisata['waktu_buka']; ?> - <?= $tempatwisata['waktu_tutup']; ?></p>

                <hr>

                <h3>Description</h3>
                <p><?= $tempatwisata['deskripsi']; ?></p>

                <hr>

                <h3>Address</h3>
                <p><?= $tempatwisata['alamat_lokasi']; ?></p>

                <hr>

                <h3>Owner</h3>
                <div class="d-flex align-items-center owner-section">
                    <img src="pemilikWisata/foto/fotoProfil/<?= $pemilikwisata['foto_instansi']; ?>" alt="Group Photo">
                    <div class="ms-3">
                        <h5><?= $pemilikwisata['instansi']; ?></h5>
                        <p class="mb-0">This place is managed and/or owned by <?= $pemilikwisata['instansi']; ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="rating-overview text-center mb-4">
                    <h4>Rating Overview</h4>
                    <span class="display-4 fw-bold"><?php echo $avg_rating; ?></span>
                    <i class="fas fa-star text-warning"></i>
                    <p class="text-muted">(<?php echo $total_reviews; ?> reviews)</p>
                </div>
                
                <h4>Photos</h4>
                <div class="row">
                    <?php 
                    for ($i=1; $i < count($fotos); $i++) { 
                    ?>
                    <div class="col-6 mb-3">
                        <img src="pemilikWisata/foto/<?= $fotos[$i]; ?>" class="grid-image">
                    </div>
                    <?php 
                        } 
                    ?>
                </div>
            </div>
        </div>

        <hr class="my-5">

        <h2 class="mb-4">Packages</h2>
        <div class="row">
            <?php while ($paket = mysqli_fetch_assoc($query3)) : ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card card-package">
                        <img src="pemilikWisata/foto/paketWisata/<?= $paket['foto_paket']; ?>" class="card-img-top" alt="Foto Paket">
                        <div class="card-body">
                            <h5 class="card-title"><?= $paket['nama_paket']; ?></h5>
                            <p class="card-text"><?= $paket['deskripsi']; ?></p>
                            <h4 class="mb-3">Rp. <?php echo number_format($paket['harga'], 0, ',', '.'); ?></h4>
                            <p class="text-muted">Tax included</p>
                            <a href="indeks.php?page=reservasiTiket&tempatwisata_id=<?= $tempatwisata_id?>&paket_id=<?= $paket['paket_id']?>" class="btn btn-success w-100">Choose button</a>
                            <small class="text-center d-block mt-2"><?= $paket['jumlah_tiket']; ?> tickets left</small>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <hr class="my-5">

        <h2 class="mb-4">Reviews</h2>
        <div class="row">
             <?php while ($ulasan = mysqli_fetch_assoc($query2)) : ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card card-review">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0"><?php echo htmlspecialchars($ulasan['nama_pengulas']); ?></h5>
                                <span class="badge bg-warning text-dark"><?php echo htmlspecialchars($ulasan['rating']); ?> <i class="fas fa-star"></i></span>
                            </div>
                            <hr>
                            <p class="card-text">"<?php echo htmlspecialchars($ulasan['komentar']); ?>"</p>
                        </div>
                    </div>
                </div>
             <?php endwhile; ?>
        </div>
    </div>

    <?php include "pengguna/Footer.php"?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>