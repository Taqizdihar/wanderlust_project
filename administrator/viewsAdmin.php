<?php
if (!isset($profile) || !is_array($profile)) {
    $profile = ['nama' => 'Guest', 'role' => 'Unknown'];
}
?>

<!-- SIDEBAR & STYLE -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<style>
    body {
        margin: 0;
        font-family: 'Segoe UI', sans-serif;
        background-color: #f5f7fa;
    }

    .sidebar {
        height: 100vh;
        width: 250px;
        position: fixed;
        left: 0;
        top: 0;
        background-color: #1e4db7;
        color: white;
        display: flex;
        flex-direction: column;
        padding: 20px 0;
        box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        z-index: 999;
    }

    .sidebar-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .sidebar-header p {
        margin: 0;
        font-size: 16px;
    }

    .sidebar-header strong {
        font-size: 20px;
    }

    .sidebar-menu {
        list-style-type: none;
        padding: 0;
        margin: 0;
        flex-grow: 1;
    }

    .sidebar-menu li {
        margin: 5px 0;
    }

    .sidebar-menu li a {
        display: flex;
        align-items: center;
        gap: 10px;
        color: white;
        text-decoration: none;
        padding: 12px 20px;
        font-weight: 500;
        transition: background-color 0.2s ease-in-out;
    }

    .sidebar-menu li a:hover {
        background-color: #163a8a;
        border-left: 4px solid #fff;
        padding-left: 16px;
    }

    .main-content {
        margin-left: 250px;
        padding: 30px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    table th, table td {
        padding: 12px 15px;
        border: 1px solid #ddd;
        text-align: left;
    }

    table th {
        background-color: #f0f0f0;
    }

    table tr:hover {
        background-color: #f9f9f9;
    }
</style>

<div class="sidebar">
    <div class="sidebar-header">
        <p>Hi, Admin<br><strong><?= htmlspecialchars($profile['nama']) ?></strong></p>
    </div>
    <ul class="sidebar-menu">
        <li><a href="indeks.php?page=dashboardAdmin"><i class="fas fa-globe"></i> Dashboard</a></li>
        <li><a href="indeks.php?page=accpengolah"><i class="fas fa-user-check"></i> Owner Verification</a></li>
        <li><a href="indeks.php?page=accwisata"><i class="fas fa-home"></i> Property Verification</a></li>
        <li><a href="indeks.php?page=verifikasiTopUp"><i class="fas fa-wallet"></i> Verifikasi Top Up</a></li>
        <li><a href="indeks.php?page=transactionVerification"><i class="fas fa-file-invoice-dollar"></i> Transaction Verification</a></li>
        <li><a href="indeks.php?page=memberlist"><i class="fas fa-users"></i> Member List</a></li>
        <li><a href="indeks.php?page=logout" onclick="return confirm('Are you sure to Log Out?')"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
</div>
