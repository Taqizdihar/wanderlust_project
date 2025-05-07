<?php
include "config.php";

$ID = $_SESSION['user_id'];
$sqlStatement = "SELECT * FROM user WHERE user_id='$ID'";
$query = mysqli_query($conn, $sqlStatement);
$profile = mysqli_fetch_assoc($query);

$sqlStatement = "SELECT nama_lokasi FROM lokasi WHERE pw_id='$ID'";
$query = mysqli_query($conn, $sqlStatement);
$lokasi = mysqli_fetch_all($query, MYSQLI_ASSOC);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="pengelolaWisata/cssWisata/dashboardWisata.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<?php include "pengelolaWisata/viewsWisata.php";?>

<div class="main">
    <h2>Welcome, <b><?= $profile['nama']?></b></h2>

        <div class="card">
            <h3>Properties</h3>
            <div class="stat"><?= count($lokasi)?></div>
        </div>

        <div class="card">
            <h3>Revenue</h3>
            <div class="stat">Currently not Available</div>
        </div>

        <div class="card">
            <h3>Ticket Sold</h3>
            <div class="stat">Currently not Available</div>
        </div>
</div>

</body>
</html>
