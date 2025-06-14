<?php
// Pastikan file config.php di-include untuk koneksi database
include "config.php";
// Mulai sesi untuk mendapatkan ID pengguna

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika tidak, kirim response error dalam format JSON
    echo json_encode(['status' => 'error', 'message' => 'Pengguna belum login']);
    exit();
}

// Ambil data yang dikirim dari JavaScript
$wisatawan_id = $_POST['user_id'];
$tempatwisata_id = $_POST['wisata_id'];

// Cek apakah data sudah ada di wishlist
$sqlCek = "SELECT wishlist_id FROM wishlist WHERE wisatawan_id = '$wisatawan_id' AND tempatwisata_id = '$tempatwisata_id'";
$queryCek = mysqli_query($conn, $sqlCek);

if (mysqli_num_rows($queryCek) > 0) {
    // Jika SUDAH ADA, hapus dari tabel wishlist
    $sqlHapus = "DELETE FROM wishlist WHERE wisatawan_id = '$wisatawan_id' AND tempatwisata_id = '$tempatwisata_id'";
    if (mysqli_query($conn, $sqlHapus)) {
        // Kirim response sukses
        echo json_encode(['status' => 'success', 'action' => 'removed']);
    } else {
        // Kirim response error jika gagal
        echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus dari wishlist']);
    }
} else {
    // Jika BELUM ADA, tambahkan ke tabel wishlist
    $tanggal_disimpan = date('Y-m-d H:i:s'); // Ambil waktu saat ini
    $sqlTambah = "INSERT INTO wishlist (wisatawan_id, tempatwisata_id, tanggal_disimpan) VALUES ('$wisatawan_id', '$tempatwisata_id', '$tanggal_disimpan')";
    if (mysqli_query($conn, $sqlTambah)) {
        // Kirim response sukses
        echo json_encode(['status' => 'success', 'action' => 'added']);
    } else {
        // Kirim response error jika gagal
        echo json_encode(['status' => 'error', 'message' => 'Gagal menambahkan ke wishlist']);
    }
}

// Tutup koneksi database
mysqli_close($conn);
?>