<?php
// indeks.php - Master Layout for Admin Dashboard

include "config.php"; // Include your database configuration
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Fetch user profile data (needed for header and sidebar profile info)
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
    // Default profile for guests/non-logged-in (or redirect to login)
    $profile = [
        'nama' => 'Guest',
        'role' => 'Guest',
        'profile_pic_url' => 'https://via.placeholder.com/45/cccccc/ffffff?text=U' // Placeholder image
    ];
}

// Define the current page based on GET parameter
$page = $_GET['page'] ?? 'dashboardAdmin'; // Default to dashboardAdmin if no page is set

// Define authorized pages for admin (and where to find their content files)
$admin_pages = [
    'dashboardAdmin'    => 'administrator/dashboardAdmin.php',
    'acc'               => 'administrator/acc.php', // This would be the detail page for owner verification
    'accpengolah'       => 'administrator/accpengolah.php', // Owner Verification List
    'accwisata'         => 'administrator/accwisata.php', // Property Verification List
    'acctransaksi'      => 'administrator/acctransaksi.php', // Transaction Verification List
    'member'            => 'administrator/member.php', // Member List
    'pengolahStatus'    => 'administrator/pengolahStatus.php', // Assuming this is a processing page
    'accproperti'       => 'administrator/accproperti.php', // Assuming this is another detail page
    'propertiStatus'    => 'administrator/propertiStatus.php', // Assuming this is another processing page
    'verifikasiTopUp'   => 'administrator/verifikasiTopUp.php',
    'viewPropertyDetail'=> 'administrator/viewPropertyDetail.php', // Example for detailed view of property
    'logout'            => 'Umum/logout.php' // Assuming logout is general
];

// You might have similar arrays for other roles if they share this master layout
$pw_pages = [
    // 'verifikasiEntitas', 'dashboardWisata', etc.
];
$wisatawan_pages = [
    // 'Home', 'detailDestinasiWisata', etc.
];
$umum_pages = [
    'login', 'signin', 'homeUmum', 'choice'
];

// Determine the page title
$pageTitles = [
    'dashboardAdmin'    => 'Dashboard',
    'accpengolah'       => 'Owner Verification',
    'accwisata'         => 'Property Verification',
    'verifikasiTopUp'   => 'Top Up Verification',
    'acctransaksi'      => 'Transaction Verification',
    'member'            => 'Member List',
    'acc'               => 'Owner Details',
    'viewPropertyDetail'=> 'Property Details'
    // Add more titles for other pages as needed
];
$currentTitle = $pageTitles[$page] ?? ucwords(str_replace('_', ' ', $page)); // Fallback to formatted page name
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Panel - <?= htmlspecialchars($currentTitle) ?></title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
  <link rel="stylesheet" href="css/style.css"> </head>
<body>
  <div class="dashboard-container">
    <div class="sidebar">
      <div class="sidebar-header">
        <h2>Hi, Admin<br><?= htmlspecialchars($profile['nama'] ?? 'Admin User') ?></h2>
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
          <h1><?= htmlspecialchars($currentTitle) ?></h1> </div>
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
              <div class="profile-name"><?= htmlspecialchars($profile['nama'] ?? 'Admin User') ?></div>
              <div class="profile-role"><?= htmlspecialchars($profile['role'] ?? 'Admin') ?></div>
            </div>
          </div>
        </div>
      </header>

      <main class="main">
        <?php
        // Include page content dynamically
        if (isset($admin_pages[$page])) {
            include $admin_pages[$page];
        } else if (in_array($page, $pw_pages)) {
            // If you have a shared layout for PW, include their files here
            // include "pemilikWisata/$page.php";
            echo '<div class="alert-card" style="background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;">';
            echo '<i class="fas fa-exclamation-triangle"></i>';
            echo '<span><h2>Halaman tidak ditemukan atau tidak diizinkan untuk peran ini.</h2></span>';
            echo '</div>';
        } else if (in_array($page, $wisatawan_pages)) {
            // If you have a shared layout for Wisatawan, include their files here
            // include "pengguna/$page.php";
            echo '<div class="alert-card" style="background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;">';
            echo '<i class="fas fa-exclamation-triangle"></i>';
            echo '<span><h2>Halaman tidak ditemukan atau tidak diizinkan untuk peran ini.</h2></span>';
            echo '</div>';
        } else if (in_array($page, $umum_pages)) {
            // For general pages like login/signup, they might not need the full dashboard layout
            // So you might want to redirect or handle them separately, or include them here
            include "Umum/$page.php";
        } else {
            echo '<div class="alert-card" style="background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;">';
            echo '<i class="fas fa-exclamation-triangle"></i>';
            echo '<span><h2>404 - Halaman tidak ditemukan</h2></span>';
            echo '</div>';
        }
        ?>
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
        const currentPage = urlParams.get('page') || 'dashboardAdmin'; // Default to dashboardAdmin
        
        // Set active class for sidebar link
        const sidebarLinks = document.querySelectorAll('.sidebar-nav-container a');
        sidebarLinks.forEach(link => {
            link.classList.remove('active');
            // Check if href contains the current page slug
            if (link.href.includes(`page=${currentPage}`)) {
                link.classList.add('active');
            }
        });

        // Set dynamic header title based on data from PHP (or hardcoded map)
        const pageTitles = {
            'dashboardAdmin': 'Dashboard',
            'accpengolah': 'Owner Verification',
            'accwisata': 'Property Verification',
            'verifikasiTopUp': 'Top Up Verification',
            'acctransaksi': 'Transaction Verification',
            'member': 'Member List',
            'acc': 'Owner Details',
            'viewPropertyDetail': 'Property Details',
            // Add other admin page titles here as needed
        };

        const headerTitleElement = document.querySelector('.main-header h1');
        if (headerTitleElement) {
            // Use the title determined by PHP if available, otherwise default to a JS-based map
            let titleFromPHP = "<?= htmlspecialchars($currentTitle) ?>";
            if (titleFromPHP && titleFromPHP !== currentPage.replace(/([A-Z])/g, ' $1').replace(/^./, str => str.toUpperCase())) {
                headerTitleElement.textContent = titleFromPHP;
            } else if (pageTitles[currentPage]) {
                headerTitleElement.textContent = pageTitles[currentPage];
            } else {
                // Fallback: Capitalize and replace underscores if no specific title is found
                headerTitleElement.textContent = currentPage.replace(/([A-Z])/g, ' $1').replace(/^./, str => str.toUpperCase());
            }
        }
    });
  </script>
</body>
</html>