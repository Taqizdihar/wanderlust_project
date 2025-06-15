<?php
// Pastikan file konfigurasi database Anda di-include
include "config.php";

// Memulai session jika belum ada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Mengambil variabel dari URL dan session dengan aman
$page = isset($_GET['page']) ? $_GET['page'] : '';
$ID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

// Mengambil data profil admin yang sedang login
$profile = [];
if ($ID) {
    // Sebaiknya gunakan prepared statements untuk keamanan
    $stmt = mysqli_prepare($conn, "SELECT * FROM user WHERE user_id = ?");
    mysqli_stmt_bind_param($stmt, "i", $ID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $profile = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
}

// [REKOMENDASI] Mengambil 5 anggota terbaru untuk ditampilkan di tabel
$sqlStatementMembers = "SELECT user_id, nama, email, role FROM user WHERE role IN ('wisatawan', 'pw') ORDER BY user_id DESC LIMIT 5";
$queryMembers = mysqli_query($conn, $sqlStatementMembers);
$recent_members = mysqli_fetch_all($queryMembers, MYSQLI_ASSOC);

// Menghitung total jumlah member
$sqlStatementTotalMembers = "SELECT user_id FROM user WHERE role IN ('wisatawan', 'pw')";
$queryTotalMembers = mysqli_query($conn, $sqlStatementTotalMembers);
$total_member_count = mysqli_num_rows($queryTotalMembers);

// Menghitung total jumlah lokasi/properti
$sqlStatementLokasi = "SELECT tempatwisata_id FROM tempatwisata";
$queryLokasi = mysqli_query($conn, $sqlStatementLokasi);
$lokasi_count = mysqli_num_rows($queryLokasi);

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - <?= htmlspecialchars($profile['nama'] ?? 'Admin') ?></title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    /* --- Global Reset & Basic Styling --- */
    :root {
      --bg-color: #f8f9fa;
      --panel-bg-color: #ffffff;
      --text-primary: #212529;
      --text-secondary: #6c757d;
      --border-color: #dee2e6;
      --primary-color: #0d6efd;
      --blue-light: #e9ecef;
      --green-light: #d1e7dd;
      --green-dark: #0f5132;
      --orange-light: #fff3e0;
      --orange-dark: #f57c00;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--bg-color);
      color: var(--text-primary);
      line-height: 1.6;
    }

    /* --- Layout Utama --- */
    .wrapper {
      display: flex;
    }

    /* Ganti .sidebar dengan class sidebar Anda jika berbeda */
    /* Contoh jika sidebar Anda punya class .sidebar */
    .sidebar { 
      width: 250px; 
      background-color: var(--panel-bg-color);
      flex-shrink: 0;
      border-right: 1px solid var(--border-color);
    }

    .main-container {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      height: 100vh;
      overflow: hidden;
    }

    /* --- Header Utama dengan Search & Profile --- */
    .main-header {
      background-color: var(--panel-bg-color);
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid var(--border-color);
      flex-shrink: 0;
    }

    .header-left { display: flex; align-items: center; gap: 2rem; }
    .header-left h1 { font-size: 1.75rem; font-weight: 600; }

    .search-wrapper {
      position: relative;
      width: 300px;
    }
    .search-wrapper i {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-secondary);
    }
    .search-wrapper input {
      width: 100%;
      padding: 0.75rem 1rem 0.75rem 2.5rem;
      border-radius: 25px;
      border: 1px solid var(--border-color);
      background-color: var(--bg-color);
      font-family: 'Poppins', sans-serif;
      font-size: 0.9rem;
      transition: all 0.2s ease;
    }
    .search-wrapper input:focus {
      outline: none;
      border-color: var(--primary-color);
      background-color: var(--panel-bg-color);
      box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.2);
    }

    .header-right { display: flex; align-items: center; gap: 1.5rem; }

    .icon-wrapper {
      position: relative;
      font-size: 1.25rem;
      color: var(--text-secondary);
      cursor: pointer;
    }
    .notification-dot {
      position: absolute;
      top: -2px;
      right: -3px;
      width: 8px;
      height: 8px;
      background-color: #dc3545;
      border-radius: 50%;
      border: 2px solid var(--panel-bg-color);
    }

    .profile-area {
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }
    .profile-pic {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: var(--primary-color);
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: 600;
      font-size: 1.1rem;
      text-transform: uppercase;
    }
    .profile-info { display: flex; flex-direction: column; }
    .profile-name { font-weight: 600; font-size: 0.9rem; white-space: nowrap; }
    .profile-role { font-size: 0.8rem; color: var(--text-secondary); text-transform: capitalize; }


    /* --- Konten Body --- */
    .content-body {
      flex-grow: 1;
      padding: 2rem;
      overflow-y: auto;
    }

    /* --- Kartu Statistik --- */
    .stats-row {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1.5rem;
    }
    .stat-card {
      background-color: var(--panel-bg-color);
      border: 1px solid var(--border-color);
      border-radius: 12px;
      padding: 1.5rem;
      display: flex;
      align-items: center;
      gap: 1.5rem;
      transition: all 0.2s ease-in-out;
    }
    .stat-card:hover { transform: translateY(-3px); box-shadow: 0 4px 15px rgba(0,0,0,0.05); }

    .card-icon {
      font-size: 1.5rem; width: 48px; height: 48px; border-radius: 8px;
      display: flex; justify-content: center; align-items: center;
    }
    .card-icon.members { background-color: var(--blue-light); color: var(--primary-color); }
    .card-icon.properties { background-color: var(--orange-light); color: var(--orange-dark); }
    .card-icon.transactions { background-color: #f1f1f1; color: #555; }
    .card-info h3 { font-size: 0.9rem; font-weight: 500; color: var(--text-secondary); }
    .card-info p { font-size: 1.75rem; font-weight: 600; color: var(--text-primary); }
    .card-info p.unavailable { font-size: 1rem; font-weight: 500; color: var(--text-secondary); }


    /* --- Panel & Tabel Anggota Baru --- */
    .panel {
      margin-top: 2rem;
      background-color: var(--panel-bg-color);
      border-radius: 12px;
      border: 1px solid var(--border-color);
    }
    .panel-header {
      padding: 1rem 1.5rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid var(--border-color);
    }
    .panel-header h2 { font-size: 1.1rem; font-weight: 600; }
    a.view-all {
      font-size: 0.85rem;
      font-weight: 500;
      color: var(--primary-color);
      text-decoration: none;
    }
    .table-container { overflow-x: auto; }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 1rem 1.5rem;
      text-align: left;
      border-bottom: 1px solid var(--border-color);
      white-space: nowrap;
    }
    thead th {
      font-size: 0.8rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      color: var(--text-secondary);
      font-weight: 600;
    }
    tbody tr:last-child td { border-bottom: none; }
    tbody tr:hover { background-color: #f8f9fa; }
    .role-badge {
      padding: 0.25em 0.6em;
      font-size: 0.8rem;
      font-weight: 600;
      border-radius: 25px;
      text-transform: capitalize;
    }
    .role-badge.role-pw { background-color: var(--green-light); color: var(--green-dark); }
    .role-badge.role-wisatawan { background-color: var(--blue-light); color: #0a58ca; }

    /* --- Responsif --- */
    @media (max-width: 1200px) {
      .header-left { gap: 1rem; }
      .search-wrapper { width: 220px; }
    }
    @media (max-width: 992px) {
      .main-header { flex-direction: column; align-items: flex-start; gap: 1rem; }
      .search-wrapper { width: 100%; }
      .wrapper { flex-direction: column; }
      .sidebar { width: 100%; height: auto; border-right: none; border-bottom: 1px solid var(--border-color); }
      .main-container { height: auto; }
    }
    @media (max-width: 576px) {
      .main-header, .content-body { padding: 1rem; }
      .header-left h1 { display: none; } /* Sembunyikan judul "Dashboard" di layar sangat kecil */
      .profile-info { display: none; } /* Sembunyikan nama di layar sangat kecil, hanya tampilkan foto profil */
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <?php 
      // Sertakan sidebar Anda. Pastikan path file ini benar.
      if (file_exists("viewsAdmin.php")) {
          include "viewsAdmin.php";
      }
    ?>

    <div class="main-container">
      <header class="main-header">
        <div class="header-left">
          <h1>Dashboard</h1>
          <div class="search-wrapper">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Cari properti, member...">
          </div>
        </div>
        <div class="header-right">
          <div class="icon-wrapper">
            <i class="fas fa-bell"></i>
            <span class="notification-dot"></span>
          </div>
          <div class="profile-area">
            <div class="profile-pic">
              <?= strtoupper(substr($profile['nama'] ?? 'A', 0, 1)) ?>
            </div>
            <div class="profile-info">
              <span class="profile-name"><?= htmlspecialchars($profile['nama'] ?? 'Admin') ?></span>
              <span class="profile-role"><?= htmlspecialchars($profile['role'] ?? 'Administrator') ?></span>
            </div>
          </div>
        </div>
      </header>

      <main class="content-body">
        <div class="stats-row">
          <div class="stat-card">
            <div class="card-icon members"><i class="fas fa-users"></i></div>
            <div class="card-info"><h3>Total Members</h3><p><?= $total_member_count ?></p></div>
          </div>
          <div class="stat-card">
            <div class="card-icon properties"><i class="fas fa-map-location-dot"></i></div>
            <div class="card-info"><h3>Total Properties</h3><p><?= $lokasi_count ?></p></div>
          </div>
          <div class="stat-card">
            <div class="card-icon transactions"><i class="fas fa-money-bill-transfer"></i></div>
            <div class="card-info"><h3>Transactions</h3><p class="unavailable">Unavailable</p></div>
          </div>
        </div>

        <div class="panel">
          <div class="panel-header">
            <h2>Anggota Baru</h2>
            <a href="#" class="view-all">Lihat Semua</a>
          </div>
          <div class="table-container">
            <table>
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Role</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($recent_members)): ?>
                  <?php foreach ($recent_members as $member): ?>
                    <tr>
                      <td><?= htmlspecialchars($member['nama']) ?></td>
                      <td><?= htmlspecialchars($member['email']) ?></td>
                      <td>
                        <span class="role-badge role-<?= htmlspecialchars($member['role']) ?>">
                          <?= htmlspecialchars($member['role']) ?>
                        </span>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="3" style="text-align: center; padding: 2rem;">Tidak ada data anggota baru.</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>
  </div>
</body>
</html>