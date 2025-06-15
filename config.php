<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "wanderlust";
    
$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die("Koneksi ke MySQL gagal");
}
?>