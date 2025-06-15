<?php
include "config.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$page = isset($_GET['page']) ? $_GET['page'] : '';
$ID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

$profile = [];
if ($ID) {
    $sqlStatementProfile = "SELECT * FROM user WHERE user_id='$ID'";
    $queryProfile = mysqli_query($conn, $sqlStatementProfile);
    $profile = mysqli_fetch_assoc($queryProfile);
}

// [REKOMENDASI] Query diubah untuk mengambil data lebih lengkap untuk tabel Anggota Baru
// Mengambil 5 anggota terbaru berdasarkan user_id.
$sqlStatementMembers = "SELECT user_id, nama, email, role FROM user WHERE role IN ('wisatawan', 'pw') ORDER BY user_id DESC LIMIT 5";
$queryMembers = mysqli_query($conn, $sqlStatementMembers);
$recent_members = mysqli_fetch_all($queryMembers, MYSQLI_ASSOC);

// Query untuk total member (tetap dibutuhkan untuk hitungan total)
$sqlStatementTotalMembers = "SELECT user_id FROM user WHERE role IN ('wisatawan', 'pw')";
$queryTotalMembers = mysqli_query($conn, $sqlStatementTotalMembers);
$total_member_count = mysqli_num_rows($queryTotalMembers);

$sqlStatementLokasi = "SELECT tempatwisata_id FROM tempatwisata";
$queryLokasi = mysqli_query($conn, $sqlStatementLokasi);
$lokasi_count = mysqli_num_rows($queryLokasi);

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin Pro</title>
  <link rel="stylesheet" href="administrator/cssAdmin/dashboardAdmin.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div class="wrapper">
    <?php 
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
              <span><?= strtoupper(substr($profile['nama'] ?? 'A', 0, 1)) ?></span>
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
                    <td colspan="3">Tidak ada data anggota baru.</td>
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