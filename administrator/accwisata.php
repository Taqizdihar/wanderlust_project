<?php
// Include common code from index.php to handle feedback and actions
include 'index.php';
?>
<div class="card">
  <h2>Pengajuan Wisata</h2>
  <table>
    <thead><tr><th>ID</th><th>Nama Wisata</th><th>Lokasi</th><th>Pengaju</th><th>Aksi</th></tr></thead>
    <tbody>
      <tr><td>101</td><td>Curug Cikaso</td><td>Sukabumi</td><td>Agus</td>
        <td>
          <a href="?page=acc_wisata&aksi=acc&id=101" class="acc-btn">ACC</a>
          <a href="?page=acc_wisata&aksi=tolak&id=101" class="tolak-btn">Tolak</a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
