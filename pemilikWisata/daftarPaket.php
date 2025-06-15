<?php
include "config.php";

$ID = $_SESSION['user_id'];
$tempatwisata_id = $_GET['tempatwisata_id'];

$sqlPaket = "SELECT paket_id, foto_paket, nama_paket, deskripsi, harga, jumlah_tiket FROM paketwisata WHERE tempatwisata_id = '$tempatwisata_id'";
$queryPaket = mysqli_query($conn, $sqlPaket);
$Paket = mysqli_fetch_assoc($queryPaket);


?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Management</title>
    <link rel="stylesheet" href="pemilikWisata/cssWisata/daftarWisata.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include "pemilikWisata/viewsWisata.php"?>
    <div class="main-container">

        <div class="page-header">
            <h1>Paket Wisata Anda</h1>
            <!-- Tombol ini akan mengarahkan ke halaman tambah paket -->
            <a href="tambah_paket.php" class="add-package-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                Add new package
            </a>
        </div>

        <div class="package-grid">
            <?php
            if ($result->num_rows > 0) {
                // Looping untuk menampilkan setiap paket wisata
                while ($row = $result->fetch_assoc()) {
                    // Membersihkan output untuk keamanan
                    $nama_paket = htmlspecialchars($row['nama_paket']);
                    $deskripsi = htmlspecialchars($row['deskripsi']);
                    // Format harga ke Rupiah
                    $harga = "Rp " . number_format($row['harga'], 0, ',', '.');
                    $jumlah_tiket = htmlspecialchars($row['jumlah_tiket']);
                    $paket_id = $row['paket_id'];
                    
                    // Gunakan gambar placeholder jika link foto kosong atau tidak valid
                    $foto_paket = (!empty($row['foto_paket']) && file_exists($row['foto_paket'])) ? $row['foto_paket'] : 'https://placehold.co/600x400/007bff/FFFFFF?text=Paket+Wisata';
            ?>

            <!-- HTML untuk setiap Kartu Paket -->
            <div class="card">
                <img src="<?php echo $foto_paket; ?>" alt="Foto <?php echo $nama_paket; ?>" class="card-img">
                <div class="card-content">
                    <h2 class="card-title"><?php echo $nama_paket; ?></h2>
                    <p class="card-description">
                        <?php 
                            // Memotong deskripsi jika terlalu panjang
                            if (strlen($deskripsi) > 100) {
                                echo substr($deskripsi, 0, 100) . '...';
                            } else {
                                echo $deskripsi;
                            }
                        ?>
                    </p>
                    <div class="card-info">
                        <span class="card-price"><?php echo $harga; ?></span>
                        <span class="card-tickets"><?php echo $jumlah_tiket; ?> Tiket</span>
                    </div>
                    <!-- Tombol Manage yang mengarah ke halaman edit dengan ID paket -->
                    <a href="manage_paket.php?id=<?php echo $paket_id; ?>" class="manage-btn">Manage</a>
                </div>
            </div>

            <?php
                } // Akhir dari while loop
            } else {
                // Pesan jika tidak ada paket wisata yang ditemukan
                echo "<div class='no-data'><p>Belum ada paket wisata yang ditambahkan. Silakan klik tombol 'Add new package' untuk memulai.</p></div>";
            }
            // Menutup statement dan koneksi
            $stmt->close();
            $conn->close();
            ?>
        </div> <!-- Akhir dari .package-grid -->

    </div> <!-- Akhir dari .main-container -->

</body>
</html>
