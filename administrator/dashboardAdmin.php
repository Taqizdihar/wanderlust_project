<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// config.php harus ada di direktori yang sama atau path yang benar
include "config.php";


// Memulai session jika belum ada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Mengambil parameter 'page' dari URL atau default ke string kosong
$page = $_GET['page'] ?? '';

// Mengambil user_id dari session, default ke 0 jika tidak ada
$ID = $_SESSION['user_id'] ?? 0;

$profile = [];
if ($ID) {
    // Menggunakan prepared statement untuk keamanan
    $stmt = mysqli_prepare($conn, "SELECT * FROM user WHERE user_id = ?");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $ID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $profile = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
    } else {
        // Handle error jika prepared statement gagal
        error_log("Failed to prepare statement for user profile: " . mysqli_error($conn));
    }
} else {
    // Default profile data jika user belum login atau ID tidak ditemukan
    $profile = [
        'nama' => 'Guest',
        'role' => 'Guest',
        'profile_pic_url' => 'https://via.placeholder.com/45/cccccc/ffffff?text=U' // Default avatar for guest
    ];
}


// Query untuk anggota baru
$sqlStatement = "SELECT user_id, nama, email, role FROM user WHERE role IN ('wisatawan', 'pw') ORDER BY user_id DESC LIMIT 5";
$query = mysqli_query($conn, $sqlStatement);
$recent_members = [];
if ($query) {
    $recent_members = mysqli_fetch_all($query, MYSQLI_ASSOC);
} else {
    error_log("Error fetching recent members: " . mysqli_error($conn));
}


// Query untuk total members
$sqlStatement = "SELECT user_id FROM user WHERE role IN ('wisatawan', 'pw')";
$query = mysqli_query($conn, $sqlStatement);
$total_members = 0;
if ($query) {
    $total_members = mysqli_num_rows($query);
} else {
    error_log("Error fetching total members: " . mysqli_error($conn));
}


// Query untuk total properties
$sqlStatement = "SELECT tempatwisata_id FROM tempatwisata";
$query = mysqli_query($conn, $sqlStatement);
$total_properties = 0;
if ($query) {
    $total_properties = mysqli_num_rows($query);
} else {
    error_log("Error fetching total properties: " . mysqli_error($conn));
}


