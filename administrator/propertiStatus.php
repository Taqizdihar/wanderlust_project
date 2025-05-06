<?php
include "config.php";

$IDPW = $_GET['idpw'];
$status = $_GET['status'];

$sqlStatement = "UPDATE lokasi SET status='$status' WHERE id_lokasi='$IDPW'";
$query = mysqli_query($conn, $sqlStatement);

if (mysqli_affected_rows($conn) != 0) {
    header("location:indeks.php?page=accproperti&id_lokasi=$IDPW");
    exit();
} else {
    echo "<p>Verification Failed</p>";
}

?>