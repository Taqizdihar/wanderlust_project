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
    <link rel="stylesheet" href="pengelolaWisata/cssWisata/profilPemilikWisata.css?v=1.0.4">
    <link rel="stylesheet" href="cssWisata/profilPemilikWisata.css?v=1.0.4">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="navbar">
        <img src="Umum/photos/Wanderings for Wonders side white.png" alt="Wanderlust Logo">
        <h1>| Partner Dashboard</h1>
        <a href="indeks.php?page=profilPemilikWisata"><i class="fa-regular fa-circle-user"></i></a> 
    </div>

    <div class="sidebar">
        <a href="indeks.php?page=dashboardWisata">Dashboard</a>
        <a href="../notFound.php">Places</a>
        <a href="../notFound.php">Orders</a>
        <a href="../notFound.php">Help Centre</a>
        <a href="../notFound.php">Log Out</a>
    </div>

    <div class="main">
        <div class="profile-container">
        <div class="profile-pic-section">
        <div class="avatar"></div>
        <label class="change-btn">
            Change
            <input type="file" class="file-input" accept="image/*">
        </label>
        </div>

        <div class="profile-info">
        <h2 class="name"><?= $profile['nama']?></h2>
        <div class="status">status</div>

        <div class="info-grid">
            <div class="info-left">
            <p><strong>Email :</strong></p>
            <div class="value-box"><?= $profile['email']?></div>

            <p><strong>Phone :</strong></p>
            <div class="value-box"><?= $profile['phonenumber']?></div>
            </div>

            <div class="info-right">
            <p>Legal Tax Document:</p>
            <a href="pengelolaWisata/photos/<?= $PWProfile['tax_document']?>" target="_blank" class="doc-btn">See Document ➚</a>

            <p>Legal Business Document :</p>
            <a href="pengelolaWisata/photos/<?= $PWProfile['legal_business_document']?>" target="_blank" class="doc-btn">See Document ➚</a>
            </div>
        </div>

        <a href="edit-profile.php" class="edit-btn">Edit Identity</a>
        </div>
    </div>
    </div>
</body>
</html>