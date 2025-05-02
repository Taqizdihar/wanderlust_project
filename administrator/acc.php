<?php
// acc_pengolah_wisata.php

$page = $_GET['page'] ?? 'home';  // Mengambil parameter 'page' dari URL
$feedback = "";

if ($page === 'acc' && isset($_GET['aksi']) && isset($_GET['id'])) {
  $id = $_GET['id'];
  $aksi = $_GET['aksi'];
  $feedback = $aksi === 'acc' ? "✅ Pengajuan Pengolah ID $id diterima." : "❌ Pengajuan Pengolah ID $id ditolak.";
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin - ACC Pengolah Wisata</title>
  <link rel="stylesheet" href="assets/styles.css">
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
              <td>1</td><td>Siti Nurhaliza</td><td>siti@mail.com</td><td>Air Terjun Nglirip</td>
              <td>
                <a href="?page=acc&aksi=acc&id=1" class="acc-btn">ACC</a>
                <a href="?page=acc&aksi=tolak&id=1" class="tolak-btn">Tolak</a>
              </td>
            </tr>
            <tr>
              <td>2</td><td>Budi Santoso</td><td>budi@mail.com</td><td>Kampung Batik</td>
              <td>
                <a href="?page=acc&aksi=acc&id=2" class="acc-btn">ACC</a>
                <a href="?page=acc&aksi=tolak&id=2" class="tolak-btn">Tolak</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>
</html>
