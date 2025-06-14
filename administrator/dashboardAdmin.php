<?php
include "config.php";

$page = $_GET['page'];
$ID = $_SESSION['user_id'];
$sqlStatement = "SELECT * FROM user WHERE user_id='$ID'";
$query = mysqli_query($conn, $sqlStatement);
$profile = mysqli_fetch_assoc($query);

$sqlStatement = "SELECT user_id FROM user WHERE role IN ('wisatawan', 'pw')";
$query = mysqli_query($conn, $sqlStatement);
$member = mysqli_fetch_all($query, MYSQLI_ASSOC);

// $sqlStatement = "SELECT tempatwisata_id FROM tempatwisata";
// $query = mysqli_query($conn, $sqlStatement);
// $lokasi = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="administrator/cssAdmin/dashboardAdmin.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div class="wrapper">
    <?php include "viewsAdmin.php";?>
    <!-- Topbar -->
<div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 25px; background-color: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
  <!-- Search -->
  <div style="position: relative;">
    <input type="text" placeholder="Search..." style="padding: 8px 12px 8px 35px; border: 1px solid #ccc; border-radius: 8px; width: 250px;">
    <i class="fas fa-search" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #888;"></i>
  </div>

  <!-- Profile Icon -->
  <div>
    <i class="fas fa-user-circle" style="font-size: 26px; color: #007bff; cursor: pointer;"></i>
  </div>
</div>


    <main class="main">
      <div class="main">
        <div class="card">
          <strong>Autentikasi Berhasil!</strong> Selamat datang di area admin.<strong></strong>
        </div>
      </div>
      <div class="main">
        <div class="row">
          <div class="card">
            <h3>Total Members</h3>
            <div class="info-box">
              <p><strong><?= count($member)?></strong></p>
            </div>
          </div>
    

          <div class="card card-center">
            <h3>Total Properties</h3>
            <p><strong><?= count($lokasi)?></strong></p>
          </div>

          <div class="card">
            <h3>Total Transactions</h3>
            <div class="info-box">
              <p><strong>Currently Unavailable</strong></p>
            </div>
          </div>

        </div>
      </div>
    </main>
  </div>
</body>
</html>
