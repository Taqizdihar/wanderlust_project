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
			$uploadedNPWP = $NPWP['name'];
			echo "upload NPWP berhasil";
		} else {
			$uploadedNPWP = null;
		}
	}

    if (isset($NIB)) {
		$uploadFile = 'photos/'.basename($NIB['name']);
		
		if (move_uploaded_file($NIB['tmp_name'], $uploadFile)) {
			$uploadedNIB = $NIB['name'];
			echo "upload NPWP berhasil";
		} else {
			$uploadedNIB = null;
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
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 20px;
    text-align: center;
}

h1 {
    margin-top: 20px;
    font: bold 40px "MuseoModerno";
    color: #bf6115;
}

form {
    margin-top: 40px;
}

.container {
    background-color: #bf6115;
    padding: 40px;
    border-radius: 15px;
    max-width: 1200px;
    height: 350px;
    margin: auto;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 120px;
}

.form-group {
    flex: 1 1 45%;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

h4 {
    font: bold 15px "verdana";
    color: white;
    margin: 0;
    margin-bottom: 10px;
}

label {
    font: bold 15px "verdana";
    color: white;
    margin-bottom: 5px;
}

input[type="text"], input[type="tel"], textarea {
    width: 100%;
    padding: 8px;
    border: none;
    border-radius: 5px;
}

.fileInput {
    display: none;
}

.fileButton {
    display: inline-block;
    background-color: #444;
    color: white;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
}

.buttons {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}

#reset, #submit {
    padding: 10px 20px;
    font: bold 15px "verdana";
    background-color: #444;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.logo {
    margin-top: 40px;
    display: flex;
    justify-content: center;
    height: 0px;
}

.logo img {
    height: 55px;
    width: 160px;
}
</style>
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