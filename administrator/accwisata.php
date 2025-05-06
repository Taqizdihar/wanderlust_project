<?php
include 'config.php';

$ID = $_SESSION['user_id'];
$sqlStatement1 = "SELECT * FROM user WHERE user_id='$ID'";
$query1 = mysqli_query($conn, $sqlStatement1);
$profile = mysqli_fetch_assoc($query1);

if (isset($_GET['aksi'], $_GET['id'])) {
  $id = $_GET['id'];
  $aksi = $_GET['aksi'];
  $message = "";

  if ($aksi === 'acc') {
    $message = "✅ Wisata ID $id diterima.";
  } else if ($aksi === 'tolak') {
    $message = "❌ Wisata ID $id ditolak.";
  }

  // Set feedback message
  $feedback = $message;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Verifikasi Tempat Wisata</title>
  <link rel="stylesheet" href="administrator/cssAdmin/accwisata.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="wrapper">
    <?php include "viewsAdmin.php";?>
    <main class="main">
      <div class="card">
        <h2>Pengajuan Wisata</h2>

        <?php if (isset($feedback)): ?>
          <div class="feedback"><?= $feedback ?></div>
        <?php endif; ?>

        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Wisata</th>
              <th>Lokasi</th>
              <th>Pengaju</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach (): ?>
              <tr>
                <td><?= $data['id'] ?></td>
                <td><?= $data['nama_wisata'] ?></td>
                <td><?= $data['lokasi'] ?></td>
                <td><?= $data['pengaju'] ?></td>
                <td>
                  <a href="?page=acc_wisata&aksi=acc&id=<?= $data['id'] ?>" class="acc-btn">ACC</a>
                  <a href="?page=acc_wisata&aksi=tolak&id=<?= $data['id'] ?>" class="tolak-btn">Tolak</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>

</html>