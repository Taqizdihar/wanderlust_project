<?php
$saldo = 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Top Up Saldo - Wanderlust</title>
    <link rel="stylesheet" href="topUpSaldo.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="icon.png" alt="Wanderlust Icon">
            <h1>Wanderlust</h1>
        </div>
        <p>Isi Saldo Dompet Wisatamu!</p>

        <div class="balance-box">
            Saldo Anda: <strong>Rp <?= number_format($saldo, 0, ',', '.') ?></strong>
        </div>

        <nav>
            <a href="riwayat.php">Riwayat</a>
            <a href="topUpSaldo.php" class="active">Top Up</a>
            <a href="pengaturan.php">Pengaturan</a>
        </nav>

        <form action="prosesTopUp.php" method="post">
            <label for="jumlah">Masukkan jumlah top up (Rp):</label>
            <input type="number" name="jumlah" id="jumlah" min="10000" placeholder="Contoh: 50000" required>
            <button type="submit">Top Up Sekarang</button>
        </form>

        <div class="footer-text">
            Aman, cepat, dan mudah untuk perjalananmu!
        </div>
    </div>
</body>
</html>