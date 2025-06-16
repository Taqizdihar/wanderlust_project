<?php
include "config.php";
session_start();

$id = $_GET['id'] ?? null;

$sql = "UPDATE `transaksi` SET `status` = 'active' WHERE `transaksi`.`transaksi_id` = $id;";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: indeks.php?page=transaksiverifikasi");
} else {
    echo "Gagal memverifikasi transaksi: " . mysqli_error($conn);
}
?>