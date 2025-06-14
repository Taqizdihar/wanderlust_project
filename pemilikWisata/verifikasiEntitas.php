<?php
// Selalu mulai sesi di bagian paling atas
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Sertakan file konfigurasi database Anda
// Pastikan file "config.php" ada di direktori yang sama atau path-nya benar
include "config.php";

// Asumsikan user_id disimpan dalam sesi setelah login
// Untuk pengujian, Anda bisa mengatur nilainya secara manual seperti ini:
// $_SESSION['user_id'] = 1; 
$ID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

$message = ""; // Variabel untuk menyimpan pesan notifikasi

if (isset($_POST['submit'])) {
    if ($ID === null) {
        $message = "<p style='color:red;'>Error: User session tidak ditemukan. Silakan login kembali.</p>";
    } else {
        // --- Mengambil data dari form ---
        // Personal Information
        $fullName = $_POST['full_name'];
        $position = $_POST['position'];
        $businessTelephone = $_POST['business_telephone'];
        $gender = $_POST['gender'];
        $birthdate = $_POST['birthdate'];

        // Agency Information
        $businessAddress = $_POST['business_address'];
        $taxDocument = $_FILES['tax_document'];
        $businessDocument = $_FILES['business_document'];

        // --- Proses Upload File ---
        $uploadDir = 'pemilikWisata/dokumen/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $uploadedTaxDocName = null;
        $uploadedBusinessDocName = null;

        // Proses Tax Document
        if (isset($taxDocument) && $taxDocument['error'] == 0) {
            $taxDocExtension = pathinfo($taxDocument['name'], PATHINFO_EXTENSION);
            $safeTaxDocName = 'taxdoc_' . $ID . '_' . time() . '.' . $taxDocExtension;
            if (move_uploaded_file($taxDocument['tmp_name'], $uploadDir . $safeTaxDocName)) {
                $uploadedTaxDocName = $safeTaxDocName;
            }
        }

        // Proses Business Document
        if (isset($businessDocument) && $businessDocument['error'] == 0) {
            $businessDocExtension = pathinfo($businessDocument['name'], PATHINFO_EXTENSION);
            $safeBusinessDocName = 'businessdoc_' . $ID . '_' . time() . '.' . $businessDocExtension;
            if (move_uploaded_file($businessDocument['tmp_name'], $uploadDir . $safeBusinessDocName)) {
                $uploadedBusinessDocName = $safeBusinessDocName;
            }
        }
        
        // --- SQL Operations ---
        $sqlStatement1 = "UPDATE user SET 
                            nama='$fullName', 
                            no_telepon='$businessTelephone', 
                            jenis_kelamin='$gender', 
                            tanggal_lahir='$birthdate' 
                          WHERE user_id = '$ID'";
        
        $query1 = mysqli_query($conn, $sqlStatement1);

        $sqlStatement2 = "INSERT INTO pemilikwisata (pw_id, posisi, alamat_bisnis, npwp, siup, status) 
                          VALUES ('$ID', '$position', '$businessAddress', '$uploadedTaxDocName', '$uploadedBusinessDocName', 'review')
                          ON DUPLICATE KEY UPDATE 
                            posisi='$position', 
                            alamat_bisnis='$businessAddress', 
                            npwp=VALUES(npwp), 
                            siup=VALUES(siup), 
                            status='review'";

        $query2 = mysqli_query($conn, $sqlStatement2);
        
        if ($query1 && $query2) {
            // Ganti dengan path redirect yang sesuai dengan struktur proyek Anda
            header("location: /Proyek Wanderlust/wanderlust_project/indeks.php?page=dashboardWisata&ID=".$ID);
            exit();
        } else {
            $message = "<p style='color:red;'>Terjadi kesalahan saat menyimpan data: " . mysqli_error($conn) . "</p>";
        }
    }
}

