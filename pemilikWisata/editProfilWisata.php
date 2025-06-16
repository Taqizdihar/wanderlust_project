<?php
include "config.php";

$ID = $_SESSION['user_id'];

$getProfileStatement = "SELECT * FROM user JOIN pemilikwisata ON user.user_id = pemilikwisata.pw_id WHERE user.user_id = '$ID'";
$profileQuery = mysqli_query($conn, $getProfileStatement);
$profile = mysqli_fetch_assoc($profileQuery);

if (isset($_POST['submit'])) {
    $nama = $_POST['full_name'];
    $no_telepon = $_POST['business_telephone'];
    $gender = $_POST['gender'];
    $tanggal_lahir = $_POST['birthdate'];
    
    $jabatan = $_POST['position'];
    $instansi = $_POST['agency'];
    $alamat_bisnis = $_POST['business_address'];


    $targetDir = "pemilikWisata/foto/fotoProfil/";
    $namaFileProfil = $_POST['old_profile_picture'];
    $namaFileInstansi = $_POST['old_agency_logo'];

    $dokumenDir = "pemilikWisata/dokumen/";
    $namaFileNpwp = $_POST['old_tax_document'];
    $namaFileSiup = $_POST['old_business_document'];

    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0 && !empty($_FILES['profile_picture']['name'])) {
        $namaFileProfil = basename($_FILES['profile_picture']['name']);
        move_uploaded_file($_FILES['profile_picture']['tmp_name'], $targetDir . $namaFileProfil);
    }
    
    if (isset($_FILES['agency_logo']) && $_FILES['agency_logo']['error'] == 0 && !empty($_FILES['agency_logo']['name'])) {
        $namaFileInstansi = basename($_FILES['agency_logo']['name']);
        move_uploaded_file($_FILES['agency_logo']['tmp_name'], $targetDir . $namaFileInstansi);
    }

    if (isset($_FILES['tax_document']) && $_FILES['tax_document']['error'] == 0 && !empty($_FILES['tax_document']['name'])) {
        $namaFileNpwp = basename($_FILES['tax_document']['name']);
        move_uploaded_file($_FILES['tax_document']['tmp_name'], $dokumenDir . $namaFileNpwp);
    }

    if (isset($_FILES['business_document']) && $_FILES['business_document']['error'] == 0 && !empty($_FILES['business_document']['name'])) {
        $namaFileSiup = basename($_FILES['business_document']['name']);
        move_uploaded_file($_FILES['business_document']['tmp_name'], $dokumenDir . $namaFileSiup);
    }

    $sql_user = "UPDATE user SET nama = '$nama', no_telepon = '$no_telepon', gender = '$gender', tanggal_lahir = '$tanggal_lahir', foto_profil = '$namaFileProfil' 
                 WHERE user_id = '$ID'";
    
    $sql_pw = "UPDATE pemilikwisata SET jabatan = '$jabatan', instansi = '$instansi', alamat_bisnis = '$alamat_bisnis', foto_instansi = '$namaFileInstansi',npwp = '$namaFileNpwp', siup = '$namaFileSiup'
               WHERE pw_id = '$ID'";

    $queryUserUpdate = mysqli_query($conn, $sql_user);
    $queryPWUpdate = mysqli_query($conn, $sql_pw);
    
    if ($queryUserUpdate && $queryPWUpdate) {
        header("location:indeks.php?page=profilPemilikWisata");
        exit();
    } else {
        echo "<p>Profile Update Failed</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="pemilikWisata/cssWisata/editProfilWisata.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert+One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php include "pemilikWisata/viewsWisata.php";?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="main-container">
            <div class="form-section personal-info">
                <h2>Informasi Pribadi</h2>
                <div class="picture-placeholder">
                    <img src="pemilikWisata/foto/fotoProfil/<?= $profile['foto_profil']; ?>" alt="Pratinjau Foto Profil" class="profile-pic" id="profilePreview">
                    <label for="profilePictureInput" class="change-pic-btn">Ganti Foto</label>
                    <input type="file" id="profilePictureInput" name="profile_picture" accept="image/*">
                    <input type="hidden" name="old_profile_picture" value="<?= $profile['foto_profil']; ?>">
                </div>
                <div class="input-group">
                    <label for="full_name">Nama Lengkap</label>
                    <input type="text" id="full_name" name="full_name" value="<?= $profile['nama']; ?>">
                </div>
                <div class="input-group">
                    <label for="position">Jabatan</label>
                    <input type="text" id="position" name="position" value="<?= $profile['jabatan']; ?>">
                </div>
                <div class="input-group">
                    <label for="business_telephone">Nomor Telepon Bisnis</label>
                    <input type="tel" id="business_telephone" name="business_telephone" value="<?= $profile['no_telepon']; ?>">
                </div>
                <div class="input-group">
                    <label for="gender">Jenis Kelamin</label>
                    <select id="gender" name="gender">
                        <option value="male" <?php if($profile['gender'] == 'male') echo 'selected'; ?>>Laki-laki</option>
                        <option value="female" <?php if($profile['gender'] == 'female') echo 'selected'; ?>>Perempuan</option>
                        <option value="not set" <?php if($profile['gender'] == 'not set') echo 'selected'; ?>>Tidak Disebutkan</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="birthdate">Tanggal Lahir</label>
                    <input type="date" id="birthdate" name="birthdate" value="<?php echo $profile['tanggal_lahir']; ?>">
                </div>
            </div>

            <div class="form-section agency-info">
                <h2>Informasi Instansi</h2>
                <div class="picture-placeholder">
                    <img src="pemilikWisata/foto/fotoProfil/<?= $profile['foto_instansi']; ?>" alt="Pratinjau Logo Instansi" class="logo-pic" id="logoPreview">
                    <label for="logoInput" class="change-pic-btn">Ganti Logo</label>
                    <input type="file" id="logoInput" name="agency_logo" accept="image/*">
                    <input type="hidden" name="old_agency_logo" value="<?= $profile['foto_instansi']; ?>">
                </div>
                <div class="input-group">
                    <label for="agency">Nama Instansi</label>
                    <input type="text" id="agency" name="agency" value="<?= $profile['instansi']; ?>">
                </div>
                <div class="input-group">
                    <label for="business_address">Alamat Bisnis</label>
                    <textarea id="business_address" name="business_address"><?= $profile['alamat_bisnis']; ?></textarea>
                </div>
                <div class="input-group-doc">
                    <p>File NPWP saat ini: <?= $profile['npwp']; ?></p>
                    <label for="tax_document">Unggah Dokumen NPWP Baru <i class="fa-solid fa-arrow-up-from-bracket"></i></label>
                    <input type="file" id="tax_document" name="tax_document" accept=".pdf,.doc,.docx,.jpg,.png">
                    <input type="hidden" name="old_tax_document" value="<?= $profile['npwp']; ?>">
                </div>
                <div class="input-group-doc">
                    <p>File SIUP saat ini: <?= $profile['siup']; ?></p>
                    <label for="business_document">Unggah Dokumen SIUP Baru <i class="fa-solid fa-arrow-up-from-bracket"></i></label>
                    <input type="file" id="business_document" name="business_document" accept=".pdf,.doc,.docx,.jpg,.png">
                    <input type="hidden" name="old_business_document" value="<?= $profile['siup']; ?>">
                </div>
            </div>
        </div>
        
        <div class="form-buttons">
            <button type="reset" class="btn-reset">Reset</button>
            <button type="submit" name="submit" class="btn-submit">Simpan Perubahan</button>
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
          document.getElementById('profilePreview').src = 'pemilikWisata/foto/fotoProfil/<?php echo htmlspecialchars($profile['foto_profil']); ?>';
          document.getElementById('logoPreview').src = 'pemilikWisata/foto/fotoProfil/<?php echo htmlspecialchars($profile['foto_instansi']); ?>';
      }, 0);
  });
</script>
</body>
</html>
