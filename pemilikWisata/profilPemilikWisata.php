<?php
include "config.php";

$ID = $_SESSION['user_id'];
$userStatement = "SELECT * FROM user WHERE user_id='$ID'";
$userQuery = mysqli_query($conn, $userStatement);
$profile = mysqli_fetch_assoc($userQuery);

$pwStatement = "SELECT * FROM pemilikwisata WHERE pw_id='$ID'";
$pwQuery = mysqli_query($conn, $pwStatement);
$PWProfile = mysqli_fetch_assoc($pwQuery);

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

    <div class="main-content">
        <div class="profile-card">
            <h2>Personal Information</h2>
            <div class="profile-pic-container">
                <img src="pemilikWisata/foto/fotoProfil/<?= $profile['foto_profil'] ?>" alt="Profile Picture">
            </div>
            <form>
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" id="fullName" name="fullName" value="<?= $profile['nama'] ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" id="position" name="position" value="<?= $PWProfile['jabatan'] ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="businessPhoneNumber">Business Telephone Number</label>
                    <input type="tel" id="businessPhoneNumber" name="businessPhoneNumber" value="<?= $profile['no_telepon']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="text" id="gender" name="gender" value="<?= $profile['gender']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" id="birthdate" name="birthdate" value="<?= $profile['tanggal_lahir']; ?>" disabled>
                </div>
            </form>
        </div>

        <div class="agency-card">
            <h2>Agency Information</h2>
            <div class="agency-logo-container">
                <img src="pemilikWisata/foto/fotoProfil/<?= $PWProfile['foto_instansi']?>" alt="Agency Logo">
            </div>
            <form>
                <div class="form-group">
                    <label for="businessAddress">Business Address</label>
                    <p><?= $PWProfile['alamat_bisnis'] ?></p>
                </div>
                <div class="form-group">
                    <label for="taxDocument">Tax Document</label>
                    <a href="pemilikWisata/dokumen/<?= $PWProfile['npwp']?>" target="_blank">See File</a>
                </div>
                <div class="form-group">
                    <label for="businessDocument">Business Document</label>
                    <a href="pemilikWisata/dokumen/<?= $PWProfile['npwp']?>" target="_blank">See File</a>
                </div>
            </form>
            <div class="button-group">
                <a href="indeks.php?page=editProfilWisata"><button class="submit">Edit</button></a>
            </div>
        </div>
    </div>
</body>
</html>