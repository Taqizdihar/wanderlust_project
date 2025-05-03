<?php
include "config.php";

$ID = $_SESSION['user_id'];
$sqlStatement1 = "SELECT * FROM user WHERE user_id='$ID'";
$query = mysqli_query($conn, $sqlStatement1);
$profile = mysqli_fetch_assoc($query);

$sqlStatement2 = "SELECT * FROM pemilikwisata WHERE pw_id='$ID'";
$query = mysqli_query($conn, $sqlStatement2);
$PWProfile = mysqli_fetch_assoc($query);

if (isset($_POST['submit'])) {
    $propertyName = $_POST['property_name'];
    $propertyAddress = $_POST['property_address'];
    $propertyType = $_POST['property_type'];
    $openTime = $_POST['open_time'];
    $closeTime = $_POST['close_time'];
    $propertyDescription = $_POST['property_description'];
    $ticketPrice = $_POST['ticket_price'];
    $ticketQuota = $_POST['ticket_quota'];
    $picPhone = $_POST['pic_phone'];
    $legalDocument = $_FILES['document'];
    $photo1 = $_FILES['photo1'];
    $photo2 = $_FILES['photo2'];
    $photo3 = $_FILES['photo3'];
    $photo4 = $_FILES['photo4'];
    $photo5 = $_FILES['photo5'];
    $photo6 = $_FILES['photo6'];

    if (isset($legalDocument)) {
		$uploadFile = 'pengelolaWisata/photos/'.basename($legalDocument['name']);
		
      if (move_uploaded_file($legalDocument['tmp_name'], $uploadFile)) {
        $uploadedDocument = $legalDocument['name'];
      } else {
        $uploadedDocument = null;
      }
	}

    if (isset($photo1)) {
		$uploadFile = 'pengelolaWisata/photos/'.basename($photo1['name']);
		
      if (move_uploaded_file($photo1['tmp_name'], $uploadFile)) {
        $uploadedPhoto1 = $photo1['name'];
      } else {
        $uploadedPhoto1 = null;
      }
	}

    if (isset($photo2)) {
		$uploadFile = 'pengelolaWisata/photos/'.basename($photo2['name']);
		
      if (move_uploaded_file($photo2['tmp_name'], $uploadFile)) {
        $uploadedPhoto2 = $photo2['name'];
      } else {
        $uploadedPhoto2 = null;
      }
	}

    if (isset($photo3)) {
		$uploadFile = 'pengelolaWisata/photos/'.basename($photo3['name']);
		
      if (move_uploaded_file($photo3['tmp_name'], $uploadFile)) {
        $uploadedPhoto3 = $photo3['name'];
      } else {
        $uploadedPhoto3 = null;
      }
	}

    if (isset($photo4)) {
		$uploadFile = 'pengelolaWisata/photos/'.basename($photo2['name']);
		
      if (move_uploaded_file($photo4['tmp_name'], $uploadFile)) {
        $uploadedPhoto4 = $photo4['name'];
      } else {
        $uploadedPhoto4 = null;
      }
	}

    if (isset($photo5)) {
		$uploadFile = 'pengelolaWisata/photos/'.basename($photo5['name']);
		
      if (move_uploaded_file($photo5['tmp_name'], $uploadFile)) {
        $uploadedPhoto5 = $photo5['name'];
      } else {
        $uploadedPhoto5 = null;
      }
	}

    if (isset($photo6)) {
		$uploadFile = 'pengelolaWisata/photos/'.basename($photo6['name']);
		
      if (move_uploaded_file($photo6['tmp_name'], $uploadFile)) {
        $uploadedPhoto6 = $photo6['name'];
      } else {
        $uploadedPhoto6 = null;
      }
	}

    $sqlStatement3 = "INSERT INTO lokasi (pw_id, nama_lokasi, alamat_lokasi, jenis_wisata, waktu_buka, waktu_tutup, deskripsi, harga_tiket, jumlah_tiket, nomor_pic, surat_izin) VALUES('$ID', '$propertyName', '$propertyAddress', '$propertyType', '$openTime', '$closeTime', '$propertyDescription', '$ticketPrice', '$ticketQuota', '$picPhone', '$uploadedDocument')";
    $query3 = mysqli_query($conn, $sqlStatement3);
    $id_lokasi = mysqli_insert_id($conn);

    $sqlStatement4 = "INSERT INTO foto_lokasi (id_lokasi, url_photo, urutan) VALUES('$id_lokasi', '$uploadedPhoto1', 1)";
    $query4 = mysqli_query($conn, $sqlStatement4);

    $sqlStatement5 = "INSERT INTO foto_lokasi (id_lokasi, url_photo, urutan) VALUES('$id_lokasi', '$uploadedPhoto2', 2)";
    $query5 = mysqli_query($conn, $sqlStatement5);

    $sqlStatement6 = "INSERT INTO foto_lokasi (id_lokasi, url_photo, urutan) VALUES('$id_lokasi', '$uploadedPhoto3', 3)";
    $query6 = mysqli_query($conn, $sqlStatement6);

    $sqlStatement7 = "INSERT INTO foto_lokasi (id_lokasi, url_photo, urutan) VALUES('$id_lokasi', '$uploadedPhoto4', 4)";
    $query7 = mysqli_query($conn, $sqlStatement7);

    $sqlStatement8 = "INSERT INTO foto_lokasi (id_lokasi, url_photo, urutan) VALUES('$id_lokasi', '$uploadedPhoto5', 5)";
    $query8 = mysqli_query($conn, $sqlStatement8);

    $sqlStatement9 = "INSERT INTO foto_lokasi (id_lokasi, url_photo, urutan) VALUES('$id_lokasi', '$uploadedPhoto6', 6)";
    $query9 = mysqli_query($conn, $sqlStatement9);
    
    if (mysqli_affected_rows($conn) != 0) {
        header("location: /Proyek Wanderlust/wanderlust_project/indeks.php?page=daftarWisata");
        exit();
    } else {
        echo "<p>Property Add Failed</p>";
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Property</title>
    <link rel="stylesheet" href="pengelolaWisata/cssWisata/addWisata.css?v=1.0.4">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include "pengelolaWisata/viewsWisata.php";?>
    <div class="main">
        <div class="container">
            <h1 id="form-heading">Property Form</h1>
            
            <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="property_name" class="required">Property Name</label>
                    <input type="text" id="property_name" name="property_name" required>
                </div>
                
                <div class="form-group">
                    <label for="property_address" class="required">Property Address</label>
                    <textarea id="property_address" name="property_address" required></textarea>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="property_type" class="required">Type of Property</label>
                            <select id="property_type" name="property_type" required>
                                <option value="Other">Other</option>
                                <option value="Nature">Nature</option>
                                <option value="Cultural">Cultural</option>
                                <option value="Historical">Historical</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="open_time" class="required">Open Time</label>
                            <input type="time" id="open_time" name="open_time" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="close_time" class="required">Close Time</label>
                            <input type="time" id="close_time" name="close_time" required>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="property_description" class="required">Property Description</label>
                    <textarea id="property_description" name="property_description" required></textarea>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="ticket_price" class="required">Ticket Price</label>
                            <input type="number" id="ticket_price" name="ticket_price" min="0" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="ticket_quota" class="required">Ticket Quota</label>
                            <input type="number" id="ticket_quota" name="ticket_quota" min="0" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="pic_phone" class="required">PIC Phone Number</label>
                            <input type="text" id="pic_phone" name="pic_phone" required>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="form-group file-upload">
                            <label for="document">Document:</label>
                            <input type="file" id="document" name="document">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="form-group file-upload">
                            <label for="photo1">Photo 1:</label>
                            <input type="file" id="photo1" name="photo1" accept="image/*">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group file-upload">
                            <label for="photo2">Photo 2:</label>
                            <input type="file" id="photo2" name="photo2" accept="image/*">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group file-upload">
                            <label for="photo3">Photo 3:</label>
                            <input type="file" id="photo3" name="photo3" accept="image/*">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="form-group file-upload">
                            <label for="photo4">Photo 4:</label>
                            <input type="file" id="photo4" name="photo4" accept="image/*">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group file-upload">
                            <label for="photo5">Photo 5:</label>
                            <input type="file" id="photo5" name="photo5" accept="image/*">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group file-upload">
                            <label for="photo6">Photo 6:</label>
                            <input type="file" id="photo6" name="photo6" accept="image/*">
                        </div>
                    </div>
                </div>
                
                <div class="button-group">
                    <input type="reset" value="Reset">
                    <input type="submit" value="Submit" name="submit">
                </div>
            </form>
        </div>
    </div>
</body>
</html>