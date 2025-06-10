<?php
include "config.php";

$ID = $_SESSION['user_id'];
$sqlStatement1 = "SELECT * FROM user WHERE user_id='$ID'";
$query = mysqli_query($conn, $sqlStatement1);
$profile = mysqli_fetch_assoc($query);

$sqlStatement2 = "SELECT * FROM pemilikwisata WHERE pw_id='$ID'";
$query = mysqli_query($conn, $sqlStatement2);
$PWProfile = mysqli_fetch_assoc($query);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link rel="stylesheet" href="pemilikWisata/cssWisata/profilPemilikWisata.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include "pemilikWisata/viewsWisata.php";?>

    <div class="main">
        <div class="profile-container">
        <div class="profile-pic-section">
            <i class="fa-regular fa-circle-user" id="pp"></i>
            <label class="change-btn">
                <form action="post" enctype="multipart/form-data" class="change-btn-form">
                    <input type="file" name="profilePhoto" class="file-input" accept="image/*">Change
                </form>
            </label>
        </div>

        <div class="profile-info">
        <h2 class="name"><?= $profile['nama']?></h2>

            <?php
                if ($PWProfile['status'] == 'review') {
            ?>
                <div class="status" id="review">Status : <?= $PWProfile['status']?></div>
            <?php
                } else if ($PWProfile['status'] == 'approved') {
            ?>
                <div class="status" id="approved">Status : <?= $PWProfile['status']?></div>
            <?php
                } else if ($PWProfile['status'] == 'rejected') {
            ?>
                <div class="status" id="rejected">Status : <?= $PWProfile['status']?></div>
            <?php
                }
            ?>

        <div class="info-grid">
            <div class="info-left">
            <p>Email</p>
            <div class="value-box"><?= $profile['email']?></div>

            <p>Phone</p>
            <div class="value-box"><?= $profile['no_telepon']?></div>
            </div>

            <div class="info-right">
            <p>Legal Tax Document</p>
            <a href="pengelolaWisata/photos/<?= $PWProfile['npwp']?>" target="_blank" class="doc-btn">See Document <i class="fa-solid fa-arrow-up-right-from-square"></i></a>

            <p>Legal Business Document</p>
            <a href="pengelolaWisata/photos/<?= $PWProfile['siup']?>" target="_blank" class="doc-btn">See Document <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </div>
        </div>
        <div class="address">
            <p>Address</p>
            <div class="value-box"><?= $PWProfile['alamat_bisnis']?></div>
        </div>

        <a href="indeks.php?page=editProfilWisata" class="edit-btn">Edit Identity</a>
        </div>
    </div>
    </div>
</body>
</html>