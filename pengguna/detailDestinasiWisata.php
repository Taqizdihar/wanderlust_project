<?php
include "config.php";
if (session_status() === PHP_SESSION_NONE) session_start();

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

$ID = $_SESSION['user_id'] ?? null;
$tempatwisata_id = $_GET['tempatwisata_id'];

$edit_rating = "";
$edit_komentar = "";
$edit_mode = false;

if (isset($_GET['edit_ulasan'])) {
    $edit_id = $_GET['edit_ulasan'];
    $query_edit = mysqli_query($conn, "SELECT * FROM ulasan WHERE ulasan_id='$edit_id' AND wisatawan_id='$ID'");
    if ($data_edit = mysqli_fetch_assoc($query_edit)) {
        $edit_rating = $data_edit['rating'];
        $edit_komentar = $data_edit['komentar'];
        $edit_mode = true;
    }
}

// CRUD Ulasan
if (isset($_POST['submit_ulasan'])) {
    $rating = $_POST['rating'];
    $komentar = $_POST['komentar'];
    $tanggal_ulasan = date('Y-m-d H:i:s');

    $existing = mysqli_query($conn, "SELECT * FROM ulasan WHERE wisatawan_id = '$ID' AND tempatwisata_id = '$tempatwisata_id'");
    if (mysqli_num_rows($existing) > 0) {
        mysqli_query($conn, "UPDATE ulasan SET rating='$rating', komentar='$komentar', tanggal_ulasan='$tanggal_ulasan' WHERE wisatawan_id='$ID' AND tempatwisata_id='$tempatwisata_id'");
    } else {
        mysqli_query($conn, "INSERT INTO ulasan (wisatawan_id, tempatwisata_id, rating, komentar, tanggal_ulasan, status_ulasan) VALUES ('$ID', '$tempatwisata_id', '$rating', '$komentar', '$tanggal_ulasan', 'ditampilkan')");
    }
    header("Location: indeks.php?page=detailDestinasiWisata&tempatwisata_id=$tempatwisata_id");
    exit;
} elseif (isset($_GET['hapus_ulasan'])) {
    $hapus_id = $_GET['hapus_ulasan'];
    mysqli_query($conn, "DELETE FROM ulasan WHERE ulasan_id='$hapus_id' AND wisatawan_id='$ID'");
    header("Location: indeks.php?page=detailDestinasiWisata&tempatwisata_id=$tempatwisata_id");
    exit;
}

// Ambil data wisata, foto, pemilik
$sqlStatement1 = "SELECT * FROM tempatwisata WHERE tempatwisata_id = '$tempatwisata_id'";
$query1 = mysqli_query($conn, $sqlStatement1);
$tempatwisata = mysqli_fetch_assoc($query1);

$sqlStatement2 = "
SELECT u.*, usr.nama AS nama_pengulas
FROM ulasan u
JOIN wisatawan w ON u.wisatawan_id = w.wisatawan_id
JOIN user usr ON w.wisatawan_id = usr.user_id
WHERE u.tempatwisata_id = '$tempatwisata_id' AND u.status_ulasan = 'ditampilkan'
ORDER BY u.tanggal_ulasan DESC
";
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

$sqlRating = "SELECT AVG(rating) as avg_rating, COUNT(ulasan_id) as total_reviews FROM ulasan WHERE tempatwisata_id = '$tempatwisata_id' AND status_ulasan = 'ditampilkan'";
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
</head>
<body>
<?php include "pengguna/Header.php"; ?>
<div class="header-image" style="background-image: url('pemilikWisata/foto/<?= $fotos[0]; ?>');">
    <button onclick="history.back()" class="back-button">Go back</button>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-8">
            <h2><?= $tempatwisata['nama_lokasi']; ?></h2>
            <p class="text-muted"><?= $tempatwisata['jenis_wisata']; ?></p>

            <?php if (isset($_SESSION['user_id']) && $_SESSION['role'] === 'wisatawan') : ?>
            <form method="post">
                <input type="hidden" name="tempatwisata_id" value="<?= $tempatwisata['tempatwisata_id']; ?>">
                <button type="submit" name="tambah_favorit" class="favorit-btn">🌟 Add to Bookmark</button>
            </form>
            <?php endif; ?>

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
                    <p class="mb-0">Managed by <?= $pemilikwisata['instansi']; ?></p>
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
                <?php for ($i=1; $i < count($fotos); $i++) { ?>
                <div class="col-6 mb-3">
                    <img src="pemilikWisata/foto/<?= $fotos[$i]; ?>" class="grid-image">
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <hr class="my-5">

    <h2 class="mb-4">Packages</h2>
    <div class="row">
        <?php while ($paket = mysqli_fetch_assoc($query3)) : ?>
        <div class="col-md-6 col-lg-4">
            <div class="card card-package">
                <img src="pemilikWisata/foto/paketWisata/<?= $paket['foto_paket']; ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= $paket['nama_paket']; ?></h5>
                    <p class="card-text"><?= $paket['deskripsi']; ?></p>
                    <h4>Rp. <?= number_format($paket['harga'], 0, ',', '.'); ?></h4>
                    <a href="indeks.php?page=reservasiTiket&tempatwisata_id=<?= $tempatwisata_id ?>&paket_id=<?= $paket['paket_id'] ?>" class="btn btn-success w-100">Choose</a>
                    <small class="d-block mt-2 text-center"><?= $paket['jumlah_tiket']; ?> tickets left</small>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>

    <hr class="my-5">

    <h2 class="mb-4">Reviews</h2>

    <?php if (isset($_SESSION['user_id']) && $_SESSION['role'] === 'wisatawan') : ?>
    <form action="" method="POST" class="mb-4">
        <div class="mb-2">
            <label class="form-label">Rating</label>
            <select name="rating" class="form-select" required>
                <option value="">-- Pilih --</option>
                <?php for ($i=1; $i<=5; $i++): ?>
                    <option value="<?= $i ?>" <?= ($edit_rating == $i) ? 'selected' : '' ?>><?= $i ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="mb-2">
            <label class="form-label">Komentar</label>
            <textarea name="komentar" class="form-control" required><?= htmlspecialchars($edit_komentar); ?></textarea>
        </div>
        <button type="submit" name="submit_ulasan" class="btn btn-primary"><?= $edit_mode ? 'Perbarui Ulasan' : 'Kirim Ulasan'; ?></button>
    </form>
    <?php endif; ?>

    <div class="row">
        <?php while ($ulasan = mysqli_fetch_assoc($query2)) : ?>
        <div class="col-md-6 col-lg-4">
            <div class="card card-review mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5><?= htmlspecialchars($ulasan['nama_pengulas']); ?></h5>
                        <span class="badge bg-warning text-dark"><?= $ulasan['rating']; ?> <i class="fas fa-star"></i></span>
                    </div>
                    <p class="mt-2">"<?= htmlspecialchars($ulasan['komentar']); ?>"</p>
                    <?php if ($ulasan['wisatawan_id'] == $ID): ?>
                    <a href="indeks.php?page=detailDestinasiWisata&tempatwisata_id=<?= $tempatwisata_id ?>&edit_ulasan=<?= $ulasan['ulasan_id'] ?>" class="btn btn-sm btn-outline-primary me-1">Edit</a>
                    <a href="indeks.php?page=detailDestinasiWisata&tempatwisata_id=<?= $tempatwisata_id ?>&hapus_ulasan=<?= $ulasan['ulasan_id'] ?>" class="btn btn-sm btn-outline-danger">Hapus</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include "pengguna/Footer.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>