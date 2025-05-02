<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f0f2f5;
    }

    /* Sidebar */
    .sidebar {
      position: fixed;
      width: 220px;
      height: 100vh;
      background-color: #007bff;
      color: white;
      padding-top: 20px;
    }

    .sidebar .profile {
      text-align: center;
      margin-bottom: 30px;
    }

    .sidebar .profile img {
      width: 80px;
      border-radius: 50%;
    }

    .sidebar .profile p {
      margin: 10px 0 0;
      font-weight: bold;
    }

    .sidebar label {
      display: block;
      padding: 12px 20px;
      color: white;
      cursor: pointer;
      transition: background 0.3s;
    }

    .sidebar label:hover {
      background-color: #34495e;
    }

    /* Header */
    .header {
      height: 60px;
      background-color: #34495e;
      color: white;
      padding: 15px 30px;
      margin-left: 220px;
      display: flex;
      align-items: center;
    }

    /* Main Content */
    .main {
      margin-left: 220px;
      padding: 30px;
    }

    .content {
      display: none;
      background-color: white;
      border-radius: 8px;
      padding: 30px;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
      max-width: 800px;
      margin: 0 auto;
    }

    input[type="radio"] {
      display: none;
    }

    #tab-dashboard:checked ~ .main #content-dashboard,
    #tab-member:checked ~ .main #content-member,
    #tab-monitor:checked ~ .main #content-monitor,
    #tab-jejak:checked ~ .main #content-jejak,
    #tab-pengaturan:checked ~ .main #content-pengaturan {
      display: block;
    }

    .section-title {
      font-size: 24px;
      color: #333;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }

    th, td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: left;
    }

    .status-aktif {
      color: green;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <!-- Radio Buttons (Navigation Logic) -->
  <input type="radio" name="menu" id="tab-dashboard" checked>
  <input type="radio" name="menu" id="tab-member">
  <input type="radio" name="menu" id="tab-monitor">
  <input type="radio" name="menu" id="tab-jejak">
  <input type="radio" name="menu" id="tab-pengaturan">

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="profile">
      <img src="https://via.placeholder.com/80" alt="Admin">
      <h2>Wanderlust</>
    </div>
    <label for="tab-dashboard">🏠 Dashboard</label>
    <label for="tab-member">👥 Member</label>
    <label for="tab-monitor">👁️ Monitor</label>
    <label for="tab-jejak">🐾 Jejak</label>
    <label for="tab-pengaturan">⚙️ Pengaturan</label>
  </div>

  <!-- Header -->
  <div class="header">
    Selamat Datang di Area Admin
  </div>

  <!-- Main Content -->
  <div class="main">
    <div id="content-dashboard" class="content">
      <div class="section-title">Dashboard Utama</div>
      <p>Halo Admin! Anda telah berhasil masuk. Gunakan menu di samping untuk mengelola data dan informasi sistem.</p>
    </div>

    <div id="content-member" class="content">
      <div class="section-title">Data Member</div>
      <table>
        <tr><th>Nama</th><th>Status</th></tr>
        <tr><td>Juan Gracia</td><td class="status-aktif">Aktif</td></tr>
        <tr><td>Wayne</td><td class="status-aktif">Aktif</td></tr>
        <tr><td>aaa</td><td class="status-aktif">Aktif</td></tr>
        <tr><td>bbb</td><td class="status-aktif">Aktif</td></tr>
      </table>
    </div>

    <div id="content-monitor" class="content">
      <div class="section-title">Monitor Aktivitas</div>
      <p>Fitur ini digunakan untuk memantau aktivitas pengguna secara real-time.</p>
    </div>

    <div id="content-jejak" class="content">
      <div class="section-title">Riwayat Jejak</div>
      <p>Lihat riwayat lokasi pengguna dalam periode tertentu.</p>
    </div>

    <div id="content-pengaturan" class="content">
      <div class="section-title">Pengaturan Sistem</div>
      <p>Kelola pengaturan seperti Geofence, POI, dan konfigurasi basecamp.</p>
    </div>
  </div>

</body>
</html>
