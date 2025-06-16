<?php
include "config.php";

$ID = $_SESSION['user_id'];
$tempatwisata_id = $_GET['tempatwisata_id'];
$paket_id = $_GET['paket_id'];

$sqlStatement1 = "SELECT * FROM tempatwisata WHERE tempatwisata_id = '$tempatwisata_id'";
$query1 = mysqli_query($conn, $sqlStatement1);
$tempatwisata = mysqli_fetch_assoc($query1);

$sqlStatement2 = "SELECT * FROM ulasan WHERE tempatwisata_id = '$tempatwisata_id'";
$query2 = mysqli_query($conn, $sqlStatement2);

$sqlStatement3 = "SELECT * FROM paketwisata WHERE tempatwisata_id = '$tempatwisata_id' AND paket_id = '$paket_id'";
$query3 = mysqli_query($conn, $sqlStatement3);
$paket = mysqli_fetch_assoc($query3);

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
    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 2rem;
            display: flex;
            justify-content: center;
        }
        .container {
            display: flex;
            gap: 2rem;
            max-width: 1100px;
            width: 100%;
        }
        .left-column, .right-column {
            background: #ffffff;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .left-column {
            flex: 1.5;
        }
        .right-column {
            flex: 1;
            height: fit-content;
        }
        .main-image {
            width: 100%;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }
        .destination-name {
            font-size: 1.75rem;
            font-weight: bold;
            margin: 0;
        }
        .rating {
            font-size: 1.25rem;
            font-weight: bold;
            color: #ffc107;
            margin: 0.5rem 0;
        }
        .rating span {
            color: #000;
        }
        .address {
            color: #6c757d;
            margin-bottom: 1.5rem;
        }
        .package-box {
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            padding: 1rem;
        }
        .package-box h3 {
            font-size: 1.2rem;
            margin: 0 0 0.5rem 0;
        }
        .package-box p {
            color: #6c757d;
            margin: 0 0 1rem 0;
        }
        .price {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .price small {
            font-size: 0.8rem;
            font-weight: normal;
            color: #6c757d;
        }
        h2.form-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin: 0 0 1.5rem 0;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #495057;
        }
        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            box-sizing: border-box;
        }
        .operational-hours, .ticket-stock {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 0.5rem;
        }
        .balance-box {
            background-color: #0d6efd;
            color: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            margin: 2rem 0 1.5rem 0;
        }
        .balance-box .label {
            font-size: 1rem;
        }
        .balance-box .amount {
            font-size: 2rem;
            font-weight: bold;
            margin: 0.25rem 0;
        }
        .balance-box a {
            color: white;
            text-decoration: underline;
        }
        .submit-button {
            width: 100%;
            background-color: #198754;
            color: white;
            padding: 1rem;
            border: none;
            border-radius: 0.25rem;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
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
                    <div class="amount">Rp. 1.000.000</div>
                    <a href="#">Top up</a>
                </div>

                <button type="submit" name="submit" class="submit-button">Buy Now</button>
            </form>
        </div>
    </div>
</body>
</html>