<?php
$page = $_GET['page'] ?? 'home';
$feedback = "";

if ($page === 'acc' && isset($_GET['aksi']) && isset($_GET['id'])) {
  $id = $_GET['id'];
  $aksi = $_GET['aksi'];
  $feedback = $aksi === 'acc' ? "✅ Pengajuan Pengolah ID $id diterima." : "❌ Pengajuan Pengolah ID $id ditolak.";
}

if ($page === 'acc_wisata' && isset($_GET['aksi']) && isset($_GET['id'])) {
  $id = $_GET['id'];
  $aksi = $_GET['aksi'];
  $feedback = $aksi === 'acc' ? "✅ Wisata ID $id diterima." : "❌ Wisata ID $id ditolak.";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <!-- Memanggil file CSS -->
  <link rel="stylesheet" href="cssAdmin/contoh.css">
</head>
<body>
  <div class="wrapper">
    <aside class="sidebar">
      <h2>Halo,Admin</h2>
      <ul>
        <li><a href="?page=home" class="<?= $page === 'home' ? 'active' : '' ?>">Dashboard</a></li>
        <li><a href="?page=acc" class="<?= $page === 'acc' ? 'active' : '' ?>">ACC Pengolah Wisata</a></li>
        <li><a href="?page=acc_wisata" class="<?= $page === 'acc_wisata' ? 'active' : '' ?>">ACC Wisata</a></li>
      </ul>
    </aside>
    <main class="main">
      <?php if ($feedback): ?>
        <div class="feedback"><?= $feedback ?></div>
      <?php endif; ?>

      <?php if ($page === 'home'): ?>
        <div class="welcome">
          <strong>Autentikasi Berhasil!</strong> Selamat datang di area admin.
        </div>

        <div class="card profile">
          <img src="" alt="Foto Profil">
          <div class="profile-info">
            <h3>ikaaacan</h3>
            <p>📱 082180750761</p>
            <p>📧 riskadeabakri0108@gmail.com</p>
            <p>🕒 Bergabung Sejak: 29-04-2025</p>
          </div>
        </div>

        <div class="card">
          <h3>Menu Utama</h3>
          <div class="grid">
            <div class="menu-box">
              <img src="https://img.icons8.com/ios-filled/50/000000/visible.png"/>
              <strong>MONITOR</strong><span>Pantau Member</span>
            </div>
            <div class="menu-box">
              <img src="https://img.icons8.com/ios-filled/50/000000/paw.png"/>
              <strong>JEJAK</strong><span>Lihat Jejak Member</span>
            </div>
          </div>
        </div>

        <div class="card">
          <h3>Pengaturan</h3>
          <div class="grid">
            <div class="menu-box">
              <img src="https://img.icons8.com/ios-filled/50/000000/region-code.png"/>
              <strong>GEOFENCE</strong><span>Pengaturan Geofence</span>
            </div>
            <div class="menu-box">
              <img src="https://img.icons8.com/ios-filled/50/000000/user-group-man-man.png"/>
              <strong>MEMBER</strong><span>Pengaturan Member</span>
            </div>
            <div class="menu-box">
              <img src="https://img.icons8.com/ios-filled/50/000000/marker.png"/>
              <strong>POI</strong><span>Pengaturan POI</span>
            </div>
            <div class="menu-box">
              <img src="https://img.icons8.com/ios-filled/50/000000/database.png"/>
              <strong>BASECAMP</strong><span>Pengaturan Basecamp</span>
            </div>
          </div>
        </div>

      <?php elseif ($page === 'acc'): ?>
        <div class="card">
          <h2>Pengajuan Pengolah Wisata</h2>
          <table>
            <thead>
              <tr>
                <th>ID</th><th>Nama</th><th>Email</th><th>Nama Wisata</th><th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td><td>Riska Dea Bakri</td><td>riska01@gmail.com</td><td>ciwidey</td>
                <td>
                  <a href="?page=acc&aksi=acc&id=1" class="acc-btn">ACC</a>
                  <a href="?page=acc&aksi=tolak&id=1" class="tolak-btn">Tolak</a>
                </td>
              </tr>
              <tr>
                <td>2</td><td>Muhammad Taqi</td><td>taqi01@gmail.com</td><td>Kampung Batik</td>
                <td>
                  <a href="?page=acc&aksi=acc&id=2" class="acc-btn">ACC</a>
                  <a href="?page=acc&aksi=tolak&id=2" class="tolak-btn">Tolak</a>
                </td>
              </tr>
              <tr>
                <td>3</td><td>Faiz Syafiq Nabiliy</td><td>budi@mail.com</td><td>Trans Studio Mall</td>
                <td>
                  <a href="?page=acc&aksi=acc&id=2" class="acc-btn">ACC</a>
                  <a href="?page=acc&aksi=tolak&id=2" class="tolak-btn">Tolak</a>
                </td>
              </tr>
              <tr>
                <td>4</td><td>Aisyah Noviani</td><td>budi@mail.com</td><td>Braga</td>
                <td>
                  <a href="?page=acc&aksi=acc&id=2" class="acc-btn">ACC</a>
                  <a href="?page=acc&aksi=tolak&id=2" class="tolak-btn">Tolak</a>
                </td>
              </tr>
              <tr>
                <td>5</td><td>Audri Melina Muthi</td><td>budi@mail.com</td><td>j</td>
                <td>
                  <a href="?page=acc&aksi=acc&id=2" class="acc-btn">ACC</a>
                  <a href="?page=acc&aksi=tolak&id=2" class="tolak-btn">Tolak</a>
                </td>
              </tr>
              <tr>
                <td>6</td><td>Siti Amany Fakhira</td><td>budi@mail.com</td><td>Ranca Upas</td>
                <td>
                  <a href="?page=acc&aksi=acc&id=2" class="acc-btn">ACC</a>
                  <a href="?page=acc&aksi=tolak&id=2" class="tolak-btn">Tolak</a>
                </td>
              </tr>
              <tr>
                <td>7</td><td>Noval Adiprasetya</td><td>budi@mail.com</td><td>Tebing Keraton<01/td>
                <td>
                  <a href="?page=acc&aksi=acc&id=2" class="acc-btn">ACC</a>
                  <a href="?page=acc&aksi=tolak&id=2" class="tolak-btn">Tolak</a>
                </td>
              </tr>
              <tr>
                <td>8</td><td>Budi Santoso</td><td>budi@mail.com</td><td>Kampung Batik</td>
                <td>
                  <a href="?page=acc&aksi=acc&id=2" class="acc-btn">ACC</a>
                  <a href="?page=acc&aksi=tolak&id=2" class="tolak-btn">Tolak</a>
                </td>
              </tr>
              
            </tbody>
          </table>
        </div>

      <?php elseif ($page === 'acc_wisata'): ?>
        <div class="card">
          <h2>Pengajuan Wisata</h2>
          <table>
            <thead>
              <tr>
                <th>ID</th><th>Nama Wisata</th><th>Lokasi</th><th>Diajukan Oleh</th><th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>101</td><td>Curug Cikaso</td><td>Sukabumi</td><td>Agus S</td>
                <td>
                  <a href="?page=acc_wisata&aksi=acc&id=101" class="acc-btn">ACC</a>
                  <a href="?page=acc_wisata&aksi=tolak&id=101" class="tolak-btn">Tolak</a>
                </td>
              </tr>
              <tr>
                <td>102</td><td>Pantai Watu Karung</td><td>Pacitan</td><td>Dewi</td>
                <td>
                  <a href="?page=acc_wisata&aksi=acc&id=102" class="acc-btn">ACC</a>
                  <a href="?page=acc_wisata&aksi=tolak&id=102" class="tolak-btn">Tolak</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
    </main>
  </div>
</body>
</html>
