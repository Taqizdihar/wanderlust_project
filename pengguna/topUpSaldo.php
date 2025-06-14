<?php

$koneksi = new mysqli("localhost", "root", "", "wanderlust");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$statusPesan = "";

$user_id = 4;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jumlah = $_POST['jumlah'];
    $metode = $_POST['metode_pembayaran'];

    $query = "INSERT INTO topup (user_id, jumlah, metode_pembayaran, status)
              VALUES ($user_id, $jumlah, '$metode', 'menunggu')";

    if ($koneksi->query($query)) {
        $statusPesan = "Top up berhasil diajukan! Menunggu verifikasi.";
    } else {
        $statusPesan = "Top up gagal. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Top Up Saldo</title>
    <link rel="stylesheet" href="pengguna/cssPengguna/topUpSaldo.css">
</head>
<body>

    <?php include 'Header.php'; ?>

    <div class="title">Top Up Saldo Anda</div>

    <div style="max-width: 600px; margin: auto;">
        <?php if ($statusPesan): ?>
            <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 6px; margin-bottom: 20px;">
                <?= $statusPesan ?>
            </div>
        <?php endif; ?>

        <form method="POST" style="display: flex; flex-direction: column; gap: 20px;">
            <div class="topup-section">
                <label><strong>Metode Pembayaran</strong></label>
                <div class="e-wallet-tabs">
                    <button type="button" class="active" onclick="pilihMetode('gopay')">Gopay</button>
                    <button type="button" onclick="pilihMetode('dana')">Dana</button>
                    <button type="button" onclick="pilihMetode('shopeepay')">ShopeePay</button>
                </div>
                <input type="hidden" name="metode_pembayaran" id="metodeInput" value="gopay">
            </div>

            <div>
                <label><strong>Jumlah Top Up</strong></label>
                <div class="amount-buttons">
                    <button type="button" onclick="isiJumlah(50000)">Rp 50.000</button>
                    <button type="button" onclick="isiJumlah(100000)">Rp 100.000</button>
                    <button type="button" onclick="isiJumlah(200000)">Rp 200.000</button>
                </div>
                <input type="number" name="jumlah" id="jumlahInput" placeholder="Masukkan jumlah lainnya">
            </div>

            <button type="submit" class="topup-btn">Kirim Top Up</button>
        </form>

        <!-- Tombol Kembali -->
        <button onclick="location.href='Saldo.php'" style="
            margin-top: 20px;
            padding: 10px 20px;
            border: none;
            background: #ccc;
            color: #333;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;">
            ← Kembali ke Saldo
        </button>
    </div>

    <?php include 'Footer.php'; ?>

    <script>
        function pilihMetode(metode) {
            document.getElementById('metodeInput').value = metode;
            document.querySelectorAll('.e-wallet-tabs button').forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
        }

        function isiJumlah(jumlah) {
            document.getElementById('jumlahInput').value = jumlah;
        }
    </script>

</body>
</html>