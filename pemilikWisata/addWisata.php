<?php
include "config.php";

$ID = $_SESSION['user_id'];
$sqlStatement1 = "SELECT * FROM user WHERE user_id='$ID'";
$query = mysqli_query($conn, $sqlStatement1);
$profile = mysqli_fetch_assoc($query);

$pesan = "";

// Cek jika form telah disubmit menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- 2. PENGAMBILAN & PEMBERSIHAN DATA DARI FORM ---
    // Gunakan mysqli_real_escape_string untuk mencegah SQL Injection dasar.
    // Ini adalah praktik keamanan minimum jika tidak menggunakan prepared statements.
    $pw_id = mysqli_real_escape_string($conn, $_POST['pw_id']);
    $nama_lokasi = mysqli_real_escape_string($conn, $_POST['nama_lokasi']);
    $alamat_lokasi = mysqli_real_escape_string($conn, $_POST['alamat_lokasi']);
    $jenis_wisata = mysqli_real_escape_string($conn, $_POST['jenis_wisata']);
    $waktu_buka = mysqli_real_escape_string($conn, $_POST['waktu_buka']);
    $waktu_tutup = mysqli_real_escape_string($conn, $_POST['waktu_tutup']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $sumir = mysqli_real_escape_string($conn, $_POST['sumir']);
    $nomor_pic = mysqli_real_escape_string($conn, $_POST['nomor_pic']);

    // Status diset langsung ke 'review' sesuai permintaan
    $status = "review";
    $surat_izin_path = ""; // Inisialisasi path file surat izin

    // --- 3. LOGIKA UNGGAH FILE SURAT IZIN ---
    // Pastikan ada folder 'uploads/' di direktori yang sama dengan file PHP ini.
    // Pastikan juga folder tersebut memiliki izin tulis (writable).
    if (isset($_FILES['surat_izin']) && $_FILES['surat_izin']['error'] == 0) {
        $target_dir = "uploads/";
        
        // Buat nama file unik untuk menghindari penimpaan file dengan nama yang sama
        $file_extension = pathinfo($_FILES["surat_izin"]["name"], PATHINFO_EXTENSION);
        $unique_filename = "suratizin_" . time() . "." . $file_extension;
        $target_file = $target_dir . $unique_filename;

        // Validasi tipe file yang diizinkan
        $allowed_types = ['pdf', 'doc', 'docx', 'docs'];
        if (in_array(strtolower($file_extension), $allowed_types)) {
            // Pindahkan file dari temporary location ke folder 'uploads/'
            if (move_uploaded_file($_FILES["surat_izin"]["tmp_name"], $target_file)) {
                $surat_izin_path = $target_file;
            } else {
                $pesan = "Maaf, terjadi error saat mengunggah file Anda.";
            }
        } else {
            $pesan = "Maaf, hanya file dengan format PDF, DOC, dan DOCX yang diizinkan.";
        }
    } else {
        $pesan = "Error: Surat izin wajib diunggah.";
    }

    // --- 4. PROSES INSERT DATA KE DATABASE ---
    // Lanjutkan hanya jika tidak ada error pada unggahan file
    if (empty($pesan) && !empty($surat_izin_path)) {
        // Buat query SQL untuk memasukkan data ke tabel
        $sql = "INSERT INTO tempatwisata (pw_id, nama_lokasi, alamat_lokasi, jenis_wisata, waktu_buka, waktu_tutup, deskripsi, sumir, nomor_pic, surat_izin, status) 
                VALUES ('$pw_id', '$nama_lokasi', '$alamat_lokasi', '$jenis_wisata', '$waktu_buka', '$waktu_tutup', '$deskripsi', '$sumir', '$nomor_pic', '$surat_izin_path', '$status')";

        // Eksekusi query
        if (mysqli_query($conn, $sql)) {
            $pesan = "Data tempat wisata baru berhasil ditambahkan dan sedang dalam status review.";
        } else {
            // Jika query gagal, tampilkan pesan error
            $pesan = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
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
    <link rel="stylesheet" href="pemilikWisata/cssWisata/Home.css">
</head>
<body>
    <?php include "pemilikWisata/viewsWisata.php";?>
    <div class="container">
        <h2>Formulir Penambahan Tempat Wisata</h2>

        <!-- Tampilkan pesan sukses/error di sini -->
        <?php if (!empty($pesan)): ?>
            <div class="pesan"><?php echo htmlspecialchars($pesan); ?></div>
        <?php endif; ?>

        <!-- Form HTML -->
        <!-- `enctype="multipart/form-data"` wajib untuk upload file -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            
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
