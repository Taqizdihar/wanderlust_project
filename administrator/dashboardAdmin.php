<?php
$page = $_GET['page'] ?? 'home';
$feedback = "";

if ($page === 'acc' && isset($_GET['aksi'], $_GET['id'])) {
  $feedback = $_GET['aksi'] === 'acc'
    ? "✅ Pengajuan Pengolah ID {$_GET['id']} diterima."
    : "❌ Pengajuan Pengolah ID {$_GET['id']} ditolak.";
}

if ($page === 'acc_wisata' && isset($_GET['aksi'], $_GET['id'])) {
  $feedback = $_GET['aksi'] === 'acc'
    ? "✅ Wisata ID {$_GET['id']} diterima."
    : "❌ Wisata ID {$_GET['id']} ditolak.";
}

if ($page === 'acc_transaksi' && isset($_GET['aksi'], $_GET['id'])) {
  $feedback = $_GET['aksi'] === 'acc'
    ? "✅ Transaksi ID {$_GET['id']} disetujui."
    : "❌ Transaksi ID {$_GET['id']} ditolak.";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="cssAdmin/contoh.css">
</head>
<body>
<div class="wrapper">
  <aside class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
      <li><a href="?page=home" class="<?= $page === 'home' ? 'active' : '' ?>">Dashboard</a></li>
      <li><a href="acc_pengolah_wisata.php" class="<?= $page === 'acc' ? 'active' : '' ?>">ACC Pengolah Wisata</a></li>
      <li><a href="acc_wisata.php" class="<?= $page === 'acc_wisata' ? 'active' : '' ?>">ACC Wisata</a></li>
      <li><a href="acc_transaksi.php" class="<?= $page === 'acc_transaksi' ? 'active' : '' ?>">ACC Transaksi</a></li>
      <li><a href="member.php" class="<?= $page === 'member' ? 'active' : '' ?>">Daftar Member</a></li>
      <li><a href="logout.php">🚪 Logout</a></li>
    </ul>
  </aside>

  <main class="main">
    <?php if ($feedback): ?>
      <div class="feedback"><?= $feedback ?></div>
    <?php endif; ?>

    <?php if ($page === 'home'): ?>
      <div class="card">
        <h2>Selamat Datang</h2>
        <p>Silakan pilih menu di sidebar untuk mengelola sistem.</p>
      </div>
    <?php endif; ?>
  </main>
</div>
</body>
</html>
