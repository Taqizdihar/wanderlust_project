<?php
// viewsAdmin.php
// Variabel $profile diasumsikan sudah didefinisikan dari file yang meng-include ini (indeks.php)
if (!isset($profile) || !is_array($profile)) {
    $profile = ['nama' => 'Guest', 'role' => 'Unknown'];
}
?>
<nav>
    <ul>
        <li><a href="indeks.php?page=dashboardAdmin"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="indeks.php?page=accpengolah"><i class="fas fa-user-check"></i> Owner Verification</a></li>
        <li><a href="indeks.php?page=accwisata"><i class="fas fa-home"></i> Property Verification</a></li>
        <li><a href="indeks.php?page=verifikasiTopUp"><i class="fas fa-wallet"></i> Verifikasi Top Up</a></li>
        <li><a href="indeks.php?page=transactionVerification"><i class="fas fa-credit-card"></i> Transaction Verification</a></li>
        <li><a href="indeks.php?page=memberList"><i class="fas fa-users"></i> Member List</a></li>
        <li><a href="indeks.php?page=logout" onclick="return confirm('Are you sure to Log Out?')"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
    </ul>
</nav>