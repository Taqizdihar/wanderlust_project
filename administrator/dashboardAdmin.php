<?php
// administrator/dashboardAdmin.php
// File ini akan memiliki sidebar dan struktur dashboard penuh

include "config.php";

// Pastikan session_start() sudah dipanggil di indeks.php atau di sini jika file ini diakses langsung
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$ID = $_SESSION['user_id'] ?? 0;

$profile = [];
if ($ID) {
    $stmt = mysqli_prepare($conn, "SELECT * FROM user WHERE user_id = ?");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $ID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $profile = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
    } else {
        error_log("Failed to prepare statement for user profile: " . mysqli_error($conn));
    }
} else {
    $profile = [
        'nama' => 'Guest',
        'role' => 'Guest',
        'profile_pic_url' => 'https://via.placeholder.com/45/cccccc/ffffff?text=U'
    ];
}

// Query data dashboard
$sqlStatement = "SELECT user_id, nama, email, role FROM user WHERE role IN ('wisatawan', 'pw') ORDER BY user_id DESC LIMIT 5";
$query = mysqli_query($conn, $sqlStatement);
$recent_members = $query ? mysqli_fetch_all($query, MYSQLI_ASSOC) : [];

$sqlStatement = "SELECT user_id FROM user WHERE role IN ('wisatawan', 'pw')";
$query = mysqli_query($conn, $sqlStatement);
$total_members = $query ? mysqli_num_rows($query) : 0;

$sqlStatement = "SELECT tempatwisata_id FROM tempatwisata";
$query = mysqli_query($conn, $sqlStatement);
$total_properties = $query ? mysqli_num_rows($query) : 0;

