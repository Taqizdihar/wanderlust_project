<?php
session_start();

$saldo = isset($_SESSION['saldo']) ? $_SESSION['saldo'] : 0;
$status = '';
$pesan = '';

if (isset($_POST['jumlah'])) {
    $jumlahTopUp = (int) $_POST['jumlah'];

    if ($jumlahTopUp >= 10000) {
        $_SESSION['saldo'] = $saldo + $jumlahTopUp;
        $status = 'success';
        $pesan = "Top up sebesar Rp " . number_format($jumlahTopUp, 0, ',', '.') . " berhasil!";
        $saldo = $_SESSION['saldo'];
    } else {
        $status = 'error';
        $pesan = "Jumlah minimum top up adalah Rp 10.000.";
    }
} else {
    $status = 'error';
    $pesan = "Data tidak valid.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Top Up - Wanderlust</title>
    <link rel="stylesheet" href="topUpSaldo.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="icon.png" alt="Wanderlust Icon">
            <h1>Wanderlust</h1>
        </div>
        <p>Hasil Top Up Dompet Wisatamu</p>

        <div class="balance-box">
            Saldo Anda Sekarang: <strong>Rp <?= number_format($saldo, 0, ',', '.') ?></strong>
        </div>

        <nav>
            <a href="riwayat.php">Riwayat</a>
            <a href="topUpSaldo.php" class="active">Top Up</a>
            <a href="pengaturan.php">Pengaturan</a>
        </nav>

        <div style="margin-top: 20px;">
            <?php if ($status === 'success'): ?>
                <p style="color: green; font-weight: bold;"><?= $pesan ?></p>
            <?php else: ?>
                <p style="color: red; font-weight: bold;"><?= $pesan ?></p>
            <?php endif; ?>
        </div>

        <a href="topUpSaldo.php">
            <button style="margin-top: 20px;">Kembali ke Top Up</button>
        </a>

        <div class="footer-text">
            Aman, cepat, dan mudah untuk perjalananmu!
        </div>
    </div>
</body>
</html>