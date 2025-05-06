<?php
include "config.php";

$ID = $_GET['id'];
$status = $_GET['status'];

$sqlStatement = "UPDATE lokasi SET status='$status' WHERE id_lokasi='$ID'";
$query = mysqli_query($conn, $sqlStatement);

if (mysqli_affected_rows($conn) != 0) {
    header("location:indeks.php?page=accproperti&id_lokasi=$ID");
    exit();
} else {
    echo "<p>Verification Failed</p>";
}

?>