<?php
include "config.php";

$ID = $_SESSION['user_id'];
$sqlStatement1 = "SELECT * FROM user WHERE user_id='$ID'";
$query = mysqli_query($conn, $sqlStatement1);
$profile = mysqli_fetch_assoc($query);

$sqlStatement2 = "SELECT * FROM pemilikwisata WHERE pw_id='$ID'";
$query = mysqli_query($conn, $sqlStatement2);
$PWProfile = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place List</title>
    <link rel="stylesheet" href="pengelolaWisata/cssWisata/daftarWisata.css?v=1.0.4">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include "pengelolaWisata/viewsWisata.php";?>

    <div class="main">
        <?php
            if ($PWProfile['entity_approval'] == 'review') {
        ?>
            <div class="reviewed">
                <i class="fa-solid fa-money-check"></i>
                <p>Your identity and business legals are in review.
                    Please come back later. Our regards
                </p>
            </div>
        <?php
            } if ($PWProfile['entity_approval'] == 'approved') {
        ?>
        <a href="indeks.php?page=addWisata">
            You haven't uploaded any places yet!
            Click here to add a place
        </a>
        <?php
            }
        ?>
    </div>
</body>
</html>