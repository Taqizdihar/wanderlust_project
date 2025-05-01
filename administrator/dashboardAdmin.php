<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    .sidebar {
      width: 220px;
      background-color: #2c3e50;
      color: white;
      height: 100vh;
      position: fixed;
      padding-top: 60px;
    }

    .sidebar label {
      display: block;
      padding: 15px;
      color: white;
      cursor: pointer;
    }

    .sidebar label:hover {
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
      padding: 80px 20px 20px;
    }

    /* Konten halaman berdasarkan input radio */
    #tab-dashboard:checked ~ .main #dashboard,
    #tab-mitra:checked ~ .main #mitra,
    #tab-verifikasi:checked ~ .main #verifikasi {
      display: block;
    }

    .main > div {
      display: none;
    }

    /* Sembunyikan radio button */
    input[type="radio"] {
      display: none;
    }
  </style>
</head>
<body>

  <!-- Input radio untuk tab kontrol -->
  <input type="radio" name="tab" id="tab-dashboard" checked>
  <input type="radio" name="tab" id="tab-mitra">
  <input type="radio" name="tab" id="tab-verifikasi">

  <!-- Sidebar -->
  <div class="sidebar">
    <label for="tab-dashboard">🏠 Dashboard</label>
    <label for="tab-mitra">🧾 Pendaftaran Mitra</label>
    <label for="tab-verifikasi">📍 Verifikasi Tempat Wisata</label>
  </div>

  <!-- Header -->
  <div class="header">
    <h2>Dashboard Admin</h2>
    <div>Halo, Admin</div>
  </div>

  <!-- Konten -->
  <div class="main">
    <div id="dashboard">
      <h3>Selamat Datang di Dashboard Admin</h3>
      <p>Gunakan menu di kiri untuk navigasi.</p>
    </div>

    <div id="mitra">
      <h3>Pendaftaran Mitra</h3>
      <p>Berikut adalah daftar mitra yang menunggu persetujuan...</p>
    </div>

    <div id="verifikasi">
      <h3>Verifikasi Tempat Wisata</h3>
      <p>Berikut adalah daftar tempat wisata yang menunggu verifikasi...</p>
    </div>
  </div>

</body>
</html>