// Jangan tutup koneksi di sini jika halaman masih akan dirender
// mysqli_close($conn); 
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pendaftaran Identitas Bisnis</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f0f2f5;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      margin: 20px 0;
    }
    .form-title {
        font-size: 2.5em;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
    }
    .main-container {
      display: flex;
      gap: 20px;
      width: 100%;
      max-width: 950px;
      padding: 0; 
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      background-color: #fff;
      overflow: hidden; /* To keep children within rounded corners */
    }
    .form-section {
      padding: 30px;
      flex: 1;
      display: flex;
      flex-direction: column;
    }
    .personal-info {
      background-color: #ffffff;
    }
    .agency-info {
      background-color: #D9A982;
    }
    .form-section h2 {
      text-align: center;
      margin-top: 0;
      margin-bottom: 25px;
      font-size: 1.5em;
      color: #333;
      font-weight: 600;
    }
    .picture-placeholder {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 20px;
    }
    .picture-placeholder img {
      width: 110px;
      height: 110px;
      object-fit: cover;
      background-color: #e9ecef;
      border: 3px solid #dee2e6;
    }
    .picture-placeholder .profile-pic {
      border-radius: 50%;
    }
    .picture-placeholder .logo {
      border-radius: 8px; /* Slightly rounded corners for logo */
    }
    .picture-placeholder button {
      margin-top: 10px;
      padding: 6px 15px;
      border: 1px solid #C88E5F;
      border-radius: 5px;
      background-color: #C88E5F;
      color: white;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.2s;
    }
    .picture-placeholder button:hover {
        background-color: #b37b4c;
    }
    .input-group {
      margin-bottom: 15px;
    }
    .input-group label {
      display: block;
      margin-bottom: 6px;
      font-weight: 600;
      font-size: 0.9em;
      color: #495057;
    }
    .agency-info .input-group label {
        color: #4c3e32;
    }
    .input-group input,
    .input-group select,
    .input-group textarea {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ced4da;
      box-sizing: border-box;
      font-size: 1em;
      transition: border-color 0.2s, box-shadow 0.2s;
    }
    .input-group input:focus,
    .input-group select:focus,
    .input-group textarea:focus {
        border-color: #C88E5F;
        box-shadow: 0 0 0 2px rgba(200, 142, 95, 0.25);
        outline: none;
    }
    .input-group textarea {
        resize: vertical;
        min-height: 100px;
    }
    .form-buttons {
      display: flex;
      justify-content: flex-end;
      gap: 15px;
      margin-top: 25px;
      width: 100%;
      max-width: 950px;
    }
    .form-buttons input {
      padding: 12px 30px;
      border: none;
      border-radius: 5px;
      font-size: 1em;
      font-weight: bold;
      cursor: pointer;
      transition: opacity 0.2s;
    }
    .form-buttons input:hover {
        opacity: 0.9;
    }
    .btn-reset {
      background-color: #B22222;
      color: white;
    }
    .btn-submit {
      background-color: #2E8B57;
      color: white;
    }
  </style>
</head>
<body>

  <h1 class="form-title">Business Identity</h1>

  <?php echo $message; // Tampilkan pesan notifikasi jika ada ?>

  <form action="" method="post" enctype="multipart/form-data">
    <div class="main-container">
      
      <section class="form-section personal-info">
        <h2>Personal Information</h2>
        <div class="picture-placeholder">
          <img src="https://via.placeholder.com/110" alt="Profile Picture" class="profile-pic">
          <button type="button">Change Picture</button>
        </div>
        <div class="input-group">
          <label for="full_name">Full Name</label>
          <input type="text" id="full_name" name="full_name" required>
        </div>
        <div class="input-group">
          <label for="position">Position</label>
          <input type="text" id="position" name="position" required>
        </div>
        <div class="input-group">
          <label for="business_telephone">Business Telephone Number</label>
          <input type="tel" id="business_telephone" name="business_telephone" required>
        </div>
        <div class="input-group">
          <label for="gender">Gender</label>
          <select id="gender" name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
        <div class="input-group">
          <label for="birthdate">Birthdate</label>
          <input type="date" id="birthdate" name="birthdate" required>
        </div>
      </section>

      <section class="form-section agency-info">
        <h2>Agency Information</h2>
        <div class="picture-placeholder">
           <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Logo_of_the_Ministry_of_Tourism_of_the_Republic_of_Indonesia.svg/2048px-Logo_of_the_Ministry_of_Tourism_of_the_Republic_of_Indonesia.svg.png" alt="Agency Logo" class="logo">
          <button type="button">Change Picture</button>
        </div>
        <div class="input-group">
          <label for="business_address">Business Address</label>
          <textarea id="business_address" name="business_address" rows="4" required></textarea>
        </div>
        <div class="input-group">
          <label for="tax_document">Tax Document</label>
          <input type="file" id="tax_document" name="tax_document" accept=".pdf,.doc,.docx" required>
        </div>
        <div class="input-group">
          <label for="business_document">Business Document</label>
          <input type="file" id="business_document" name="business_document" accept=".pdf,.doc,.docx" required>
        </div>
      </section>
    </div>
    
    <div class="form-buttons">
      <input type="reset" value="Reset" class="btn-reset">
      <input type="submit" value="Submit" name="submit" class="btn-submit">
    </div>
  </form>

</body>
</html>