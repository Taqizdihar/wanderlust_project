<?php
include "config.php";

$ID = $_SESSION['user_id'];
$sqlStatement1 = "SELECT * FROM user WHERE user_id='$ID'";
$query = mysqli_query($conn, $sqlStatement1);
$profile = mysqli_fetch_assoc($query);

$pesan = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama_lokasi = $_POST['nama_lokasi'];
    $alamat_lokasi = $_POST['alamat_lokasi'];
    $jenis_wisata = $_POST['jenis_wisata'];
    $waktu_buka = $_POST['waktu_buka'];
    $waktu_tutup = $_POST['waktu_tutup'];
    $deskripsi = $_POST['deskripsi'];
    $sumir = $_POST['sumir'];
    $nomor_pic = $_POST['nomor_pic'];

    $status = "review";
    $surat_izin_path = "";

    $sql = "INSERT INTO tempatwisata (pw_id, nama_lokasi, alamat_lokasi, jenis_wisata, waktu_buka, waktu_tutup, deskripsi, sumir, nomor_pic, surat_izin, status) 
                VALUES ('$pw_id', '$nama_lokasi', '$alamat_lokasi', '$jenis_wisata', '$waktu_buka', '$waktu_tutup', '$deskripsi', '$sumir', '$nomor_pic', '$surat_izin_path', '$status')";

    // Eksekusi query
    if (mysqli_query($conn, $sql)) {
        $pesan = "Data tempat wisata baru berhasil ditambahkan dan sedang dalam status review.";
    } else {
        // Jika query gagal, tampilkan pesan error
        $pesan = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Tempat Wisata</title>
    <link rel="stylesheet" href="pemilikWisata/cssWisata/addWisata.css">
</head>
<body>
    <?php include "pemilikWisata/viewsWisata.php";?>
    <div class="container">
        <h2>Formulir Penambahan Tempat Wisata</h2>

        <?php if (!empty($pesan)): ?>
            <div class="pesan"><?php echo htmlspecialchars($pesan); ?></div>
        <?php endif; ?>
        <form action="" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="pw_id">ID Pengguna Wisata (pw_id)</label>
                <input type="number" id="pw_id" name="pw_id" required>
            </div>

            <div class="form-group">
                <label for="nama_lokasi">Nama Lokasi Wisata</label>
                <input type="text" id="nama_lokasi" name="nama_lokasi" required>
            </div>

            <div class="form-group">
                <label for="alamat_lokasi">Alamat Lengkap Lokasi</label>
                <textarea id="alamat_lokasi" name="alamat_lokasi" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="jenis_wisata">Jenis Wisata</label>
                <select id="jenis_wisata" name="jenis_wisata" required>
                    <option value="Nature">Alam (Nature)</option>
                    <option value="Cultural">Budaya (Cultural)</option>
                    <option value="Historical">Sejarah (Historical)</option>
                    <option value="Religion">Religi (Religion)</option>
                    <option value="Theme Park">Taman Hiburan (Theme Park)</option>
                    <option value="Other">Lainnya (Other)</option>
                </select>
            </div>

            <div class="time-group">
                <div class="form-group">
                    <label for="waktu_buka">Jam Buka</label>
                    <input type="time" id="waktu_buka" name="waktu_buka" required>
                </div>
                <div class="form-group">
                    <label for="waktu_tutup">Jam Tutup</label>
                    <input type="time" id="waktu_tutup" name="waktu_tutup" required>
                </div>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi Lengkap</label>
                <textarea id="deskripsi" name="deskripsi" required></textarea>
            </div>

            <div class="form-group">
                <label for="sumir">Ringkasan Deskripsi (Sumir)</label>
                <textarea id="sumir" name="sumir" rows="2" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="nomor_pic">Nomor Telepon PIC</label>
                <input type="text" id="nomor_pic" name="nomor_pic" required>
            </div>

            <div class="form-group">
                <label for="surat_izin">Unggah Surat Izin (PDF/DOC/DOCX)</label>
                <input type="file" id="surat_izin" name="surat_izin" accept=".pdf,.doc,.docx" required>
            </div>

            <div class="form-group">
                <button type="submit" class="submit-btn">Tambah Data Wisata</button>
            </div>
        </form>
    </div>

</body>
</html>
