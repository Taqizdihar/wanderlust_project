<?php
$page = $_GET['page'] ?? 'home';
$feedback = "";

if ($page === 'acc' && isset($_GET['aksi'], $_GET['id'])) {
  $feedback = $_GET['aksi'] === 'acc'
    ? " Pengajuan Pengolah ID {$_GET['id']} diterima."
    : "❌ Pengajuan Pengolah ID {$_GET['id']} ditolak.";
}
if ($page === 'acc_wisata' && isset($_GET['aksi'], $_GET['id'])) {
  $feedback = $_GET['aksi'] === 'acc'
    ? " Wisata ID {$_GET['id']} diterima."
    : "❌ Wisata ID {$_GET['id']} ditolak.";
}

if ($page === 'acc_transaksi' && isset($_GET['aksi'], $_GET['id'])) {
  $feedback = $_GET['aksi'] === 'acc'
    ? " Transaksi ID {$_GET['id']} disetujui."
    : "❌ Transaksi ID {$_GET['id']} ditolak.";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
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
        <li><a href="?page=acc_transaksi" class="<?= $page === 'acc_transaksi' ? 'active' : '' ?>">ACC Transaksi</a></li>
        <li><a href="?page=member" class="<?= $page === 'member' ? 'active' : '' ?>">Daftar Member</a></li>
        <li><a href="logout.php"> Logout</a></li>
      </ul>
    </aside>

    <main class="main">
      <?php if ($feedback): ?>
        <div class="feedback"><?= $feedback ?></div>
      <?php endif; ?>

      <main class="main">
    <?php if ($page === 'home'): ?>
      <div class="welcome">
        <strong>Autentikasi Berhasil!</strong> Selamat datang di area admin.
      </div>
      <?php elseif ($page === 'acc'): ?>
        <div class="card">
          <h2>Pengajuan Pengolah Wisata</h2>
          <table>
            <thead><tr><th>ID</th><th>Nama</th><th>Email</th><th>Wisata</th><th>Aksi</th></tr></thead>
            <tbody>
              <tr><td>1</td><td>Riska Dea Bakri</td><td>riska01@gmail.com</td><td>Air Terjun</td>
                <td>
                  <a href="?page=acc&aksi=acc&id=1" class="acc-btn">ACC</a>
                  <a href="?page=acc&aksi=tolak&id=1" class="tolak-btn">Tolak</a>
                </td>
              </tr>
              <tr><td>2</td><td>Faiz Syafiq Nabily</td><td>faiz01@gmail.com</td><td>Ciwidey</td>
                <td>
                  <a href="?page=acc&aksi=acc&id=1" class="acc-btn">ACC</a>
                  <a href="?page=acc&aksi=tolak&id=1" class="tolak-btn">Tolak</a>
                </td>
              </tr>
              <tr><td>3</td><td>Muhammad Taqi</td><td>taqi01@gmail.com</td><td>Trans Studio Mall</td>
                <td>
                  <a href="?page=acc&aksi=acc&id=1" class="acc-btn">ACC</a>
                  <a href="?page=acc&aksi=tolak&id=1" class="tolak-btn">Tolak</a>
                </td>
              </tr>
              <tr><td>4</td><td>Aisyah Noviani</td><td>aisyah01@gmail.com</td><td>Ranca Upas</td>
                <td>
                  <a href="?page=acc&aksi=acc&id=1" class="acc-btn">ACC</a>
                  <a href="?page=acc&aksi=tolak&id=1" class="tolak-btn">Tolak</a>
                </td>
              </tr>
              </tr>
              <tr><td>5</td><td>Siti Amani Fakhira</td><td>amani01@gmail.com</td><td>Lembang</td>
                <td>
                  <a href="?page=acc&aksi=acc&id=1" class="acc-btn">ACC</a>
                  <a href="?page=acc&aksi=tolak&id=1" class="tolak-btn">Tolak</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      <?php elseif ($page === 'acc_wisata'): ?>
        <div class="card">
          <h2>Pengajuan Wisata</h2>
          <table>
            <thead><tr><th>ID</th><th>Nama Wisata</th><th>Lokasi</th><th>Pengaju</th><th>Aksi</th></tr></thead>
            <tbody>
              <tr><td>101</td><td>Curug Cikaso</td><td>Sukabumi</td><td>Audri Melina Muthi Katidjan</td>
                <td>
                  <a href="?page=acc_wisata&aksi=acc&id=101" class="acc-btn">ACC</a>
                  <a href="?page=acc_wisata&aksi=tolak&id=101" class="tolak-btn">Tolak</a>
                </td>
              </tr>
              <tr><td>102</td><td>Tebing Keraton</td><td>Bandung</td><td>Noval Adiprasetya</td>
                <td>
                  <a href="?page=acc_wisata&aksi=acc&id=101" class="acc-btn">ACC</a>
                  <a href="?page=acc_wisata&aksi=tolak&id=101" class="tolak-btn">Tolak</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      <?php elseif ($page === 'acc_transaksi'): ?>
        <div class="card">
          <h2>Pengajuan Transaksi</h2>
          <table>
            <thead><tr><th>ID</th><th>Nama Pengguna</th><th>Jumlah</th><th>Tanggal</th><th>Aksi</th></tr></thead>
            <tbody>
              <tr><td>TX001</td><td>ikaaacan</td><td>Rp 250.000</td><td>2025-05-01</td>
                <td>
                  <a href="?page=acc_transaksi&aksi=acc&id=TX001" class="acc-btn">ACC</a>
                  <a href="?page=acc_transaksi&aksi=tolak&id=TX001" class="tolak-btn">Tolak</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      <?php elseif ($page === 'member'): ?>
        <div class="card">
          <h2>Daftar Member</h2>
          <table>
            <thead><tr><th>ID</th><th>Nama</th><th>Email</th><th>Status</th></tr></thead>
            <tbody>
              <tr><td>001</td><td>ikaaa</td><td>ikaa@mail.com</td><td>Pengguna</td></tr>
              <tr><td>002</td><td>riri</td><td>riri@mail.com</td><td>Pengolah Wisata</td></tr>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
    </main>
  </div>
</body>
</html>
