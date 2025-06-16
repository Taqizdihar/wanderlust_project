<?php
include "config.php";

// Ambil semua transaksi
$sql = "SELECT * FROM transaksi ORDER BY transaksi_id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner List</title>
    <link rel="stylesheet" href="administrator/cssAdmin/accpengolah.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .btn-verif {
        background-color: #28a745;
        color: white;
        padding: 6px 10px;
        text-decoration: none;
        border-radius: 4px;
    }

    .btn-verif:hover {
        background-color: #218838;
    }
</style>

<body>
    <div class="wrapper">
        <?php include "viewsAdmin.php"; ?>
        <div class="main-content">
            <h2>Verifikasi Transaksi</h2>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['transaksi_id'] ?></td>
                                <td><?= htmlspecialchars($row['tanggal_kunjungan'] ?? '-') ?></td>
                                <td>Rp<?= number_format($row['total_harga'], 0, ',', '.') ?></td>
                                <td><?= htmlspecialchars($row['status']) ?></td>
                                <td>
                                    <?php if ($row['status'] === 'pending'): ?>
                                        <a href="indeks.php?page=verifikasi_transaksi&id=<?= $row['transaksi_id'] ?>" class="btn-verif">Verifikasi</a>
                                    <?php else: ?>
                                        <span style="color: green; font-weight: bold;">Selesai</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">Tidak ada data transaksi.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>