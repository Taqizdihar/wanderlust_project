<?php
include 'config.php';

// Contoh validasi admin
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    die("Akses ditolak.");
}

$result = $conn->query("SELECT t.*, u.username FROM topup t JOIN users u ON t.user_id = u.id ORDER BY t.id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Top Up</title>
    <style>
        table { border-collapse: collapse; width: 90%; margin: 20px auto; }
        th, td { border: 1px solid #aaa; padding: 10px; text-align: center; }
        img { max-height: 100px; }
        body { font-family: Arial, sans-serif; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Daftar Top Up Pengguna</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Jumlah</th>
                <th>Metode</th>
                <th>Bukti Transaksi</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['username']) ?></td>
                    <td>Rp <?= number_format($row['jumlah'], 0, ',', '.') ?></td>
                    <td><?= ucfirst($row['metode_pembayaran']) ?></td>
                    <td>
                        <?php if ($row['bukti']): ?>
                            <a href="<?= $row['bukti'] ?>" target="_blank">
                                <img src="<?= $row['bukti'] ?>" alt="Bukti">
                            </a>
                        <?php else: ?>
                            Tidak ada
                        <?php endif; ?>
                    </td>
                    <td><?= $row['created_at'] ?? 'N/A' ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