$sqlPending = mysqli_query($conn, "SELECT COUNT(*) AS jumlah FROM topup WHERE status = 'menunggu'");
$pendingTopup = $sqlPending ? mysqli_fetch_assoc($sqlPending)['jumlah'] : 0;
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Admin</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

  <style>
    /* Basic Reset & Variables */
    *, *::before, *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    :root {
      --primary-color: #1e4db7;
      --secondary-color: #163c94;
      --accent-color: #4CAF50;
      --background-light: #f4f6f9;
      --card-background: #fff;
      --text-dark: #333;
      --text-medium: #666;
      --text-light: #999;
      --border-color: #e5e5e5;
      --shadow-light: 0 4px 12px rgba(0,0,0,0.08);
      --success-color: #28a745;
      --info-color: #007bff;
      --alert-success-bg: #d4edda;
      --alert-success-text: #155724;
      --alert-success-border: #c3e6cb;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: var(--background-light);
      line-height: 1.6;
      color: var(--text-dark);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* Dashboard Layout */
    .dashboard-container {
      display: flex;
      flex: 1;
      min-height: 100vh;
    }

    /* Sidebar Specific Styles */
    .sidebar {
      width: 280px;
      background: var(--primary-color);
      color: #fff;
      padding: 2rem 0;
      flex-shrink: 0;
      box-shadow: 2px 0 10px rgba(0,0,0,0.2);
      display: flex;
      flex-direction: column;
      position: relative;
      z-index: 1050;
      transition: transform 0.3s ease-in-out;
    }
    @media (max-width: 768px) {
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            transform: translateX(-100%);
            width: 260px;
        }
        .sidebar.active {
            transform: translateX(0);
        }
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1040;
            display: none;
        }
        .sidebar.active + .sidebar-overlay {
            display: block;
        }
    }

    .sidebar-header {
      padding: 0 2rem 2rem;
      border-bottom: 1px solid rgba(255,255,255,0.2);
      margin-bottom: 1.5rem;
      color: rgba(255,255,255,0.95);
      text-align: left;
    }
    .sidebar-header h2 {
      font-size: 1.35rem;
      font-weight: 700;
      margin: 0;
      line-height: 1.3;
    }
    .sidebar-nav-container {
      flex: 1;
      overflow-y: auto;
      padding-right: 15px;
      padding-bottom: 2rem;
    }
    .sidebar-nav-container > nav > ul {
        list-style: none;
        padding: 0 1.5rem;
        margin: 0;
    }
    .sidebar-nav-container > nav > ul > li {
        margin-bottom: 0.75rem;
    }
    .sidebar-nav-container > nav > ul > li > a {
        display: flex;
        align-items: center;
        padding: 1rem 1.25rem;
        color: rgba(255,255,255,0.9);
        text-decoration: none;
        border-radius: 10px;
        transition: background 0.3s ease, transform 0.2s ease, color 0.3s ease;
        font-weight: 500;
        font-size: 1rem;
        gap: 1rem;
        white-space: nowrap;
    }
    .sidebar-nav-container > nav > ul > li > a i {
        font-size: 1.25rem;
        color: rgba(255,255,255,0.7);
        transition: color 0.3s ease;
    }
    .sidebar-nav-container > nav > ul > li > a:hover {
        background-color: rgba(255,255,255,0.1);
        transform: translateX(8px);
        color: #fff;
    }
    .sidebar-nav-container > nav > ul > li > a:hover i {
        color: #fff;
    }
    .sidebar-nav-container > nav > ul > li > a.active {
        background-color: var(--secondary-color);
        font-weight: 600;
        box-shadow: inset 5px 0 0 var(--accent-color);
        color: #fff;
    }
    .sidebar-nav-container > nav > ul > li > a.active i {
        color: var(--accent-color);
    }

    /* Main Content Area */
    .main-content {
      flex: 1;
      display: flex;
      flex-direction: column;
      background: var(--background-light);
    }

    /* Main Header (Navbar) */
    .main-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 2.5rem;
      background-color: var(--card-background);
      border-bottom: 1px solid var(--border-color);
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
      z-index: 1000;
      flex-wrap: wrap;
      gap: 1rem;
    }
    .header-left {
      display: flex;
      align-items: center;
      gap: 2rem;
      flex-wrap: wrap;
    }
    .header-left h1 {
      font-size: 1.6rem;
      font-weight: 700;
      color: var(--text-dark);
      margin: 0;
    }
    .menu-toggle {
        display: none;
        background: none;
        border: none;
        font-size: 1.6rem;
        color: var(--primary-color);
        cursor: pointer;
        margin-right: 1rem;
    }
    @media (max-width: 768px) {
        .menu-toggle { display: block; }
        .header-left { order: 1; flex-grow: 0; justify-content: flex-start; }
        .header-left h1 { font-size: 1.4rem; margin-left: 0.5rem; }
        .search-bar { order: 3; width: 100%; margin-top: 0.8rem; }
        .header-right { order: 2; width: auto; justify-content: flex-end; margin-left: auto; }
    }
    .search-bar {
      display: flex;
      align-items: center;
      background-color: #f0f2f5;
      border-radius: 25px;
      padding: 0.7rem 1.2rem;
      width: 300px;
      max-width: 100%;
      box-shadow: inset 0 1px 4px rgba(0,0,0,0.08);
    }
    .search-bar i {
      color: var(--text-light);
      margin-right: 0.75rem;
      font-size: 1rem;
    }
    .search-bar input {
      border: none;
      background: transparent;
      outline: none;
      font-size: 0.95rem;
      flex-grow: 1;
      color: var(--text-dark);
    }
    .header-right {
      display: flex;
      align-items: center;
      gap: 1.8rem;
    }
    .icon-button {
      background: none;
      border: none;
      font-size: 1.4rem;
      color: var(--text-medium);
      cursor: pointer;
      position: relative;
      transition: color 0.3s ease;
    }
    .icon-button:hover { color: var(--primary-color); }
    .notif-dot {
      position: absolute; top: -3px; right: -3px;
      background: #e74c3c; border-radius: 50%;
      width: 10px; height: 10px; border: 2px solid var(--card-background);
    }
    .profile-box {
      display: flex; align-items: center; gap: 0.8rem;
      cursor: pointer; padding: 0.5rem 1rem; border-radius: 25px;
      background: #f0f2f5; transition: background 0.3s ease;
    }
    .profile-box:hover { background: #e0e2e5; }
    .profile-icon {
      width: 45px; height: 45px; border-radius: 50%;
      object-fit: cover; border: 3px solid var(--primary-color);
      box-shadow: 0 0 0 3px rgba(30, 77, 183, 0.2);
    }
    .profile-info { display: flex; flex-direction: column; line-height: 1.2; }
    .profile-name { font-weight: 600; font-size: 1rem; color: var(--text-dark); }
    .profile-role { font-size: 0.85rem; color: var(--text-medium); }

    /* Main Dashboard Content */
    .main {
      padding: 2.5rem;
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 2rem;
    }
    .alert-card {
      background: var(--alert-success-bg); color: var(--alert-success-text);
      border: 1px solid var(--alert-success-border); border-radius: 10px;
      padding: 1rem 1.5rem; font-weight: 500; display: flex;
      align-items: center; gap: 1rem; box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }
    .alert-card i { font-size: 1.3rem; color: var(--alert-success-text); }
    .row {
      display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 2rem;
    }
    .card {
      background: var(--card-background); border-radius: 15px;
      padding: 2rem; box-shadow: var(--shadow-light); display: flex;
      flex-direction: column; align-items: flex-start;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      position: relative; overflow: hidden;
    }
    .card::before {
      content: ''; position: absolute; top: 0; left: 0;
      width: 100%; height: 6px; background: var(--primary-color);
      transform: scaleX(0); transform-origin: left; transition: transform 0.3s ease-out;
    }
    .card:hover::before { transform: scaleX(1); }
    .card:hover { transform: translateY(-7px); box-shadow: 0 8px 20px rgba(0,0,0,0.15); }
    .card h3 { font-size: 1.15rem; color: var(--text-medium); margin-bottom: 0.5rem; font-weight: 500; }
    .card p { font-size: 2.4rem; font-weight: 700; color: var(--text-dark); margin: 0.5rem 0 1.2rem; }
    .card a {
      font-size: 1rem; color: var(--primary-color); text-decoration: none;
      font-weight: 600; display: flex; align-items: center; gap: 0.5rem;
      transition: color 0.3s ease, transform 0.2s ease;
    }
    .card a:hover { color: var(--secondary-color); transform: translateX(3px); }
    .card a i { font-size: 0.9em; }

    /* Panel for Tables */
    .panel {
      background: var(--card-background); border-radius: 15px;
      padding: 1.5rem 2rem; box-shadow: var(--shadow-light);
    }
    .panel h2 {
      font-size: 1.5rem; margin-bottom: 1.5rem; color: var(--text-dark);
      font-weight: 600; border-bottom: 1px solid var(--border-color); padding-bottom: 1rem;
    }
    table { width: 100%; border-collapse: separate; border-spacing: 0 12px; }
    th, td { padding: 1rem 1.2rem; text-align: left; font-size: 0.95rem; vertical-align: middle; }
    thead th {
      text-transform: uppercase; color: var(--text-light); font-size: 0.8rem;
      font-weight: 600; background-color: #f8f9fa; border-bottom: 2px solid var(--border-color);
      border-top: 2px solid var(--border-color);
    }
    tbody tr {
      background-color: var(--card-background);
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 2px 4px rgba(0,0,0,0.03); border-radius: 8px; overflow: hidden;
    }
    tbody tr:hover { background-color: #f0f2f5; box-shadow: 0 4px 8px rgba(0,0,0,0.06); }
    tbody tr:first-child { margin-top: 0; }
    tbody tr:last-child { border-bottom: none; }
    .role-badge {
      padding: 0.45rem 0.9rem; border-radius: 25px; font-size: 0.85rem;
      font-weight: 600; display: inline-block; text-transform: capitalize;
      min-width: 90px; text-align: center; letter-spacing: 0.5px;
    }
    .role-wisatawan { background-color: var(--info-color); color: #fff; }
    .role-pw { background-color: var(--success-color); color: #fff; }
    .status-badge {
        padding: 0.45rem 0.9rem; border-radius: 25px; font-size: 0.85rem;
        font-weight: 600; display: inline-block; text-transform: capitalize;
        min-width: 90px; text-align: center; letter-spacing: 0.5px; color: white;
    }
    .status-review { background-color: #ffc107; color: #333; }
    .status-approved { background-color: rgb(30, 165, 27); }
    .status-rejected { background-color: rgb(177, 35, 35); }
    .status-unknown { background-color: #6c757d; }
    .button-review {
        background-color: var(--primary-color); color: white;
        padding: 8px 12px; border-radius: 5px; text-decoration: none;
        font-size: 0.9em; transition: background-color 0.3s ease;
    }
    .button-review:hover { background-color: var(--secondary-color); }
    .feedback-message { margin-bottom: 20px; }
    .no-scroll { overflow: hidden; }
  </style>
</head>
<body>
  <div class="dashboard-container">
    <div class="sidebar">
      <div class="sidebar-header">
        <h2>Hi, Admin<br><?= htmlspecialchars($profile['nama'] ?? 'Riska Dea Bakri') ?></h2>
      </div>
      <div class="sidebar-nav-container">
        <?php include "viewsAdmin.php"; ?>
      </div>
    </div>

    <div class="sidebar-overlay" onclick="toggleSidebar()"></div>

    <div class="main-content">
      <header class="main-header">
        <div class="header-left">
          <button class="menu-toggle" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
          </button>
          <h1>Dashboard</h1>
        </div>
        <div class="search-bar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search..." />
        </div>
        <div class="header-right">
          <button class="icon-button">
            <i class="fas fa-bell"></i>
            <span class="notif-dot"></span>
          </button>
          <div class="profile-box">
            <img src="<?= htmlspecialchars($profile['profile_pic_url'] ?? 'https://via.placeholder.com/45/007bff/ffffff?text=AD') ?>" alt="Profile" class="profile-icon"/>
            <div class="profile-info">
              <div class="profile-name"><?= htmlspecialchars($profile['nama'] ?? 'Riska Dea Bakri') ?></div>
              <div class="profile-role"><?= htmlspecialchars($profile['role'] ?? 'Admin') ?></div>
            </div>
          </div>
        </div>
      </header>

      <main class="main">
        <div class="alert-card">
          <i class="fas fa-check-circle"></i>
          <strong>Autentikasi Berhasil!</strong> Selamat datang di area admin.
        </div>

        <div class="row">
          <div class="card">
            <h3>Total Members</h3>
            <p><?= $total_members ?></p>
          </div>
          <div class="card">
            <h3>Total Properties</h3>
            <p><?= $total_properties ?></p>
          </div>
          <div class="card">
            <h3>Verifikasi Top Up</h3>
            <p><?= $pendingTopup ?> permintaan</p>
            <a href="indeks.php?page=verifikasiTopUp">
              Kelola <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="panel">
          <h2>Anggota Baru</h2>
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
                <?php foreach ($recent_members as $user): ?>
                <tr>
                  <td><?= htmlspecialchars($user['nama']) ?></td>
                  <td><?= htmlspecialchars($user['email']) ?></td>
                  <td>
                    <span class="role-badge role-<?= htmlspecialchars($user['role']) ?>">
                      <?= htmlspecialchars($user['role']) ?>
                    </span>
                  </td>
                </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr><td colspan="3" style="text-align:center; padding: 20px; color: var(--text-medium);">Belum ada anggota baru yang terdaftar.</td></tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

  <script>
    function toggleSidebar() {
      const sidebar = document.querySelector('.sidebar');
      const overlay = document.querySelector('.sidebar-overlay');
      const body = document.body;

      sidebar.classList.toggle('active');
      overlay.classList.toggle('active');
      body.classList.toggle('no-scroll');
    }

    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const currentPage = urlParams.get('page');
        const headerTitle = document.querySelector('.main-header h1');

        const pageTitles = {
            'dashboardAdmin': 'Dashboard',
            'accpengolah': 'Owner Verification',
            'accwisata': 'Property Verification',
            'verifikasiTopUp': 'Verifikasi Top Up',
            'transactionVerification': 'Transaction Verification',
            'memberList': 'Member List',
        };

        const sidebarLinks = document.querySelectorAll('.sidebar-nav-container a');
        sidebarLinks.forEach(link => {
            link.classList.remove('active');
        });

        if (currentPage) {
            const activeLink = document.querySelector(`.sidebar-nav-container a[href*="page=${currentPage}"]`);
            if (activeLink) {
                activeLink.classList.add('active');
            }
            if (pageTitles[currentPage]) {
                headerTitle.textContent = pageTitles[currentPage];
            } else {
                headerTitle.textContent = currentPage.replace(/([A-Z])/g, ' $1').replace(/^./, str => str.toUpperCase());
            }
        } else {
            const dashboardLink = document.querySelector('.sidebar-nav-container a[href*="page=dashboardAdmin"]');
            if (dashboardLink) {
                dashboardLink.classList.add('active');
                headerTitle.textContent = 'Dashboard';
            } else {
                const firstLink = document.querySelector('.sidebar-nav-container a');
                if (firstLink) {
                    firstLink.classList.add('active');
                    headerTitle.textContent = 'Dashboard';
                }
            }
        }
    });
  </script>
</body>
</html>


  </script>
</body>
</html>