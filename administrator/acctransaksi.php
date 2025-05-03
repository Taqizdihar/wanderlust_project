<?php
// Include the common code to handle feedback and actions
include 'index.php';

// Simulated data for Transaksi approval
$transaksi = [
    ['id' => 'TX001', 'nama_pengguna' => 'Rudi', 'jumlah' => 'Rp 250.000', 'tanggal' => '2025-05-01'],
    ['id' => 'TX002', 'nama_pengguna' => 'Joni', 'jumlah' => 'Rp 500.000', 'tanggal' => '2025-05-02'],
    ['id' => 'TX003', 'nama_pengguna' => 'Budi', 'jumlah' => 'Rp 750.000', 'tanggal' => '2025-05-03'],
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
