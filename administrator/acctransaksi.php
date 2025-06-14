<?php
include 'index.php';

$transaksi = [
  ['id' => 'TX001', 'nama_pengguna' => 'Rudi', 'jumlah' => 'Rp 250.000', 'tanggal' => '2025-05-01'],
  ['id' => 'TX002', 'nama_pengguna' => 'Joni', 'jumlah' => 'Rp 500.000', 'tanggal' => '2025-05-02'],
  ['id' => 'TX003', 'nama_pengguna' => 'Budi', 'jumlah' => 'Rp 750.000', 'tanggal' => '2025-05-03'],
  ['id' => 'TX004', 'nama_pengguna' => 'Siti', 'jumlah' => 'Rp 1.000.000', 'tanggal' => '2025-05-04'],
  ['id' => 'TX005', 'nama_pengguna' => 'Andi', 'jumlah' => 'Rp 1.500.000', 'tanggal' => '2025-05-05'],
];

if (isset($_GET['aksi'], $_GET['id'])) {
  $id = $_GET['id'];
  $aksi = $_GET['aksi'];
  $message = "";

  if ($aksi === 'acc') {
    $message = "✅ Transaksi ID $id disetujui.";
  } else if ($aksi === 'tolak') {
    $message = "❌ Transaksi ID $id ditolak.";
  }

  // Set feedback message
  $feedback = $message;
}
?>
x
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin - ACC Pengolah Wisata</title>
  <link rel="stylesheet" href="administrator/cssAdmin/contoh.css">
</head>

<body>
  <div class="wrapper">
    <aside class="sidebar">
      <h2>Halo,Admin</h2>
      <ul>
        <li><a href="?page=dashboardAdmin" class="<?= $page === 'home' ? 'active' : '' ?>">Dashboard</a></li>
        <li><a href="?page=acc" class="<?= $page === 'acc' ? 'active' : '' ?>">ACC Pengolah Wisata</a></li>
        <li><a href="?page=accwisata" class="<?= $page === 'acc_wisata' ? 'active' : '' ?>">ACC Wisata</a></li>
        <li><a href="?page=acctransaksi" class="<?= $page === 'home' ? 'acc_transaksi' : '' ?>">ACC Transaksi</a></li>
      </ul>
    </aside>

    <main class="main">
      <div class="card">
        <h2>Pengajuan Transaksi</h2>
        <?php if (isset($feedback)): ?>
          <div class="feedback"><?= $feedback ?></div>
        <?php endif; ?>

        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Pengguna</th>
              <th>Jumlah</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($transaksi as $data): ?>
              <tr>
                <td><?= $data['id'] ?></td>
                <td><?= $data['nama_pengguna'] ?></td>
                <td><?= $data['jumlah'] ?></td>
                <td><?= $data['tanggal'] ?></td>
                <td>
                  <a href="?page=acc_transaksi&aksi=acc&id=<?= $data['id'] ?>" class="acc-btn">ACC</a>
                  <a href="?page=acc_transaksi&aksi=tolak&id=<?= $data['id'] ?>" class="tolak-btn">Tolak</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>

</html>