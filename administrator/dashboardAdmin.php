<?php
include "config.php";

if (session_status() === PHP_SESSION_NONE) session_start();

$page = $_GET['page'] ?? '';
$ID = $_SESSION['user_id'] ?? 0;

$profile = [];
if ($ID) {
    $stmt = mysqli_prepare($conn, "SELECT * FROM user WHERE user_id = ?");
    mysqli_stmt_bind_param($stmt, "i", $ID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $profile = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
}

$sqlStatement = "SELECT user_id, nama, email, role FROM user WHERE role IN ('wisatawan', 'pw') ORDER BY user_id DESC LIMIT 5";
$query = mysqli_query($conn, $sqlStatement);
$recent_members = mysqli_fetch_all($query, MYSQLI_ASSOC);

$sqlStatement = "SELECT user_id FROM user WHERE role IN ('wisatawan', 'pw')";
$query = mysqli_query($conn, $sqlStatement);
$total_members = mysqli_num_rows($query);

$sqlStatement = "SELECT tempatwisata_id FROM tempatwisata";
$query = mysqli_query($conn, $sqlStatement);
$total_properties = mysqli_num_rows($query);

$sqlPending = mysqli_query($conn, "SELECT COUNT(*) AS jumlah FROM topup WHERE status = 'menunggu'");
$pendingTopup = mysqli_fetch_assoc($sqlPending)['jumlah'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Admin</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
<body>

  <!-- SIDEBAR TIDAK DIUBAH -->
  <?php include('sidebar.php'); ?>

  <!-- KONTEN UTAMA -->
  <div class="main-content">
    <div class="header">
      <h2>Selamat datang di halaman admin.</h2>
      <div class="profile-section">
        <div class="notif-icon">🔔</div>
        <div class="profile-avatar"></div>
        <div>
          <strong>Riska Dea Bakri</strong><br>
          <small>Admin</small>
        </div>
      </div>
    </div>
    <div class="dashboard-cards">
      <div class="card">
        <h4>Total Properties</h4>
        <div class="value">10</div>
      </div>
      <div class="card">
        <h4>Verifikasi Top Up</h4>
        <div class="value">0 permintaan</div>
        <a href="#">Kelola</a>
      </div>
      <div class="card">
        <h4>Total Transactions</h4>
        <div class="value">Unavailable</div>
      </div>
    </div>

    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>Email</th>
            <th>Role</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>chris@gmail.com</td>
            <td><span class="badge pw">Pw</span></td>
          </tr>
          <tr>
            <td>maveen@gmail.com</td>
            <td><span class="badge pw">Pw</span></td>
          </tr>
          <tr>
            <td>alnitah@gmail.com</td>
            <td><span class="badge pw">Pw</span></td>
          </tr>
          <tr>
            <td>alniam@gmail.com</td>
            <td><span class="badge pw">Pw</span></td>
          </tr>
          <tr>
            <td>relysian@gmail.com</td>
            <td><span class="badge wisatawan">Wisatawan</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
  <style>
    
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #f4f6f9;
    }
    .main {
      padding: 2rem;
      flex-grow: 1;
    }
    .row {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 1.5rem;
    }
    .card {
      background: #fff;
      border-radius: 12px;
      padding: 1.5rem;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      display: flex;
      flex-direction: column;
      align-items: start;
    }
    .card h3 {
      font-size: 1rem;
      color: #666;
      margin-bottom: 0.5rem;
    }
    .card p {
      font-size: 1.8rem;
      font-weight: 600;
      color: #333;
    }
    .card a {
      font-size: 0.9rem;
      color: #007bff;
      margin-top: 0.5rem;
      text-decoration: none;
      font-weight: 500;
    }

    .panel {
      margin-top: 2rem;
      background: #fff;
      border-radius: 12px;
      padding: 1rem 1.5rem;
    }
    .panel h2 {
      font-size: 1.1rem;
      margin-bottom: 1rem;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
    }
    th, td {
      padding: 0.75rem 1rem;
      border-bottom: 1px solid #eee;
      text-align: left;
      font-size: 0.9rem;
    }
    thead th {
      text-transform: uppercase;
      color: #999;
      font-size: 0.75rem;
    }
    .role-badge {
      padding: 0.25em 0.75em;
      border-radius: 12px;
      font-size: 0.75rem;
      font-weight: 500;
      text-transform: capitalize;
    }

    .role-wisatawan { background: #e3f2fd; color: #1976d2; }
    .role-pw { background: #d1e7dd; color: #0f5132; }

    /* Header */
    .main-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 2rem;
      background-color: #fff;
      border-bottom: 1px solid #e5e5e5;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }
    .header-left h1 {
      font-size: 1.5rem;
      font-weight: 600;
      margin-right: 2rem;
    }
    .search-bar {
      display: flex;
      align-items: center;
      background-color: #f1f1f1;
      border-radius: 20px;
      padding: 0.5rem 1rem;
    }
    .search-bar i {
      color: #999;
      margin-right: 0.5rem;
    }
    .search-bar input {
      border: none;
      background: transparent;
      outline: none;
      font-size: 0.9rem;
      width: 200px;
    }

    .header-right {
      display: flex;
      align-items: center;
      gap: 1.5rem;
    }
    .notif {
      position: relative;
    }
    .notif i {
      font-size: 1.2rem;
      color: #555;
    }
    .notif-dot {
      position: absolute;
      top: -5px;
      right: -5px;
      background: red;
      border-radius: 50%;
      width: 8px;
      height: 8px;
    }

    .main-content {
      margin-left: 250px; /* agar tidak menimpa sidebar */
      padding: 30px;
    }

    /* Header kanan */
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }

    .profile-section {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .profile-avatar {
      width: 40px;
      height: 40px;
      background: #ddd;
      border-radius: 50%;
    }

    .notif-icon {
      font-size: 20px;
      position: relative;
    }

    .notif-icon::after {
      content: '';
      position: absolute;
      top: -5px;
      right: -5px;
      width: 8px;
      height: 8px;
      background: red;
      border-radius: 50%;
    }

    /* Cards */
    .dashboard-cards {
      display: flex;
      gap: 20px;
      margin-bottom: 30px;
      flex-wrap: wrap;
    }

    .card {
      background: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      flex: 1;
      min-width: 250px;
    }

    .card h4 {
      margin: 0 0 10px;
      color: #333;
      font-size: 16px;
    }

    .card .value {
      font-size: 26px;
      font-weight: bold;
      color: #222;
    }

    .card a {
      margin-top: 10px;
      display: inline-block;
      color: #1a73e8;
      font-size: 13px;
      text-decoration: none;
    }

    /* Table */
    .table-container {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      overflow: hidden;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 15px;
      text-align: left;
      font-size: 14px;
    }

    th {
      background: #f1f3f6;
      color: #444;
    }

    .badge {
      padding: 5px 10px;
      border-radius: 20px;
      font-size: 12px;
      color: white;
    }

    .pw {
      background-color: #4caf50;
    }

    .wisatawan {
      background-color: #2196f3;
    }
  </style>
</head>
  </style>
  <div class="wrapper">
    <?php include "viewsAdmin.php"; ?>
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
             
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>
</html>