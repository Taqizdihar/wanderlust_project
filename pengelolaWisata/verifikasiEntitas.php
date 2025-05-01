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
<form action="process.php" method="post" enctype="multipart/form-data">
  <div class="container">
    <div class="form-row">
      <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" name="fullname" placeholder="Your full name" required>
      </div>
      <div class="form-group">
        <label for="npwp">Tax Document</label>
        <input type="file" name="npwp" accept="image/*" required>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="tel" name="phone" placeholder="Your Phone Number" required>
      </div>
      <div class="form-group">
        <label for="nib">Legal Business Document</label>
        <input type="file" name="nib" accept="image/*" required>
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