// Query untuk pending top up
$sqlPending = mysqli_query($conn, "SELECT COUNT(*) AS jumlah FROM topup WHERE status = 'menunggu'");
$pendingTopup = 0;
if ($sqlPending) {
    $pendingTopup = mysqli_fetch_assoc($sqlPending)['jumlah'];
} else {
    error_log("Error fetching pending topups: " . mysqli_error($conn));
}

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
      --primary-color: #1e4db7; /* Deep Blue */
      --secondary-color: #163c94; /* Darker Blue */
      --accent-color: #4CAF50; /* Green accent for active link */
      --background-light: #f4f6f9; /* Light Gray Background */
      --card-background: #fff; /* White Card Background */
      --text-dark: #333; /* Dark Gray Text */
      --text-medium: #666; /* Medium Gray Text */
      --text-light: #999; /* Light Gray Text */
      --border-color: #e5e5e5; /* Light Gray Border */
      --shadow-light: 0 4px 12px rgba(0,0,0,0.08); /* Default shadow */
      --success-color: #28a745; /* Bootstrap green */
      --info-color: #007bff; /* Bootstrap blue */
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
      display: flex; /* Use flex to ensure content fills body */
      flex-direction: column;
    }

    /* Dashboard Layout */
    .dashboard-container {
      display: flex;
      flex: 1; /* Allow container to grow and fill available space */
      min-height: 100vh; /* Ensure it takes full viewport height */
    }

    /* === Sidebar Specific Styles === */
    .sidebar {
      width: 280px; /* Slightly wider for better spacing */
      background: var(--primary-color);
      color: #fff;
      padding: 2rem 0;
      flex-shrink: 0;
      box-shadow: 2px 0 10px rgba(0,0,0,0.2); /* More pronounced shadow */
      display: flex;
      flex-direction: column;
      position: relative; /* For overlay in mobile */
      z-index: 1050; /* Ensure it's above main content on mobile */
      transition: transform 0.3s ease-in-out; /* For mobile slide in/out */
    }

    /* Hide sidebar by default on small screens, show when toggled */
    @media (max-width: 768px) {
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            transform: translateX(-100%); /* Hidden off-screen */
            width: 260px; /* Fixed width for mobile slide-out */
        }
        .sidebar.active {
            transform: translateX(0); /* Visible */
        }
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1040;
            display: none; /* Hidden by default */
        }
        .sidebar.active + .sidebar-overlay {
            display: block; /* Show when sidebar is active */
        }
    }

    .sidebar-header {
      padding: 0 2rem 2rem; /* Adjusted padding */
      border-bottom: 1px solid rgba(255,255,255,0.2); /* Slightly stronger border */
      margin-bottom: 1.5rem;
      color: rgba(255,255,255,0.95);
      text-align: left;
    }

    .sidebar-header h2 {
      font-size: 1.35rem; /* Larger font */
      font-weight: 700;
      margin: 0;
      line-height: 1.3;
    }

    /* This div wraps the include "viewsAdmin.php"; */
    /* Assuming viewsAdmin.php outputs <nav><ul><li><a>... structure directly */
    .sidebar-nav-container {
      flex: 1;
      overflow-y: auto; /* Enable scrolling for navigation items */
      padding-right: 15px; /* Space for scrollbar on Windows */
      padding-bottom: 2rem; /* Add padding at the bottom */
    }

    /* Target direct children of the included viewsAdmin.php if it's a <nav> */
    .sidebar-nav-container > nav > ul { /* Adjusted selector for <nav> wrapper */
        list-style: none;
        padding: 0 1.5rem; /* Padding for menu items */
        margin: 0;
    }

    .sidebar-nav-container > nav > ul > li { /* Adjusted selector for <nav> wrapper */
        margin-bottom: 0.75rem; /* More space between items */
    }

    .sidebar-nav-container > nav > ul > li > a { /* Adjusted selector for <nav> wrapper */
        display: flex;
        align-items: center;
        padding: 1rem 1.25rem; /* Generous padding */
        color: rgba(255,255,255,0.9);
        text-decoration: none;
        border-radius: 10px; /* More rounded corners */
        transition: background 0.3s ease, transform 0.2s ease, color 0.3s ease;
        font-weight: 500; /* Medium weight for general links */
        font-size: 1rem;
        gap: 1rem; /* Space between icon and text */
    }

    .sidebar-nav-container > nav > ul > li > a i { /* Adjusted selector for <nav> wrapper */
        font-size: 1.25rem; /* Larger icons */
        color: rgba(255,255,255,0.7); /* Slightly muted icon color */
        transition: color 0.3s ease;
    }

    .sidebar-nav-container > nav > ul > li > a:hover { /* Adjusted selector for <nav> wrapper */
        background-color: rgba(255,255,255,0.1); /* Lighter hover background */
        transform: translateX(8px); /* More pronounced slide effect */
        color: #fff;
    }

    .sidebar-nav-container > nav > ul > li > a:hover i { /* Adjusted selector for <nav> wrapper */
        color: #fff; /* Icons turn white on hover */
    }

    /* Active link styling */
    .sidebar-nav-container > nav > ul > li > a.active { /* Adjusted selector for <nav> wrapper */
        background-color: var(--secondary-color); /* Darker blue for active */
        font-weight: 600; /* Bolder text for active */
        box-shadow: inset 5px 0 0 var(--accent-color); /* Stronger accent line */
        color: #fff;
    }

    .sidebar-nav-container > nav > ul > li > a.active i { /* Adjusted selector for <nav> wrapper */
        color: var(--accent-color); /* Active icon color */
    }
    /* === End Sidebar Specific Styles === */


    /* Main Content Area */
    .main-content {
      flex: 1; /* Allow main content to grow and fill remaining space */
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
      flex-wrap: wrap; /* Allow wrapping on smaller screens */
      gap: 1rem; /* Gap between header elements */
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

    /* Hamburger icon for mobile sidebar toggle */
    .menu-toggle {
        display: none; /* Hidden by default on desktop */
        background: none;
        border: none;
        font-size: 1.6rem;
        color: var(--primary-color);
        cursor: pointer;
        margin-right: 1rem;
    }
    @media (max-width: 768px) {
        .menu-toggle {
            display: block; /* Show on mobile */
        }
        .header-left {
            order: 1; /* Keep menu toggle and title together */
            flex-grow: 0;
            justify-content: flex-start;
        }
        .header-left h1 {
            font-size: 1.4rem; /* Smaller title on mobile */
            margin-left: 0.5rem;
        }
        .search-bar {
            order: 3; /* Move search bar below */
            width: 100%; /* Full width search bar */
            margin-top: 0.8rem; /* Space from elements above */
        }
        .header-right {
            order: 2; /* Keep profile/notif to the right */
            width: auto; /* Adjust width */
            justify-content: flex-end;
            margin-left: auto; /* Push to right */
        }
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

    .icon-button:hover {
      color: var(--primary-color);
    }

    .notif-dot {
      position: absolute;
      top: -3px;
      right: -3px;
      background: #e74c3c;
      border-radius: 50%;
      width: 10px;
      height: 10px;
      border: 2px solid var(--card-background);
    }

    .profile-box {
      display: flex;
      align-items: center;
      gap: 0.8rem;
      cursor: pointer;
      padding: 0.5rem 1rem;
      border-radius: 25px;
      background: #f0f2f5;
      transition: background 0.3s ease;
    }

    .profile-box:hover {
      background: #e0e2e5;
    }

    .profile-icon {
      width: 45px;
      height: 45px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid var(--primary-color);
      box-shadow: 0 0 0 3px rgba(30, 77, 183, 0.2);
    }

    .profile-info {
      display: flex;
      flex-direction: column;
      line-height: 1.2;
    }

    .profile-name {
      font-weight: 600;
      font-size: 1rem;
      color: var(--text-dark);
    }

    .profile-role {
      font-size: 0.85rem;
      color: var(--text-medium);
    }

    /* Main Dashboard Content */
    .main {
      padding: 2.5rem;
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 2rem;
    }

    .alert-card {
      background: var(--alert-success-bg);
      color: var(--alert-success-text);
      border: 1px solid var(--alert-success-border);
      border-radius: 10px;
      padding: 1rem 1.5rem;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 1rem;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .alert-card i {
      font-size: 1.3rem;
      color: var(--alert-success-text);
    }

    .row {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 2rem;
    }

    .card {
      background: var(--card-background);
      border-radius: 15px;
      padding: 2rem;
      box-shadow: var(--shadow-light);
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 6px;
      background: var(--primary-color);
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.3s ease-out;
    }

    .card:hover::before {
      transform: scaleX(1);
    }

    .card:hover {
      transform: translateY(-7px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .card h3 {
      font-size: 1.15rem;
      color: var(--text-medium);
      margin-bottom: 0.5rem;
      font-weight: 500;
    }

    .card p {
      font-size: 2.4rem;
      font-weight: 700;
      color: var(--text-dark);
      margin: 0.5rem 0 1.2rem;
    }

    .card a {
      font-size: 1rem;
      color: var(--primary-color);
      text-decoration: none;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      transition: color 0.3s ease, transform 0.2s ease;
    }

    .card a:hover {
      color: var(--secondary-color);
      transform: translateX(3px);
    }
    .card a i {
        font-size: 0.9em;
    }

    /* Panel for Tables */
    .panel {
      background: var(--card-background);
      border-radius: 15px;
      padding: 1.5rem 2rem;
      box-shadow: var(--shadow-light);
    }

    .panel h2 {
      font-size: 1.5rem;
      margin-bottom: 1.5rem;
      color: var(--text-dark);
      font-weight: 600;
      border-bottom: 1px solid var(--border-color);
      padding-bottom: 1rem;
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 12px;
    }

    th, td {
      padding: 1rem 1.2rem;
      text-align: left;
      font-size: 0.95rem;
      vertical-align: middle;
    }

    thead th {
      text-transform: uppercase;
      color: var(--text-light);
      font-size: 0.8rem;
      font-weight: 600;
      background-color: #f8f9fa;
      border-bottom: 2px solid var(--border-color);
      border-top: 2px solid var(--border-color);
    }

    tbody tr {
      background-color: var(--card-background);
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 2px 4px rgba(0,0,0,0.03);
      border-radius: 8px;
      overflow: hidden;
    }

    tbody tr:hover {
      background-color: #f0f2f5;
      box-shadow: 0 4px 8px rgba(0,0,0,0.06);
    }

    tbody tr:first-child {
        margin-top: 0;
    }
    tbody tr:last-child {
      border-bottom: none;
    }

    .role-badge {
      padding: 0.45rem 0.9rem;
      border-radius: 25px;
      font-size: 0.85rem;
      font-weight: 600;
      display: inline-block;
      text-transform: capitalize;
      min-width: 90px;
      text-align: center;
      letter-spacing: 0.5px;
    }

    .role-wisatawan {
      background-color: var(--info-color);
      color: #fff;
    }

    .role-pw {
      background-color: var(--success-color);
      color: #fff;
    }

    /* JavaScript for Toggle */
    .no-scroll {
        overflow: hidden;
    }
  </style>
</head>
<body>
  <div class="dashboard-container">
    <div class="sidebar">
      <div class="sidebar-header">
        <h2>Hi, Admin<br><?= htmlspecialchars($profile['nama'] ?? 'Riska Dea Bakri') ?></h2>
      </div>
      <div class="sidebar-nav-container">
        <?php
        // Include viewsAdmin.php di sini
        // Pastikan viewsAdmin.php hanya berisi <nav> dan <ul> nya
        include "viewsAdmin.php";
        ?>
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
      body.classList.toggle('no-scroll'); // Prevent scrolling when sidebar is open
    }

    // Set active link in sidebar based on current page
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const currentPage = urlParams.get('page');

        // Find all sidebar links within the navigation container
        const sidebarLinks = document.querySelectorAll('.sidebar-nav-container a');

        // Remove 'active' class from all links first
        sidebarLinks.forEach(link => {
            link.classList.remove('active');
        });

        if (currentPage) {
            // Find the link with href containing the current page
            // Using includes to match partial URLs like 'page=dashboardAdmin'
            const activeLink = document.querySelector(`.sidebar-nav-container a[href*="page=${currentPage}"]`);
            if (activeLink) {
                activeLink.classList.add('active');
            }
        } else {
            // If no 'page' param, default to dashboard or first link
            // Assuming 'indeks.php?page=dashboardAdmin' is your main dashboard page
            const dashboardLink = document.querySelector('.sidebar-nav-container a[href*="page=dashboardAdmin"]');
            if (dashboardLink) {
                dashboardLink.classList.add('active');
            } else {
                // Fallback: activate the very first link in the sidebar if no specific dashboard link
                const firstLink = document.querySelector('.sidebar-nav-container a');
                if (firstLink) {
                    firstLink.classList.add('active');
                }
            }
        }
    });
  </script>
</body>
</html>