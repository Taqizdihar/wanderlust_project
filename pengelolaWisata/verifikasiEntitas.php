<?php
include "config.php";

if (isset($_POST['submitBtn'])) {
    $namaFull = $_POST['fname'];
    $phoneNumber = $_POST['phone'];
    $NPWP = $_POST['npwp'];
    $NIB = $_POST['nib'];
    $address = $_POST['address'];

    if (isset($NPWP)) {
		$uploadFile = 'photos/'.basename($NPWP['name']);
		
		if (move_uploaded_file($NPWP['tmp_name'], $uploadFile)) {
			$foto = $fileFoto['name'];
			echo "upload file berhasil";
		} else {
			$foto = null;
		}
	}

    $sqlStatement = "INSERT INTO user VALUES('', '', '$email', '', '$passwordSecured', '$role', '')";
    $query = mysqli_query($conn, $sqlStatement);
    
    if (mysqli_affected_rows($conn) != 0) {
        if ($role == 'wisatawan') {
            header("location: /Proyek Wanderlust/wanderlust_project/indeks.php?page=homeUmum");
            exit();
        } else if ($role == 'pw') {
            header("location: /Proyek Wanderlust/wanderlust_project/indeks.php?page=verifikasiEntitas");
            exit();
        }
    } else {
        echo "<p>Pendaftaran akun gagal!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Verify Identity</title>
  <link rel="stylesheet" href="pengelolaWisata/cssWisata/verifikasiEntitas.css?v=1.0.4">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
</head>
<body>

<h1>Your Identity</h1>
<form action="" method="post" enctype="multipart/form-data">
  <div class="container">
    <div class="form-row">
      <div class="form-group">
        <label for="fname">Full Name</label>
        <input type="text" name="fname" placeholder="Your full name" required>
      </div>
      <div class="form-group">
        <h4>Tax Document</h4>
        <label for="npwp" class="fileButton">Upload</label>
        <input type="file" id="npwp" name="npwp" class="fileInput" required>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="tel" name="phone" placeholder="Your Phone Number" required>
        </div>
        <div class="form-group">
        <h4>Legal Business Document</h4>
        <label for="nib" class="fileButton">Upload</label>
        <input type="file" id="nib" name="nib" class="fileInput" required>
      </div>
    </div>

    <div class="form-group" style="width: 100%;">
      <label for="address">Legal Entity Address</label>
      <textarea name="address" rows="4" placeholder="Your Legal Entity Address" required></textarea>
    </div>

    <div class="buttons">
        <input type="reset" value="Reset" id="reset">
        <input type="submit" value="Submit" name="submitBtn" id="submit">
    </div>
  </div>

  <div class="logo">
        <img src="Umum/photos/Wanderings for Wonders side.png" alt="Wanderlust Logo">
    </div>
</form>

</body>
</html>