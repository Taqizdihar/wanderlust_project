<?php
include 'config.php';

// Ambil data member
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Terjadi kesalahan dalam mengambil data: " . mysqli_error($conn));
}

// Siapkan profil jika diperlukan
$profile = ['nama' => 'Admin']; // atau ambil dari session/user login

// Tampilkan sidebar + layout dari viewsAdmin
include 'viewsAdmin.php';
?>

<!-- Konten khusus halaman ini -->
<h2>Daftar Member</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>No Telepon</th>
        <th>Gender</th>
        <th>Tanggal Lahir</th>
        <th>Role</th>
        <th>Saldo</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= htmlspecialchars($row['user_id']) ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['no_telepon']) ?></td>
            <td><?= htmlspecialchars($row['gender']) ?></td>
            <td><?= htmlspecialchars($row['tanggal_lahir']) ?></td>
            <td><?= htmlspecialchars($row['role']) ?></td>
            <td><?= htmlspecialchars($row['saldo']) ?></td>
        </tr>
    <?php endwhile; ?>
</table>
