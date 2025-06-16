<?php
include "config.php";

$ID = $_SESSION['user_id'];
$tempatwisata_id = $_GET['tempatwisata_id'];
$paket_id = $_GET['paket_id'];

$sqlUser = "SELECT * FROM user WHERE user_id = '$ID'";
$queryUser = mysqli_query($conn, $sqlUser);
$user = mysqli_fetch_assoc($queryUser);

$sqlTempatWisata = "SELECT * FROM tempatwisata WHERE tempatwisata_id = '$tempatwisata_id'";
$queryTempatWisata = mysqli_query($conn, $sqlTempatWisata);
$tempatwisata = mysqli_fetch_assoc($queryTempatWisata);

$sqlUlasan = "SELECT * FROM ulasan WHERE tempatwisata_id = '$tempatwisata_id'";
$queryUlasan = mysqli_query($conn, $sqlUlasan);
$ulasan = mysqli_fetch_assoc($queryUlasan);

$sqlPaket = "SELECT * FROM paketwisata WHERE tempatwisata_id = '$tempatwisata_id' AND paket_id = '$paket_id'";
$queryPaket = mysqli_query($conn, $sqlPaket);
$paket = mysqli_fetch_assoc($queryPaket);

$sqlFoto = "SELECT link_foto FROM fotowisata WHERE tempatwisata_id='$tempatwisata_id' ORDER BY urutan";
$foto_query = mysqli_query($conn, $sqlFoto);
$fotos = [];
while ($barisTabel = mysqli_fetch_assoc($foto_query)) {
    $fotos[] = $barisTabel['link_foto'];
}

$pw_id = $tempatwisata['pw_id'];
$sqlPW = "SELECT * FROM pemilikwisata WHERE pw_id = '$pw_id'";
$queryPW = mysqli_query($conn, $sqlPW);
$pemilikwisata = mysqli_fetch_assoc($queryPW);

$sqlRating = "SELECT AVG(rating) as avg_rating, COUNT(ulasan_id) as total_reviews FROM ulasan WHERE tempatwisata_id = '$tempatwisata_id'";
$ratingQuery = mysqli_query($conn, $sqlRating);
$ratingData = mysqli_fetch_assoc($ratingQuery);
$avg_rating = round($ratingData['avg_rating'], 1);
$total_reviews = $ratingData['total_reviews'];

if (isset($_POST['submit'])) {
    $namaLengkap = $_POST['full_name'];
    $email = $_POST['email'];
    $nomorTelepon = $_POST['phone_number'];
    $tanggalKunjungan = $_POST['visit_date'];
    $jumlahTiket = $_POST['ticket_count'];
    $totalHarga = $jumlahTiket * $paket['harga'];
    $sisaTiket = $paket['jumlah_tiket'] - $jumlahTiket;

    $insertStatement = "INSERT INTO transaksi (wisatawan_id, tempatwisata_id, paket_id, jumlah_tiket, total_harga, status, tanggal_kunjungan, tanggal_transaksi)
    VALUES ('$ID', '$tempatwisata_id', '$paket_id', '$jumlahTiket', '$totalHarga', 'pending', '$tanggalKunjungan', CURRENT_TIMESTAMP)";
    $transaksiBaru = mysqli_query($conn, $insertStatement);

    $updateStatement = "UPDATE paketwisata SET jumlah_tiket = '$sisaTiket' WHERE paket_id = '$paket_id'";
    $updateTransaksi = mysqli_query($conn, $updateStatement);

    if (mysqli_affected_rows($conn) != 0) {
        header("location: /Proyek Wanderlust/wanderlust_project/indeks.php?page=Home");
        exit();
    } else {
        echo "<p>Transaction Failed</p>";
    }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve a ticket</title>
    <link rel="stylesheet" href="pengguna/cssPengguna/reservasiTiket.css">
</head>
<body>
  <button onclick="history.back()" class="back-button">Go back</button>
    <div class="container">
        <div class="left-column">
            <?php if (!empty($fotos)): ?>
                <img src="pemilikWisata/foto/<?=$fotos[0]; ?>" alt="Foto Destinasi" class="main-image">
            <?php endif; ?>
            
            <h1 class="destination-name"><?= $tempatwisata['nama_lokasi']; ?></h1>
            <p class="rating">★ 4,5<span></span></p>
            <p class="address"><?= $tempatwisata['alamat_lokasi']; ?></p>

            <div class="package-box">
                <h3><?= $paket['nama_paket']; ?></h3>
                <p><?= $paket['deskripsi']; ?></p>
                <div class="price">Rp. <?= number_format($paket['harga'] ?? 0, 0, ',', '.') ?> <small>Tax included</small></div>
            </div>
        </div>

        <div class="right-column">
            <form action="" method="post">
                <h2 class="form-title">Tourist Information</h2>

                <div class="form-group">
                    <label for="full_name">Full name</label>
                    <input type="text" id="full_name" name="full_name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="tel" id="phone_number" name="phone_number" required>
                </div>
                <div class="form-group">
                    <label for="visit_date">Date</label>
                    <input type="date" id="visit_date" name="visit_date" required>
                    <p class="operational-hours">Operational Hours: <?= $tempatwisata['waktu_buka'];?> - <?= $tempatwisata['waktu_tutup'];?></p>
                </div>
                 <div class="form-group">
                    <label for="ticket_count">Number of ticket</label>
                    <input type="number" id="ticket_count" name="ticket_count" value="1" min="1" max="<?= $paket['jumlah_tiket']; ?>" required>
                    <p class="ticket-stock"><?= $paket['jumlah_tiket']; ?> tickets left</p>
                </div>

                <div class="balance-box">
                    <div class="label">Balance</div>
                    <div class="amount"><?= $user['saldo'];?></div>
                    <a href="indeks.php?page=Saldo">Top up</a>
                </div>

                <button type="submit" name="submit" class="submit-button">Buy Now</button>
            </form>
        </div>
    </div>
</body>
</html>