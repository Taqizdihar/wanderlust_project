<?php
include "config.php";

$ID = $_GET['id'];
$status = $_GET['status'];

$sqlStatement = "UPDATE tempatwisata SET status='$status' WHERE tempatwisata_id='$ID'";
$query = mysqli_query($conn, $sqlStatement);

if (mysqli_affected_rows($conn) != 0) {
    header("location:indeks.php?page=accwisata&id_lokasi=$ID");
    exit();
} else {
    echo "<p>Verification Failed</p>";
}
?>