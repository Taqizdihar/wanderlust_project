<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include "config.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'wisatawan') {
    echo "<script>alert('Destinasi dihapus dari favorit!'); window.location.href='indeks.php?page=Favorit';</script>";
    exit();
}

$wisatawan_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hapus_favorit'])) {
    $hapus_id = $_POST['tempatwisata_id'];
    mysqli_query($conn, "DELETE FROM wishlist WHERE wisatawan_id = '$wisatawan_id' AND tempatwisata_id = '$hapus_id'");

    echo "<script>
        alert('Destinasi dihapus dari favorit!');
        window.location.href='indeks.php?page=Favorit';
    </script>";
    exit();
}

$query = "
    SELECT tw.* 
    FROM wishlist w 
    JOIN tempatwisata tw ON w.tempatwisata_id = tw.tempatwisata_id 
    WHERE w.wisatawan_id = '$wisatawan_id'
";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Favorit Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="pengguna/cssPengguna/Favorit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>
<body>
<div class="wrapper">
    <?php include "pengguna/Header.php"; ?>

    <main class="content container my-5">
    <h2 class="mb-4">Destinasi Favorit Saya</h2>

    <?php if (mysqli_num_rows($result) > 0): ?>
    <?php else: ?>

        <div class="alert alert-info">Anda belum menambahkan destinasi favorit.</div>
    <?php endif; ?>
</main>

    <?php if (mysqli_num_rows($result) > 0): ?>
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)): 
            $tempatwisata_id = $row['tempatwisata_id'];

            $foto_query = mysqli_query($conn, "SELECT link_foto FROM fotowisata WHERE tempatwisata_id = '$tempatwisata_id' ORDER BY urutan ASC LIMIT 1");
            $foto_data = mysqli_fetch_assoc($foto_query);
            $foto = $foto_data ? $foto_data['link_foto'] : 'default.jpg';
        ?>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow favorit-card">
                <img src="pemilikWisata/foto/<?= $foto ?>" class="card-img-top" alt="<?= $row['nama_lokasi'] ?>" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?= $row['nama_lokasi']; ?></h5>
                    <p class="card-text"><?= $row['jenis_wisata']; ?></p>

                    <a href="indeks.php?page=detailDestinasiWisata&tempatwisata_id=<?= $tempatwisata_id ?>" class="btn btn-primary w-100 mb-2">
                        <i class="fas fa-eye"></i> Lihat Detail
                    </a>

                    <form method="post" action="indeks.php?page=Favorit">
                        <input type="hidden" name="tempatwisata_id" value="<?= $tempatwisata_id ?>">
                        <button type="submit" name="hapus_favorit" class="btn btn-danger w-100">
                            <i class="fas fa-trash-alt"></i> Hapus dari Favorit
                        </button>
                    </form>


                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <?php else: ?>
    <?php endif; ?>
</div>

    <?php include "pengguna/Footer.php"; ?>
</div> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>