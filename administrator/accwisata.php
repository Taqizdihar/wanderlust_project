<?php
// acc_wisata.php

$page = $_GET['page'] ?? 'home';
$feedback = "";

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
  <title>Dashboard Admin - ACC Wisata</title>
  <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
  <div class="wrapper">
    <aside class="sidebar">
      <h2>Admin Panel</h2>
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
    </main>
  </div>
</body>
</html>
