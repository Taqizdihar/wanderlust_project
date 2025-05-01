<?php
include "config.php";

$ID = $_SESSION['user_id'];

if (isset($_POST['submitBtn'])) {
    $fullName = $_POST['fullname'];
    $phoneNumber = $_POST['phone'];
    $NPWP = $_FILES['npwp'];
    $NIB = $_FILES['nib'];
    $legalAddress = $_POST['address'];

    if (isset($NPWP)) {
		$uploadFile = 'pengelolaWisata/photos/'.basename($NPWP['name']);
		
		if (move_uploaded_file($NPWP['tmp_name'], $uploadFile)) {
			$uploadedNPWP = $NPWP['name'];
			echo "upload file berhasil";
		} else {
			$uploadedNPWP = null;
		}
	}

    if (isset($NIB)) {
		$uploadFile = 'pengelolaWisata/photos/'.basename($NIB['name']);
		
		if (move_uploaded_file($NIB['tmp_name'], $uploadFile)) {
			$uploadedNIB = $NIB['name'];
			echo "upload file berhasil";
		} else {
			$uploadedNIB = null;
		}
	}
    $sqlStatement1 = "UPDATE user SET nama='$fullName', phonenumber='$phoneNumber' WHERE user_id = '$ID'";
    $query1 = mysqli_query($conn, $sqlStatement1);

    $sqlStatement2 = "INSERT INTO pemilikwisata VALUES('$ID', '$legalAddress', '$uploadedNPWP', '$uploadedNIB', 'review')";
    $query2 = mysqli_query($conn, $sqlStatement2);
    
    if (mysqli_affected_rows($conn) != 0) {
        header("location: /Proyek Wanderlust/wanderlust_project/indeks.php?page=dashboardWisata&ID=".$ID);
        exit();
    } else {
        echo "<p>Pendaftaran gagal!</p>";
    }
}
mysqli_close($conn);
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
        <label for="fullname">Full Name</label>
        <input type="text" name="fullname" placeholder="Your full name" required>
      </div>
      <div class="form-group">
        <label for="npwp">Tax Document</label>
        <input type="file" name="npwp" accept="image/*, .doc, .docx, .pdf" required>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="tel" name="phone" placeholder="Your Phone Number" required>
      </div>
      <div class="form-group">
        <label for="nib">Legal Business Document</label>
        <input type="file" name="nib" accept="image/*, .doc, .docx, .pdf" required>
      </div>
    </div>

    <div class="form-group" style="width: 100%;">
      <label for="address">Legal Entity Address</label>
      <textarea name="address" rows="3" placeholder="Your Legal Entity Address" required></textarea>
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