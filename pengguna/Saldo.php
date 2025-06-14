<?php
// Saldo.php (disertakan melalui indeks.php)
session_start();
include 'config.php';

// Ambil user_id dari session
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

$user_id = $_SESSION['user_id'];

// Ambil data user dari database
$sql = "SELECT * FROM user WHERE user_id = '$user_id'";
$query = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($query);

// Ambil total saldo dari tabel topup dengan status disetujui
$saldo_sql = "SELECT SUM(jumlah) AS total_saldo FROM topup WHERE user_id = '$user_id' AND status = 'disetujui'";
$saldo_result = mysqli_query($conn, $saldo_sql);
$saldo_data = mysqli_fetch_assoc($saldo_result);
$total_saldo = $saldo_data['total_saldo'] ?? 0;
?>

<section class="saldo-container">
  <div class="saldo-card">
    <h2>My Balance</h2>
    <p>Nama: <strong><?= $user['nama']; ?></strong></p>
    <p>Email: <?= $user['email']; ?></p>
    <p>No. Telepon: <?= $user['no_telepon']; ?></p>
    <p>Total Saldo: <strong>Rp <?= number_format($total_saldo, 0, ',', '.'); ?></strong></p>

    <a href="topUpSaldo.php" class="btn">Top Up Saldo</a>
  </div>
</section>