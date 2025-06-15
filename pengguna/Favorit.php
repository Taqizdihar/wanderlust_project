<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include_once "config.php"; // pastikan path menuju config.php benar

// Cek apakah pengguna sudah login
if (!isset($_SESSION['id'])) {
    echo "<p>Anda harus login terlebih dahulu.</p>";
    exit;
}

$id_pengguna = $_SESSION['id'];

// Query untuk mengambil data tempat favorit dari pengguna
$query = "SELECT tempat.nama_tempat, tempat.lokasi, tempat.gambar 
          FROM favorit 
          JOIN tempat ON favorit.tempat_id = tempat.id 
          WHERE favorit.pengguna_id = '$id_pengguna'";

$result = mysqli_query($conn, $query);
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
                        <img src="../../assets/gambar/<?= $row['gambar']; ?>" alt="<?= $row['nama_tempat']; ?>">
                        <h3><?= $row['nama_tempat']; ?></h3>
                        <p><?= $row['lokasi']; ?></p>
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