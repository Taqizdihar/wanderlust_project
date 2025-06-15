<?php
include "config.php";

$ID = $_SESSION['user_id'];

$message = "";

if (isset($_POST['submit'])) {
    $profilePicture = $_FILES['profile_picture'];
    $fullName = $_POST['full_name'];
    $position = $_POST['position'];
    $businessTelephone = $_POST['business_telephone'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];

    $agencyName = $_POST['agency'];
    $agencyLogo = $_FILES['agency_logo'];
    $businessAddress = $_POST['business_address'];
    $taxDocument = $_FILES['tax_document'];
    $businessDocument = $_FILES['business_document'];
    
    if (isset($profilePicture)) {
    $uploadOne = 'pemilikWisata/foto/fotoProfil/'.basename($profilePicture['name']);
    
      if (move_uploaded_file($profilePicture['tmp_name'], $uploadOne)) {
        $uploadFoto = $profilePicture['name'];
      } else {
        $uploadFoto = null;
      }
    }

    if (isset($agencyLogo)) {
    $uploadTwo = 'pemilikWisata/foto/fotoProfil/'.basename($agencyLogo['name']);
    
      if (move_uploaded_file($agencyLogo['tmp_name'], $uploadTwo)) {
        $uploadAgency = $agencyLogo['name'];
      } else {
        $uploadAgency = null;
      }
    }

    if (isset($taxDocument)) {
    $uploadThree = 'pemilikWisata/dokumen/'.basename($taxDocument['name']);
    
      if (move_uploaded_file($taxDocument['tmp_name'], $uploadThree)) {
        $uploadTax = $taxDocument['name'];
      } else {
        $uploadTax = null;
      }
    }

    if (isset($businessDocument)) {
    $uploadFour = 'pemilikWisata/dokumen/'.basename($businessDocument['name']);
    
      if (move_uploaded_file($businessDocument['tmp_name'], $uploadFour)) {
        $uploadBusiness = $businessDocument['name'];
      } else {
        $uploadBusiness = null;
      }
    }

  $userStatement = "UPDATE user SET nama = '$fullName', no_telepon = '$businessTelephone', gender = '$gender', tanggal_lahir = '$birthdate', foto_profil = '$uploadFoto' WHERE user_id = '$ID'";
  $queryUser = mysqli_query($conn, $userStatement);
  $userStatement = "INSERT INTO pemilikwisata (pw_id, jabatan, instansi, foto_instansi, alamat_bisnis, npwp, siup, status) VALUES ('$ID', '$position', '$agencyName', '$uploadAgency', '$businessAddress', '$uploadTax', '$uploadBusiness', 'review')";
  $queryUser = mysqli_query($conn, $userStatement);

  if (mysqli_affected_rows($conn) != 0) {
        header("location: /Proyek Wanderlust/wanderlust_project/indeks.php?page=dashboardWisata");
        exit();
    } else {
        echo "<p>Registration Failed. Please try again later</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Identity Registration</title>
  <link rel="stylesheet" href="pemilikWisata/cssWisata/verifikasiEntitas.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

  <h1 class="form-title">Business Identity</h1>

  <?php if (!empty($message)) { echo $message; }?>

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