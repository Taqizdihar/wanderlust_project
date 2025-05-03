<?php
// Menyertakan kode umum untuk menangani feedback dan aksi
include 'index.php';

// Data simulasi untuk pengajuan Pengolah Wisata
$pengolah_wisata = [
    ['id' => 1, 'name' => 'Siti', 'email' => 'siti@mail.com', 'wisata' => 'Air Terjun'],
    ['id' => 2, 'name' => 'Andi', 'email' => 'andi@mail.com', 'wisata' => 'Pantai'],
    ['id' => 3, 'name' => 'Budi', 'email' => 'budi@mail.com', 'wisata' => 'Gunung'],
    ['id' => 4, 'name' => 'Rina', 'email' => 'rina@mail.com', 'wisata' => 'Danau'],
    ['id' => 5, 'name' => 'Agus', 'email' => 'agus@mail.com', 'wisata' => 'Curug'],
];

if (isset($_GET['aksi'], $_GET['id'])) {
    $id = $_GET['id'];
    $aksi = $_GET['aksi'];
    $message = "";

    if ($aksi === 'acc') {
        $message = "✅ Pengajuan Pengolah Wisata ID $id diterima.";
    } else if ($aksi === 'tolak') {
        $message = "❌ Pengajuan Pengolah Wisata ID $id ditolak.";
    }

    // Set feedback message
    $feedback = $message;
}
?>

<div class="card">
  <h2>Pengajuan Pengolah Wisata</h2>
  <?php if (isset($feedback)): ?>
    <div class="feedback"><?= $feedback ?></div>
  <?php endif; ?>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Wisata</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pengolah_wisata as $data): ?>
        <tr>
          <td><?= $data['id'] ?></td>
          <td><?= $data['name'] ?></td>
          <td><?= $data['email'] ?></td>
          <td><?= $data['wisata'] ?></td>
          <td>
            <a href="?page=acc&aksi=acc&id=<?= $data['id'] ?>" class="acc-btn">ACC</a>
            <a href="?page=acc&aksi=tolak&id=<?= $data['id'] ?>" class="tolak-btn">Tolak</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
