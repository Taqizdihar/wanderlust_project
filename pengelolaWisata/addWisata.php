<?php
include "config.php";

$ID = $_SESSION['user_id'];
$sqlStatement1 = "SELECT * FROM user WHERE user_id='$ID'";
$query = mysqli_query($conn, $sqlStatement1);
$profile = mysqli_fetch_assoc($query);

$sqlStatement2 = "SELECT * FROM pemilikwisata WHERE pw_id='$ID'";
$query = mysqli_query($conn, $sqlStatement2);
$PWProfile = mysqli_fetch_assoc($query);
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
            <h1>Tourism Property Entry Form</h1>
            
            <form action="process_form.php" method="post" enctype="multipart/form-data">

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
                                <option value="">-- Select Type --</option>
                                <option value="Nature">Nature</option>
                                <option value="Cultural">Cultural</option>
                                <option value="Historical">Historical</option>
                                <option value="Adventure">Adventure</option>
                                <option value="Beach">Beach</option>
                                <option value="Mountain">Mountain</option>
                                <option value="Theme Park">Theme Park</option>
                                <option value="Museum">Museum</option>
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
                            <input type="number" id="ticket_price" name="ticket_price" min="0" step="1000" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="pic_phone" class="required">PIC Phone Number</label>
                            <input type="number" id="pic_phone" name="pic_phone" required>
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
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</body>
</html>