<?php
$feedback = "";
if (isset($_GET['aksi']) && isset($_GET['id'])) {
  $id = $_GET['id'];
  $aksi = $_GET['aksi'];
  if ($aksi == 'acc') {
    $feedback = "✅ Pengajuan ID $id diterima.";
  } elseif ($aksi == 'tolak') {
    $feedback = "❌ Pengajuan ID $id ditolak.";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>ACC Pengolah Wisata</title>
  <style>
    body { margin: 0; font-family: sans-serif; background: #f4f6f9; }
    .wrapper { display: flex; min-height: 100vh; }
    .sidebar {
      width: 240px; background-color: #2c3e50;
      color: white; padding: 20px;
    }
    .sidebar h2 { font-size: 20px; margin-bottom: 20px; }
    .sidebar ul { list-style: none; padding: 0; }
    .sidebar li { margin-bottom: 15px; }
    .sidebar a {
      color: white; text-decoration: none;
      padding: 10px; display: block; border-radius: 5px;
    }
    .sidebar a:hover, .sidebar a.active { background-color: #1abc9c; }
    .main { flex: 1; padding: 30px; }
    table {
      width: 100%; background: white;
      border-collapse: collapse; box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    thead { background: #34495e; color: white; }
    td, th {
      padding: 12px 15px;
      border: 1px solid #ddd;
    }
    .acc-btn, .tolak-btn {
      padding: 6px 10px; color: white;
      border: none; border-radius: 3px;
      font-size: 14px; text-decoration: none;
    }
    .acc-btn { background-color: #2ecc71; }
    .tolak-btn { background-color: #e74c3c; }
    .feedback {
      background: #dff0d8;
      color: #3c763d;
      padding: 10px 15px;
      margin-bottom: 20px;
      border-left: 5px solid #3c763d;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <aside class="sidebar">
      <h2>Admin Panel</h2>
      <ul>
        <li><a href="index.php">Dashboard</a></li>
        <li><a href="acc.php" class="active">ACC Pengolah Wisata</a></li>
        <li><a href="#">Pengaturan</a></li>
      </ul>
    </aside>
    <main class="main">
      <h1>Daftar Pengajuan Pengolah Wisata</h1>

      <?php if ($feedback): ?>
        <div class="feedback"><?= $feedback ?></div>
      <?php endif; ?>

      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Nama Wisata</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Siti Nurhaliza</td>
            <td>siti@mail.com</td>
            <td>Air Terjun Nglirip</td>
            <td>
              <a href="acc.php?aksi=acc&id=1" class="acc-btn">ACC</a>
              <a href="acc.php?aksi=tolak&id=1" class="tolak-btn">Tolak</a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Budi Santoso</td>
            <td>budi@mail.com</td>
            <td>Wisata Kampung Batik</td>
            <td>
              <a href="acc.php?aksi=acc&id=2" class="acc-btn">ACC</a>
              <a href="acc.php?aksi=tolak&id=2" class="tolak-btn">Tolak</a>
            </td>
          </tr>
        </tbody>
      </table>
    </main>
  </div>
</body>
</html>
