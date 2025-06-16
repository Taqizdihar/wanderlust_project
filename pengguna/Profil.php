<?php
include "config.php";

$ID = $_SESSION['user_id'] ?? null;

$sqlUser = "SELECT * FROM user WHERE user_id = '$ID'";
$queryUser = mysqli_query($conn, $sqlUser);
$profil = mysqli_fetch_assoc($queryUser);

$sqlTransaksi = "SELECT COUNT(transaksi_id) AS total_visit, SUM(total_harga) AS total_pembayaran FROM transaksi WHERE wisatawan_id = '$ID'";
$queryTransaksi = mysqli_query($conn, $sqlTransaksi);
$transaksi = mysqli_fetch_assoc($queryTransaksi);
$totalPembayaran = $transaksi['total_pembayaran'];
$totalVisit = $transaksi['total_visit'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My profile</title>
  <link rel="stylesheet" href="pengguna/cssPengguna/Profil.css">
</head>
<body>

  <?php include "pengguna/Header.php";?>

  <main class="profile-container">
    <aside class="sidebar">
      <img src="pengguna/foto/<?= $profil['foto_profil'];?>" class="profile-pic" alt="Profile Picture">
      <ul class="menu-options">
        <li><a href="indeks.php?page=Saldo">My Balance</a></li>
        <li><a href="indeks.php?page=riwayatReservasi">My Tickets</a></li>
        <li><a href="indeks.php?page=Favorit">My Bookmark</a></li>
        <li><a href="indeks.php?page=logout" onclick="return confirm('Are you sure to Log Out?')">Log Out</a></li>
      </ul>
    </aside>

    <section class="profile-card">
      <h2><?= $profil['nama'];?></h2>

      <div class="stats">
        <div class="stat-box">
          <p>Total Visit</p>
          <strong><?= $totalVisit?></strong>
        </div>
        <div class="stat-box">
          <p>Total Payment</p>
          <strong><?= $totalPembayaran;?></strong>
        </div>
      </div>

      <table class="user-info bordered-table">
        <tr>
          <td>Email</td>
          <td><?= $profil['email'];?></td>
        </tr>
        <tr>
          <td>Telephone</td>
          <td><?= $profil['no_telepon'];?></td>
        </tr>
        <tr>
          <td>Gender</td>
          <td><?= $profil['gender'];?></td>
        </tr>
        <tr>
          <td>Birthdate</td>
          <td><?= $profil['tanggal_lahir'];?></td>
        </tr>
      </table>

      <div class="action-buttons">
        <button class="btn favorite"><a href="indeks.php?page=editProfil">Edit Profile</a> </button>
      </div>
    </section>
  </main>

  <?php include "pengguna/Footer.php";?>

</body>
</html>