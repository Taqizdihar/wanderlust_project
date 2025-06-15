<?php
include 'config.php';
include 'viewsAdmin.php'; // untuk sidebar
echo '<div class="main-content">';

// Jika ada permintaan untuk update status
if (isset($_GET['selesaikan']) && is_numeric($_GET['selesaikan'])) {
    $id = $_GET['selesaikan'];
    $update = "UPDATE transaksi SET status = 'selesai' WHERE transaksi_id = $id AND status = 'pending'";
    mysqli_query($conn, $update);
}

// Ambil semua transaksi
$sql = "SELECT t.transaksi_id, u.name, t.jumlah, t.status, t.tanggal_transaksi
        FROM transaksi t
        JOIN user u ON t.user_id = u.user_id
        ORDER BY t.tanggal_transaksi DESC";
$result = mysqli_query($conn, $sql);
?>

<h2>Verifikasi Transaksi</h2>

<?php if ($result && mysqli_num_rows($result) > 0): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama User</th>
            <th>Jumlah</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['transaksi_id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td>Rp <?= number_format($row['jumlah'], 0, ',', '.') ?></td>
            <td><?= ucfirst($row['status']) ?></td>
            <td><?= $row['tanggal_transaksi'] ?></td>
            <td>
                <?php if ($row['status'] === 'pending'): ?>
                    <a href="?page=transactionVerification&selesaikan=<?= $row['transaksi_id'] ?>" onclick="return confirm('Selesaikan transaksi ini?')">Selesaikan</a>
                <?php else: ?>
                    <span style="color:green;">✔ Selesai</span>
                <?php endif; ?>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>Tidak ada transaksi ditemukan.</p>
<?php endif; ?>

</div>
