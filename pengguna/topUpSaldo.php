<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $jumlah = $_POST['jumlah'];
    $metode = $_POST['metode'];

    $stmt = $conn->prepare("INSERT INTO topup (user_id, jumlah, metode_pembayaran) VALUES (?, ?, ?)");
    $stmt->bind_param("ids", $user_id, $jumlah, $metode);

    if ($stmt->execute()) {
        header("Location: indeks.php?page=Saldo&status=sukses");
        exit();
    } else {
        $message = "Gagal melakukan top up: " . $conn->error;
    }
}

include 'Header.php';
?>

<link rel="stylesheet" href="pengguna/cssPengguna/topUpSaldo.css">

<main style="padding: 40px 20px;">
    <div style="display: flex; flex-direction: column; align-items: center;">

        <section class="saldo-card">
            <div class="saldo-icon"><i class="ri-bank-card-line"></i></div>
            <div class="saldo-amount">Top Up Saldo</div>
            <div class="saldo-desc">Masukkan nominal dan metode pembayaran</div>

            <?php if ($message): ?>
                <div style="color: red; font-weight: bold; margin: 15px 0;">
                    <?= htmlspecialchars($message) ?>
                </div>
            <?php endif; ?>

            <form method="post" class="topup-form">
                <input type="number" name="jumlah" placeholder="Jumlah Top Up (Rp)" required min="1000" step="1000">

                <select name="metode" required>
                    <option value="" disabled selected>Pilih Metode Pembayaran</option>
                    <option value="gopay">GoPay</option>
                    <option value="dana">DANA</option>
                    <option value="shopeepay">ShopeePay</option>
                    <option value="bank_transfer">Bank Transfer</option>
                    <option value="lainnya">Lainnya</option>
                </select>

                <button type="submit" class="topup-btn">
                    <i class="ri-send-plane-line" style="margin-right: 6px;"></i>Kirim Permintaan
                </button>
            </form>
        </section>

        <div style="margin-top: 20px;">
            <a href="indeks.php?page=Saldo" style="text-decoration: none; color: #0077cc; font-weight: 500;">← Kembali ke Saldo</a>
        </div>
    </div>
</main>

<?php include 'Footer.php'; ?>