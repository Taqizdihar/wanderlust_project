<?php
include 'config.php';

$query = "SELECT * FROM topup WHERE status = 'pending' ORDER BY tanggal DESC";
$result = $conn->query($query);
?>

<h2>Permintaan Top Up Menunggu Verifikasi</h2>
<table border="1" cellspacing="0" cellpadding="10">
    <tr>
        <th>User ID</th>
        <th>Jumlah (Rp)</th>
        <th>Metode</th>
        <th>Tanggal</th>
        <th>Bukti</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
            <td><?= $row['user_id'] ?></td>
            <td>Rp <?= number_format($row['jumlah'], 0, ',', '.') ?></td>
            <td><?= htmlspecialchars($row['metode_pembayaran']) ?></td>
            <td><?= date("d M Y, H:i", strtotime($row['tanggal'])) ?></td>
            <td>
                <?php if (!empty($row['bukti_transfer'])): ?>
                    <a href="uploads/<?= $row['bukti_transfer'] ?>" target="_blank">Lihat</a>
                <?php else: ?>
                    -
                <?php endif; ?>
            </td>
            <td>
                <a href="verifikasi_aksi.php?id=<?= $row['id'] ?>&aksi=approve" style="color: green;">Setujui</a> |
                <a href="verifikasi_aksi.php?id=<?= $row['id'] ?>&aksi=reject" style="color: red;">Tolak</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
