<?php
// Include common code from index.php to handle feedback and actions
include 'index.php';
?>
<div class="card">
  <h2>Pengajuan Pengolah Wisata</h2>
  <table>
    <thead><tr><th>ID</th><th>Nama</th><th>Email</th><th>Wisata</th><th>Aksi</th></tr></thead>
    <tbody>
      <tr><td>1</td><td>Siti</td><td>siti@mail.com</td><td>Air Terjun</td>
        <td>
          <a href="?page=acc&aksi=acc&id=1" class="acc-btn">ACC</a>
          <a href="?page=acc&aksi=tolak&id=1" class="tolak-btn">Tolak</a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
