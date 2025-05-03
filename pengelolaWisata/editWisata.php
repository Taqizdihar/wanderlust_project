<?php
include "config.php";

$ID = $_SESSION['user_id'];
$lokasi_id = $_GET['id_lokasi'];

$sqlStatement1 = "SELECT * FROM user WHERE user_id='$ID'";
$query1 = mysqli_query($conn, $sqlStatement1);
$profile = mysqli_fetch_assoc($query1);

$sqlStatement2 = "SELECT * FROM pemilikwisata WHERE pw_id='$ID'";
$query2 = mysqli_query($conn, $sqlStatement2);
$PWProfile = mysqli_fetch_assoc($query2);

$sqlStatement3 = "SELECT * FROM lokasi WHERE id_lokasi='$lokasi_id'";
$query3 = mysqli_query($conn, $sqlStatement3);
$dataLokasi = mysqli_fetch_assoc($query3);

$sqlStatement4 = "SELECT * FROM foto_lokasi WHERE id_lokasi='$lokasi_id'";
$query4 = mysqli_query($conn, $sqlStatement4);
$dataFotoLokasi = mysqli_fetch_assoc($query4);

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
    $oldLegalDocument = $dataLokasi['surat_izin'];
    $legalDocument = $_FILES['document'];

    if (isset($legalDocument)) {
		$uploadFile = 'pengelolaWisata/photos/'.basename($legalDocument['name']);
		
      if (move_uploaded_file($legalDocument['tmp_name'], $uploadFile)) {
        $uploadedDocument = $legalDocument['name'];
        unlink('pengelolaWisata/photos/'.$oldLegalDocument);
      } else {
        $uploadedDocument = null;
      }
	}

    $sqlStatement5 = "UPDATE lokasi SET nama_lokasi='$propertyName', alamat_lokasi='$propertyAddress', jenis_wisata='$propertyType', waktu_buka='$openTime', waktu_tutup='$closeTime', deskripsi='$propertyDescription', harga_tiket='$ticketPrice', jumlah_tiket='$ticketQuota', nomor_pic='$picPhone', surat_izin='$uploadedDocument' WHERE id_lokasi='$lokasi_id'";
    $query5 = mysqli_query($conn, $sqlStatement5);
    
    $updateFotoFolder = "SELECT url_photo FROM foto_lokasi WHERE id_lokasi='$lokasi_id'";
    $queryFolder = mysqli_query($conn, $updateFotoFolder);
    $foto = mysqli_fetch_assoc($queryFolder);

    while ($foto = mysqli_fetch_assoc($queryFolder)) {
            $path = 'pengelolaWisata/photos/'.$foto['url_photo'];
            if (file_exists($path)) {
            unlink($path);
        }
    }

    $sqlStatement6 = "DELETE FROM foto_lokasi WHERE id_lokasi='$id_lokasi'";
    mysqli_query($conn, $sqlStatement6);

    for ($i = 1; $i <= 6; $i++) {
        $input = "foto$i";
        if (isset($_FILES[$input])) {
            $filename = $_FILES[$input]['name'];
            $tmpName = $_FILES[$input]['tmp_name'];
    
            $target = "pengelolaWisata/photos/" . basename($filename);
            move_uploaded_file($tmpName, $target);
    
            $urutan = $i;
            mysqli_query($conn, "INSERT INTO foto_lokasi (id_lokasi, url_photo, urutan) VALUES ('$id_lokasi', '$filename', '$urutan')");
        }
    }
    
    if (mysqli_affected_rows($conn) != 0) {
        header("location: /Proyek Wanderlust/wanderlust_project/indeks.php?page=daftarWisata");
        exit();
    } else {
        echo "<p>Property Edit Failed</p>";
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Edit</title>
    <link rel="stylesheet" href="pengelolaWisata/cssWisata/editWisata.css?v=1.0.4">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include "pengelolaWisata/viewsWisata.php";?>
    <div class="main">
        <div class="container">
            <h1 id="form-heading">Edit Property</h1>
            
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