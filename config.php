<?php
// Konfigurasi koneksi database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "wanderlust";

// Membuat koneksi ke database
$conn = mysqli_connect($host, $user, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Koneksi ke MySQL gagal: " . mysqli_connect_error());
}
?>
