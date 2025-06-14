<?php
include 'config.php';

$ID = $_SESSION['user_id'];
$sqlStatement1 = "SELECT * FROM user WHERE user_id='$ID'";
$query1 = mysqli_query($conn, $sqlStatement1);
$profile = mysqli_fetch_assoc($query1);

$sqlStatement2 = "SELECT user.*, pemilikwisata.status FROM user 
                  JOIN pemilikwisata ON user.user_id = pemilikwisata.pw_id WHERE user.role = 'pw'";
$query2 = mysqli_query($conn, $sqlStatement2);
$allPW = mysqli_fetch_all($query2, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Owner List</title>
  <link rel="stylesheet" href="administrator/cssAdmin/accpengolah.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div class="wrapper">
    <?php include "viewsAdmin.php";?>
    <div class="card">
      <h2>Property Owner Verification List</h2>
      <?php if (isset($feedback)): ?>
        <div class="feedback"><?= $feedback ?></div>
      <?php endif; ?>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Status</th>
            <th rowspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($allPW as $dataPW):?>
            <tr>
              <td><?= $dataPW['user_id'] ?></td>
              <td><?= $dataPW['nama'] ?></td>
              <td><?= $dataPW['email'] ?></td>
              <td><?= $dataPW['no_telepon'] ?></td>
              <?php if ($dataPW['status'] == 'review'): ?>
                <td><p id="status" style="background-color: #949494;"><?= $dataPW['status']?></p></td>

              <?php elseif ($dataPW['status'] == 'approved'): ?>
                <td><p id="status" style="background-color:rgb(30, 165, 27);"><?= $dataPW['status']?></p></td>

              <?php elseif ($dataPW['status'] == 'rejected'): ?>
                <td><p id="status" style="background-color:rgb(177, 35, 35);"><?= $dataPW['status']?></p></td>
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
