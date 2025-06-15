<?php
if (!isset($profile) || !is_array($profile)) {
    $profile = ['nama' => 'Guest', 'role' => 'Unknown'];
}
$page = isset($_GET['page']) ? $_GET['page'] : '';
?>

<div class="sidebar">
  <h3>Hi, Admin<br><?= htmlspecialchars($profile['nama']) ?></h3>
  <ul class="sidebar-menu">
    <li><a href="indeks.php?page=dashboardAdmin" class="<?= $page == 'dashboardAdmin' ? 'active' : '' ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
    <li><a href="indeks.php?page=accpengolah" class="<?= $page == 'accpengolah' ? 'active' : '' ?>"><i class="fas fa-user-check"></i> Owner Verification</a></li>
    <li><a href="indeks.php?page=accwisata" class="<?= $page == 'accwisata' ? 'active' : '' ?>"><i class="fas fa-home"></i> Property Verification</a></li>
    <li><a href="indeks.php?page=verifikasiTopUp" class="<?= $page == 'verifikasiTopUp' ? 'active' : '' ?>"><i class="fas fa-wallet"></i> Verifikasi Top Up</a></li>
    <li><a href="indeks.php?page=transactionVerification" class="<?= $page == 'transactionVerification' ? 'active' : '' ?>"><i class="fas fa-credit-card"></i> Transaction Verification</a></li>
    <li><a href="indeks.php?page=memberList" class="<?= $page == 'memberList' ? 'active' : '' ?>"><i class="fas fa-users"></i> Member List</a></li>
    <li><a href="indeks.php?page=logout" onclick="return confirm('Are you sure to Log Out?')"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
  </ul>
</div>
