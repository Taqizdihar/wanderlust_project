<?php
include "config.php";

$page = $_GET['page'];
$ID = $_SESSION['user_id'];
$sqlStatement = "SELECT * FROM user WHERE user_id='$ID'";
$query = mysqli_query($conn, $sqlStatement);
$profile = mysqli_fetch_assoc($query);

$feedback = "";

if ($page === 'acc' && isset($_GET['aksi'], $_GET['id'])) {
  $feedback = $_GET['aksi'] === 'acc'
    ? " Pengajuan Pengolah ID {$_GET['id']} diterima."
    : "❌ Pengajuan Pengolah ID {$_GET['id']} ditolak.";
}
if ($page === 'acc_wisata' && isset($_GET['aksi'], $_GET['id'])) {
  $feedback = $_GET['aksi'] === 'acc'
    ? " Wisata ID {$_GET['id']} diterima."
    : "❌ Wisata ID {$_GET['id']} ditolak.";
}

if ($page === 'acc_transaksi' && isset($_GET['aksi'], $_GET['id'])) {
  $feedback = $_GET['aksi'] === 'acc'
    ? " Transaksi ID {$_GET['id']} disetujui."
    : "❌ Transaksi ID {$_GET['id']} ditolak.";
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
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

    <main class="main">
      <?php if ($feedback): ?>
        <div class="feedback"><?= $feedback ?></div>
      <?php endif; ?>

      <main class="main">
        <div class="card">
          <strong>Autentikasi Berhasil!</strong> Selamat datang di area admin.
        </div>
      </main>
      <main class="main">
        <div class="row">
          <div class="card">
            <h3>Jumlah Member</h3>
            <div class="info-box">
              <p>Total Member: 30 <strong></strong></p>
            </div>
          </div>

          <div class="card card-center">
            <h3>Jumlah Pengolah Wisata</h3>
              <p>Total Pengolah Wisata : 10 <strong></strong></p>
          </div>
          <div class="card">
            <h3>Jumlah Wisata</h3>
            <div class="info-box">
              <p>Total  Wisata: 100 <strong></strong></p>
            </div>
          </div>
          <div class="card">
            <h3>Jumlah Transaksi</h3>
            <div class="info-box">
              <p>Total Transaksi: 20 <strong></strong></p>
            </div>
        </div>
      </main>
  </div>
</body>
</html>
