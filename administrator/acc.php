<?php
include "config.php";
$IDPW = $_GET['id'];
$ID = $_SESSION['user_id'];
$sqlStatement1 = "SELECT * FROM user WHERE user_id='$ID'";
$query1 = mysqli_query($conn, $sqlStatement1);
$profile = mysqli_fetch_assoc($query1);

$sqlStatement2 = "SELECT * FROM user WHERE user_id='$IDPW'";
$query2 = mysqli_query($conn, $sqlStatement2);
$allPW = mysqli_fetch_assoc($query2);

$sqlStatement3 = "SELECT * FROM pemilikwisata WHERE pw_id='$IDPW'";
$query3 = mysqli_query($conn, $sqlStatement3);
$PWProfile = mysqli_fetch_assoc($query3);

$feedback = "";

if ($page === 'acc' && isset($_GET['aksi']) && isset($_GET['id'])) {
  $id = $_GET['id'];
  $aksi = $_GET['aksi'];
  $feedback = $aksi === 'acc' ? "✅ Pengajuan Pengolah ID $id diterima." : "❌ Pengajuan Pengolah ID $id ditolak.";
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Identitas Pemilik Wisata</title>
  <link rel="stylesheet" href="administrator/cssAdmin/acc.css">
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

      <div class="card">
        <h2>Pengajuan Identitas</h2>
        <div class="profile-info">
          <h2 class="name"><?= $allPW['nama']?></h2>

            <?php
                if ($PWProfile['entity_approval'] == 'review') {
            ?>
                <div class="status" id="review">Status : <?= $PWProfile['entity_approval']?></div>
            <?php
                } else if ($PWProfile['entity_approval'] == 'approved') {
            ?>
                <div class="status" id="approved">Status : <?= $PWProfile['entity_approval']?></div>
            <?php
                } else if ($PWProfile['entity_approval'] == 'rejected') {
            ?>
                <div class="status" id="rejected">Status : <?= $PWProfile['entity_approval']?></div>
            <?php
                }
            ?>

          <div class="info-grid">
              <div class="info-left">
              <p>Email</p>
              <div class="value-box"><?= $allPW['email']?></div>

              <p>Phone</p>
              <div class="value-box"><?= $allPW['phonenumber']?></div>
              </div>

              <div class="info-right">
              <p>Legal Tax Document</p>
              <a href="pengelolaWisata/photos/<?= $PWProfile['tax_document']?>" target="_blank" class="doc-btn">See Document <i class="fa-solid fa-arrow-up-right-from-square"></i></a>

              <p>Legal Business Document</p>
              <a href="pengelolaWisata/photos/<?= $PWProfile['legal_business_document']?>" target="_blank" class="doc-btn">See Document <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
              </div>
          </div>
          <div class="address">
              <p>Address</p>
              <div class="value-box"><?= $PWProfile['legal_document_address']?></div>
          </div>

          <div class="buttons">
            <a href="indeks.php?page=pengolahStatus&idpw=<?= $allPW['user_id']?>&status=approved" class="edit-btn" id="approve" onclick="return confirm('Are you sure you want to approve <?= $allPW['nama']?>?')">Approve</a>
            <a href="indeks.php?page=pengolahStatus&idpw=<?= $allPW['user_id']?>&status=rejected" class="edit-btn" id="rejected" onclick="return confirm('Are you sure you want to reject <?= $allPW['nama']?>?')">Reject</a>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
