<?php
session_start();
include 'config.php';
include 'Header.php';

if (!isset($_SESSION['user_id'])) {
    die("Silakan login terlebih dahulu.");
}

$user_id = $_SESSION['user_id'];

$query = "SELECT SUM(jumlah) AS total_saldo FROM topup WHERE user_id = ? AND status = 'disetujui'";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$total_saldo = $data['total_saldo'] ?? 0;

$query_riwayat = "SELECT jumlah, metode_pembayaran, tanggal_pengajuan, status FROM topup WHERE user_id = ? ORDER BY tanggal_pengajuan DESC";
$stmt_riwayat = $conn->prepare($query_riwayat);
$stmt_riwayat->bind_param("i", $user_id);
$stmt_riwayat->execute();
$riwayat_result = $stmt_riwayat->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Saldo Saya - Wanderlust</title>
    <link rel="stylesheet" href="pengguna/cssPengguna/Saldo.css">
</head>
<body>

<main>
    <section class="saldo-card">
        <div class="saldo-icon">💰</div>
        <div class="saldo-amount">Rp <?= number_format($total_saldo, 0, ',', '.') ?></div>
        <div class="saldo-desc">Saldo Aktif Anda</div>
        <button class="topup-btn" onclick="location.href='TopUp.php'">Top Up Sekarang</button>
    </section>

    <section class="riwayat">
        <h2 class="riwayat-title">Riwayat Top Up</h2>
        <div class="riwayat-list">
            <?php if ($riwayat_result->num_rows > 0): ?>
                <?php while ($row = $riwayat_result->fetch_assoc()): ?>
                    <div class="riwayat-item">
                        <span><?= date("d M Y H:i", strtotime($row['tanggal_pengajuan'])) ?></span>
                        <span>Rp <?= number_format($row['jumlah'], 0, ',', '.') ?> - <?= ucfirst($row['metode_pembayaran']) ?> (<?= $row['status'] ?>)</span>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="riwayat-item">
                    <span>Tidak ada riwayat top up</span>
                    <span>-</span>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php include 'Footer.php'; ?>
</body>
</html>