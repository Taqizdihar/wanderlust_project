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
		$uploadFile = 'pengelolaWisata/photos/'.basename($NPWP['name']);
		
      if (move_uploaded_file($NPWP['tmp_name'], $uploadFile)) {
        $uploadedNPWP = $NPWP['name'];
        unlink('pengelolaWisata/photos/'.$oldNPWP);
      } else {
        $uploadedNPWP = null;
      }
	  }

    if (isset($NIB)) {
		$uploadFile = 'pengelolaWisata/photos/'.basename($NIB['name']);
		
      if (move_uploaded_file($NIB['tmp_name'], $uploadFile)) {
        $uploadedNIB = $NIB['name'];
        unlink('pengelolaWisata/photos/'.$oldNIB);
      } else {
        $uploadedNIB = null;
      }
	  }


    $sqlStatement3 = "UPDATE user SET nama='$fullName', email='$email', phonenumber='$phoneNumber' WHERE user_id='$ID'";   
    $query = mysqli_query($conn, $sqlStatement3);

    $sqlStatement4 = "UPDATE pemilikwisata SET legal_document_address='$legalAddress', tax_document='$uploadedNPWP', legal_business_document='$uploadedNIB' WHERE pw_id='$ID'";   
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
    <link rel="stylesheet" href="pengelolaWisata/cssWisata/editProfilWisata.css?v=1.0.4">
    <link rel="stylesheet" href="cssWisata/editProfilWisata.css?v=1.0.4">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include "pengelolaWisata/viewsWisata.php";?>

    <div class="main">
        <form method="post" enctype="multipart/form-data">
            <table border="0">
                <tr>
                    <td>Full Name</td>
                    <td>:</td>
                    <td><input name="fullname" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><input name="email" required></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>:</td>
                    <td><input name="phone" required></td>
                </tr>
                <tr>
                    <td valign="top">Address</td>
                    <td valign="top">:</td>
                    <td><textarea name="address" rows="3" cols="60" required></textarea></td>
                </tr>
                <tr>
                    <td valign="top">Tax Document</td>
                    <td valign="top">:</td>
                    <td><input type="file" name="npwp" accept="image/*, .doc, .docx, .pdf" required></td>
                </tr>
                <tr>
                    <td valign="top">Legal Business Document</td>
                    <td valign="top">:</td>
                    <td><input type="file" name="nib" accept="image/*, .doc, .docx, .pdf" required></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="submit" value="Save" name="save">
                        <input type="reset" value="Reset" onclick="return confirm('Reset Form?')>
                    </td>
                </tr>
            </table>
            <br><br>
        </form>
    </div>
</body>
</html>