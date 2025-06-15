<?php
include "config.php";

$ID = $_SESSION['user_id'];
$sqlStatement1 = "SELECT * FROM user WHERE user_id='$ID'";
$query = mysqli_query($conn, $sqlStatement1);
$profile = mysqli_fetch_assoc($query);

$sqlStatement2 = "SELECT * FROM pemilikwisata WHERE pw_id='$ID'";
$query = mysqli_query($conn, $sqlStatement2);
$PWProfile = mysqli_fetch_assoc($query);

if (isset($_POST['save'])) {
    $fullName = $_POST['fullname'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phone'];
    $NPWP = $_FILES['npwp'];
    $oldNPWP = $PWProfile['tax_document'];
    $NIB = $_FILES['nib'];
    $oldNIB = $PWProfile['legal_business_document'];
    $legalAddress = $_POST['address'];

    if (isset($NPWP)) {
		$uploadFile = 'pengelolaWisata/foto/'.basename($NPWP['name']);
		
      if (move_uploaded_file($NPWP['tmp_name'], $uploadFile)) {
        $uploadedNPWP = $NPWP['name'];
        unlink('pengelolaWisata/foto/'.$oldNPWP);
      } else {
        $uploadedNPWP = null;
      }
	  }

    if (isset($NIB)) {
		$uploadFile = 'pengelolaWisata/foto/'.basename($NIB['name']);
		
      if (move_uploaded_file($NIB['tmp_name'], $uploadFile)) {
        $uploadedNIB = $NIB['name'];
        unlink('pengelolaWisata/foto/'.$oldNIB);
      } else {
        $uploadedNIB = null;
      }
	  }


    $sqlStatement3 = "UPDATE user SET nama='$fullName', email='$email', no_telepon='$phoneNumber' WHERE user_id='$ID'";   
    $query = mysqli_query($conn, $sqlStatement3);

    $sqlStatement4 = "UPDATE pemilikwisata SET alamat_bisnis='$legalAddress', npwp='$uploadedNPWP', siup='$uploadedNIB' WHERE pw_id='$ID'";   
    $query = mysqli_query($conn, $sqlStatement4);
    
    if (mysqli_affected_rows($conn) != 0) {
        header("location:indeks.php?page=profilPemilikWisata");
        exit();
    } else {
        echo "<p>Profile Changes Failed</p>";
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Edit</title>
    <link rel="stylesheet" href="pemilikWisata/cssWisata/editProfilWisata.css">
</head>
<body>
    <?php include "pemilikWisata/viewsWisata.php";?>

    <form action="" method="post" enctype="multipart/form-data">
    <div class="main-container">
      
      <div class="form-section personal-info">
        <h2>Personal Information</h2>
        <div class="picture-placeholder">
          <img src="pemilikWisata/foto/fotoProfil/foto_default.png" alt="Profile Picture Preview" class="profile-pic" id="profilePreview">
          <label for="profilePictureInput" class="change-pic-btn">Change Picture</label>
          <input type="file" id="profilePictureInput" name="profile_picture" accept="image/*" required>
        </div>
        <div class="input-group">
          <label for="full_name">Full Name</label>
          <input type="text" id="full_name" name="full_name" required>
        </div>
        <div class="input-group">
          <label for="position">Position</label>
          <input type="text" id="position" name="position" required>
        </div>
        <div class="input-group">
          <label for="business_telephone">Business Telephone Number</label>
          <input type="tel" id="business_telephone" name="business_telephone" required>
        </div>
        <div class="input-group">
          <label for="gender">Gender</label>
          <select id="gender" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
        <div class="input-group">
          <label for="birthdate">Birthdate</label>
          <input type="date" id="birthdate" name="birthdate" required>
        </div>
      </div>

      <div class="form-section agency-info">
        <h2>Agency Information</h2>
        <div class="picture-placeholder">
          <img src="pemilikWisata/foto/fotoProfil/foto_default.png" alt="Agency Logo Preview" class="logo-pic" id="logoPreview">
          <label for="logoInput" class="change-pic-btn">Change Picture</label>
          <input type="file" id="logoInput" name="agency_logo" accept="image/*" required>
        </div>
         <div class="input-group">
          <label for="position">Agency Name</label>
          <input type="text" id="agency" name="agency" required>
        </div>
        <div class="input-group">
          <label for="business_address">Business Address</label>
          <textarea id="business_address" name="business_address" required></textarea>
        </div>
        <div class="input-group-doc">
          <label for="tax_document">Upload Tax Document <i class="fa-solid fa-arrow-up-from-bracket"></i></label>
          <input type="file" id="tax_document" name="tax_document" accept=".pdf,.doc,.docx" required>
        </div>
        <div class="input-group-doc">
          <label for="business_document">Upload Business Document <i class="fa-solid fa-arrow-up-from-bracket"></i></label>
          <input type="file" id="business_document" name="business_document" accept=".pdf,.doc,.docx" required>
        </div>
      </div>
    </div>
    
    <div class="form-buttons">
      <input type="reset" value="Reset" class="btn-reset">
      <input type="submit" value="Submit" name="submit" class="btn-submit">
    </div>
  </form>

<script>
  function setupImagePreview(inputId, previewId) {
    const inputElement = document.getElementById(inputId);
    const previewElement = document.getElementById(previewId);

    inputElement.addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          previewElement.src = e.target.result;
        }
        reader.readAsDataURL(file);
      }
    });
  }

  setupImagePreview('profilePictureInput', 'profilePreview');
  setupImagePreview('logoInput', 'logoPreview');

  document.querySelector('form').addEventListener('reset', function() {
      setTimeout(() => {
          document.getElementById('profilePreview').src = 'pemilikWisata/foto/fotoProfil/foto_default.png';
          document.getElementById('logoPreview').src = 'pemilikWisata/foto/fotoProfil/foto_default.png';
      }, 0);
  });
</script>
</body>
</html>