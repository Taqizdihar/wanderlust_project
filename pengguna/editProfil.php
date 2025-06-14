<?php
include "config.php";

$ID = $_SESSION['user_id'];
$sqlStatement = "SELECT * FROM user WHERE user_id = '$ID'";
$query = mysqli_query($conn, $sqlStatement);
$profil = mysqli_fetch_assoc($query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $no_telepon = $_POST['no_telepon'];
    $gender = $_POST['gender'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $fotoProfil = $_FILES['foto_profil'];

    if ($_FILES['foto_profil']['name'] != '') {
      if (isset($fotoProfil)) {
      $uploadFile = 'pengguna/foto/'.basename($fotoProfil['name']);
      
        if (move_uploaded_file($fotoProfil['tmp_name'], $uploadFile)) {
          $uploadFoto = $fotoProfil['name'];
        } else {
          $uploadFoto = null;
        }
      } else if (empty($fotoProfil)) {
        $uploadFoto = $profil['foto_profil'];
      }

    $updateStatement = "UPDATE user SET nama='$nama', no_telepon='$no_telepon', gender='$gender', tanggal_lahir='$tanggal_lahir', foto_profil='$uploadFoto' WHERE user_id='$ID'";   
  } else {
    $updateStatement = "UPDATE user SET nama='$nama', no_telepon='$no_telepon', gender='$gender', tanggal_lahir='$tanggal_lahir' WHERE user_id='$ID'";
  }
  $queryUpdate = mysqli_query($conn, $updateStatement);

  if (mysqli_affected_rows($conn) != 0) {
      header("location: /Proyek Wanderlust/wanderlust_project/indeks.php?page=Profil");
      exit();
  } else {
      echo "<p>Failed Profile Change</p>";
  }
}

$profil['gender'] = $profil['gender'];
$profil['tanggal_lahir'] = $profil['tanggal_lahir'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit My Profile</title>
  <link rel="stylesheet" href="pengguna/cssPengguna/editProfil.css">
</head>
<body>

  <?php include "pengguna/Header.php";?>

  <main class="profile-container">
    
    <form class="profile-form" method="POST" action="" enctype="multipart/form-data">
        <aside class="sidebar">
            <img src="pengguna/foto/<?= $profil['foto_profil'];?>" class="profile-pic" id="imagePreview" alt="Profile Picture">
            <label for="foto_profil" class="edit-btn">Change Profile Picture</label>
            <input type="file" id="foto_profil" name="foto_profil" accept="image/*" style="display: none;">
            
            <ul class="menu-options">
              <li><a href="indeks.php?page=Saldo">My Balance</a></li>
              <li><a href="notFound.php">My Tickets</a></li>
              <li><a href="indeks.php?page=Favorit">My Bookmark</a></li>
              <li><a href="indeks.php?page=logout" onclick="return confirm('Are you sure to Log Out?')">Log Out</a></li>
            </ul>
        </aside>

        <section class="profile-card">
            <h2>Edit Profile</h2>
            <div class="form-grid">
                <div class="form-group">
                    <label for="nama">Full Name</label>
                    <input type="text" id="nama" name="nama" value="<?= $profil['nama'];?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?= $profil['email'];?>" disabled>
                    <small>Email cannot be changed</small>
                </div>
                <div class="form-group">
                    <label for="no_telepon">Phone Number</label>
                    <input type="tel" id="no_telepon" name="no_telepon" value="<?= $profil['no_telepon'];?>" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Birthdate</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= htmlspecialchars($profil['tanggal_lahir']);?>" required>
                </div>
                <div class="form-group">
                  <div class="action-buttons">
                      <button type="submit" class="btn save-btn">Save Changes</button>
                  </div>
                </div>
            </div>
        </section>
    </form>
  </main>

  <?php include "pengguna/Footer.php";?>

  <script>
    document.getElementById('foto_profil').addEventListener('change', function(event) {
        const [file] = event.target.files;
        if (file) {
            const preview = document.getElementById('imagePreview');
            preview.src = URL.createObjectURL(file);
            preview.onload = () => {
                URL.revokeObjectURL(preview.src);
            }
        }
    });
  </script>

</body>
</html>