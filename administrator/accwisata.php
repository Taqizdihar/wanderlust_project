<?php
// Menyertakan kode umum untuk menangani feedback dan aksi
include 'index.php';

// Data simulasi untuk pengajuan Wisata
$wisata = [
  ['id' => 101, 'nama_wisata' => 'Curug Cikaso', 'lokasi' => 'Sukabumi', 'pengaju' => 'Agus'],
  ['id' => 102, 'nama_wisata' => 'Pantai Pangandaran', 'lokasi' => 'Pangandaran', 'pengaju' => 'Rina'],
  ['id' => 103, 'nama_wisata' => 'Gunung Gede', 'lokasi' => 'Cianjur', 'pengaju' => 'Joni'],
  ['id' => 104, 'nama_wisata' => 'Taman Safari', 'lokasi' => 'Bogor', 'pengaju' => 'Budi'],
  ['id' => 105, 'nama_wisata' => 'Air Terjun Tumpak Sewa', 'lokasi' => 'Sumatera', 'pengaju' => 'Siti'],
];

if (isset($_GET['aksi'], $_GET['id'])) {
  $id = $_GET['id'];
  $aksi = $_GET['aksi'];
  $message = "";

  if ($aksi === 'acc') {
    $message = "✅ Wisata ID $id diterima.";
  } else if ($aksi === 'tolak') {
    $message = "❌ Wisata ID $id ditolak.";
  }

  // Set feedback message
  $feedback = $message;
}
?>

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
        <li><a href="?page=home" class="<?= $page === 'home' ? 'active' : '' ?>">Dashboard</a></li>
        <li><a href="?page=acc" class="<?= $page === 'acc' ? 'active' : '' ?>">ACC Pengolah Wisata</a></li>
        <li><a href="?page=accwisata" class="<?= $page === 'acc_wisata' ? 'active' : '' ?>">ACC Wisata</a></li>
        <li><a href="?page=acctransaksi" class="<?= $page === 'home' ? 'acc_transaksi' : '' ?>">ACC Transaksi</a></li>
      </ul>
    </aside>

    <main class="main">
      <div class="card">
        <h2>Pengajuan Wisata</h2>
        <?php if (isset($feedback)): ?>
          <div class="feedback"><?= $feedback ?></div>
        <?php endif; ?>

        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Wisata</th>
              <th>Lokasi</th>
              <th>Pengaju</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($wisata as $data): ?>
              <tr>
                <td><?= $data['id'] ?></td>
                <td><?= $data['nama_wisata'] ?></td>
                <td><?= $data['lokasi'] ?></td>
                <td><?= $data['pengaju'] ?></td>
                <td>
                  <a href="?page=acc_wisata&aksi=acc&id=<?= $data['id'] ?>" class="acc-btn">ACC</a>
                  <a href="?page=acc_wisata&aksi=tolak&id=<?= $data['id'] ?>" class="tolak-btn">Tolak</a>
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