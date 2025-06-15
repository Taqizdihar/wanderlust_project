<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: indeks.php?page=login");
    exit();
}

$user_id = intval($_SESSION['user_id']);

$stmt = $conn->prepare("SELECT saldo FROM user WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$total_saldo = $data['saldo'] ?? 0;
$stmt->close();

include 'Header.php';
?>

<link rel="stylesheet" href="pengguna/cssPengguna/Saldo.css">

<main style="padding: 40px 20px;">
    <div style="display: flex; flex-direction: column; align-items: center;">

        <?php if (isset($_GET['status']) && $_GET['status'] === 'sukses'): ?>
            <div style="color: green; font-weight: bold; margin-bottom: 20px;">
                Top up berhasil dikirim. Menunggu verifikasi.
            </div>
        <?php endif; ?>

        <section class="saldo-card">
            <div class="saldo-icon"><i class="ri-wallet-3-line"></i></div>
            <div class="saldo-amount">Rp <?= number_format($total_saldo, 0, ',', '.') ?></div>
            <div class="saldo-desc">Saldo Dompet Digital Anda</div>

            <button class="topup-btn" onclick="location.href='indeks.php?page=topUpSaldo'">
                <i class="ri-bank-card-line" style="margin-right: 6px;"></i>Top Up Sekarang
            </button>
        </section>

        <h2 class="riwayat-title">Riwayat Top Up Terbaru</h2>
        <div class="riwayat-list">
            <?php
            $riwayat = mysqli_query($conn, "
                SELECT jumlah, metode_pembayaran, status, tanggal_pengajuan 
                FROM topup 
                WHERE user_id = $user_id 
                ORDER BY tanggal_pengajuan DESC LIMIT 5
            ");

            if (mysqli_num_rows($riwayat) > 0) {
                while ($row = mysqli_fetch_assoc($riwayat)) {
                    $status = htmlspecialchars($row['status']);
                    $metode = htmlspecialchars(ucfirst($row['metode_pembayaran']));
                    $statusColor = $status === 'disetujui' ? 'green' : ($status === 'menunggu' ? 'orange' : 'red');
                    $sign = $status === 'disetujui' ? '+' : '';
                    echo "<div class='riwayat-item'>
                            <div>
                                <strong>{$metode}</strong><br>
                                <small style='color: gray;'>" . date("d M Y, H:i", strtotime($row['tanggal_pengajuan'])) . "</small>
                            </div>
                            <div style='text-align: right;'>
                                <span style='color: {$statusColor}; font-weight: bold;'>{$sign}Rp " . number_format($row['jumlah'], 0, ',', '.') . "</span><br>
                                <small>Status: {$status}</small>
                            </div>
                          </div>";
                }
            } else {
                echo "<p style='color: gray;'>Belum ada riwayat top up.</p>";
            }
            ?>
        </div>
    </div>
</main>

<?php include 'Footer.php'; ?>