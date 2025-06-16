<?php
include 'config.php'; // koneksi ke database

// Pastikan ada ID transaksi di URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Update status transaksi menjadi selesai
    $query = "UPDATE transaksi SET status = 'selesai' WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Transaksi dengan ID $id berhasil diverifikasi menjadi selesai.";
    } else {
        echo "Gagal memverifikasi transaksi.";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "ID transaksi tidak ditemukan.";
}
?>
