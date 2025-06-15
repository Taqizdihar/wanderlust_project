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

    <div class="main-content">
        <div class="profile-card">
            <h2>Personal Information</h2>
            <div class="profile-pic-container">
                <img src="pemilikWisata/foto/fotoProfil/<?= htmlspecialchars($profile['foto_profil'] ?? 'default.jpg') ?>" alt="Profile Picture">
            </div>
            <form>
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" id="fullName" name="fullName" value="<?= htmlspecialchars($profile['nama_lengkap'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" id="position" name="position" value="<?= htmlspecialchars($profile['jabatan'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="businessPhoneNumber">Business Telephone Number</label>
                    <input type="tel" id="businessPhoneNumber" name="businessPhoneNumber" value="<?= htmlspecialchars($PWProfile['no_telp_bisnis'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender">
                        <option value="Male" <?= (isset($profile['gender']) && $profile['gender'] == 'Male') ? 'selected' : '' ?>>Male</option>
                        <option value="Female" <?= (isset($profile['gender']) && $profile['gender'] == 'Female') ? 'selected' : '' ?>>Female</option>
                        <option value="Other" <?= (isset($profile['gender']) && $profile['gender'] == 'Other') ? 'selected' : '' ?>>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" id="birthdate" name="birthdate" value="<?= htmlspecialchars($profile['tanggal_lahir'] ?? '') ?>">
                </div>
            </form>
        </div>

        <div class="agency-card">
            <h2>Agency Information</h2>
            <div class="agency-logo-container">
                <img src="Umum/foto/Kementerian Pariwisata logo.png" alt="Agency Logo">
            </div>
            <form>
                <div class="form-group">
                    <label for="businessAddress">Business Address</label>
                    <textarea id="businessAddress" name="businessAddress"><?= htmlspecialchars($PWProfile['alamat_bisnis'] ?? '') ?></textarea>
                </div>
                <div class="form-group">
                    <label for="taxDocument">Tax Document</label>
                    <input type="file" id="taxDocument" name="taxDocument">
                </div>
                <div class="form-group">
                    <label for="businessDocument">Business Document</label>
                    <input type="file" id="businessDocument" name="businessDocument">
                </div>
            </form>
            <div class="button-group">
                <button type="button" class="reset">Reset</button>
                <button type="submit" class="submit">Submit</button>
            </div>
        </div>
    </div>
</body>
</html>