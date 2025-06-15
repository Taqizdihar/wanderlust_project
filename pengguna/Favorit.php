<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include_once "config.php"; 

if (!isset($_SESSION['user_id'])) {
    echo "<p>Anda harus login terlebih dahulu.</p>";
    exit;
}

$id_pengguna = $_SESSION['user_id'];

$query = "SELECT t.nama_lokasi, t.alamat_lokasi, t.jenis_wisata
          FROM wishlist w
          JOIN tempatwisata t ON w.tempatwisata_id = t.tempatwisata_id
          WHERE w.wisatawan_id = '$id_pengguna'";

$result = mysqli_query($conn, $query);
if (!$result) {
    echo "Query gagal: " . mysqli_error($conn);
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tempat Wisata Favorit</title>
    <link rel="stylesheet" href="pengguna/cssPengguna/Favorit.css">
</head>
<body>
    <div class="container">
        <h1>Tempat Wisata Favorit</h1>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <div class="favorit-grid">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="favorit-card">
                        <h3><?= $row['nama_lokasi']; ?></h3>
                        <p><?= $row['alamat_lokasi']; ?></p>
                        <p><?= $row['jenis_wisata']; ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="empty-message">
                <p>Belum ada tempat favorit disimpan.</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>