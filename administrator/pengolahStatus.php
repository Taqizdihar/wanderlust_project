<?php
include "config.php";

$IDPW = $_GET['idpw'];
$status = $_GET['status'];

$sqlStatement = "UPDATE pemilikwisata SET entity_approval='$status' WHERE pw_id='$IDPW'";
$query = mysqli_query($conn, $sqlStatement);

if (mysqli_affected_rows($conn) != 0) {
    header("location:indeks.php?page=accpengolah");
    exit();
} else {
    echo "<p>Verification Failed</p>";
}
?>