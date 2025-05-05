<?php
include 'config.php';

$ID = $_SESSION['user_id'];
$sqlStatement1 = "SELECT * FROM user WHERE user_id='$ID'";
$query1 = mysqli_query($conn, $sqlStatement1);
$profile = mysqli_fetch_assoc($query1);

$sqlStatement2 = "SELECT * FROM user WHERE role='pw'";
$query2 = mysqli_query($conn, $sqlStatement2);
$allPW = mysqli_fetch_all($query2, MYSQLI_ASSOC);

$sqlStatement3 = "SELECT * FROM pemilikwisata";
$query3 = mysqli_query($conn, $sqlStatement3);
$PWProfile = mysqli_fetch_assoc($query3);

if (isset($_GET['aksi'], $_GET['id'])) {
    $id = $_GET['id'];
    $aksi = $_GET['aksi'];
    $message = "";

    if ($aksi === 'acc') {
        $message = "✅ Pengajuan Pengolah Wisata ID $id diterima.";
    } else if ($aksi === 'tolak') {
        $message = "❌ Pengajuan Pengolah Wisata ID $id ditolak.";
    }

    $feedback = $message;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verifikasi Identitas</title>
  <link rel="stylesheet" href="administrator/cssAdmin/accpengolah.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div class="wrapper">
    <?php include "viewsAdmin.php";?>
    <div class="card">
      <h2>Verifikasi Pemilik Tempat Wisata</h2>
      <?php if (isset($feedback)): ?>
        <div class="feedback"><?= $feedback ?></div>
      <?php endif; ?>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Status</th>
            <th rowspan="2">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($allPW as $dataPW): ?>
            <tr>
              <td><?= $dataPW['user_id'] ?></td>
              <td><?= $dataPW['nama'] ?></td>
              <td><?= $dataPW['email'] ?></td>
              <td><?= $dataPW['phonenumber'] ?></td>
              <?php if ($PWProfile['entity_approval'] == 'review'): ?>
                <td><p id="status" style="background-color: #949494;"><?= $PWProfile['entity_approval']?></p></td>

              <?php elseif ($PWProfile['entity_approval'] == 'approved'): ?>
                <td><p id="status" style="background-color:rgb(30, 165, 27);"><?= $PWProfile['entity_approval']?></p></td>

              <?php elseif ($PWProfile['entity_approval'] == 'rejected'): ?>
                <td><p id="status" style="background-color:rgb(177, 35, 35);"><?= $PWProfile['entity_approval']?></p></td>
              <?php endif; ?>
              <td>
                <a href="indeks.php?page=acc&id=<?= $dataPW['user_id'] ?>" class="acc-btn">Review</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
