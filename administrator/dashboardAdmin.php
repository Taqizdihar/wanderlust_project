<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard Admin</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
    }

    .sidebar {
      width: 220px;
      background-color: #2c3e50;
      position: fixed;
      top: 0;
      bottom: 0;
      color: white;
      padding-top: 60px;
    }

    .sidebar h3 {
      text-align: center;
      margin-top: -40px;
      margin-bottom: 20px;
    }

    .sidebar a {
      display: block;
      padding: 15px;
      color: white;
      text-decoration: none;
    }

    .sidebar a:hover {
      background-color: #34495e;
    }

    .header {
      height: 60px;
      background-color: #34495e;
      color: white;
      padding: 10px 20px;
      position: fixed;
      left: 220px;
      right: 0;
      top: 0;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .main {
      margin-left: 220px;
      padding: 80px 20px 20px 20px;
    }

    .hidden {
      display: none;
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h3>ADMIN</h3>
    <a href="#" onclick="showPage('dashboard')">Dashboard</a>
    <a href="#" onclick="showPage('mitra')">Pendaftaran Mitra</a>
    <a href="#" onclick="showPage('verifikasi')">Verifikasi Tempat Wisata</a>
  </div>

  <!-- Header -->
  <div class="header">
    <h2 id="page-title">Dashboard Admin</h2>
    <div>Halo, Admin</div>
  </div>

  <!-- Main Content -->
  <div class="main">
    <div id="dashboard">
      <h3>Selamat Datang di Dashboard Admin</h3>
      <p>Gunakan menu di kiri untuk navigasi.</p>
    </div>

    <div id="mitra" class="hidden">
      <h3>Pendaftaran Mitra</h3>
      <p>Berikut adalah daftar mitra yang menunggu persetujuan...</p>
    </div>

    <div id="verifikasi" class="hidden">
      <h3>Verifikasi Tempat Wisata</h3>
      <p>Berikut adalah daftar tempat wisata yang menunggu verifikasi...</p>
    </div>
  </div>

  <script>
    function showPage(page) {
      const sections = ['dashboard', 'mitra', 'verifikasi'];
      sections.forEach(id => {
        document.getElementById(id).classList.add('hidden');
      });
      document.getElementById(page).classList.remove('hidden');
      document.getElementById('page-title').textContent =
        page === 'dashboard'
          ? 'Dashboard Admin'
          : page === 'mitra'
          ? 'Pendaftaran Mitra'
          : 'Verifikasi Tempat Wisata';
    }
  </script>
</body>
</html>
