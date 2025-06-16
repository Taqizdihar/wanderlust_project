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

    // Validasi file upload
    $allowed_types = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
    $upload_dir = "uploads/";

    if (isset($_FILES['bukti']) && $_FILES['bukti']['error'] == 0) {
        $file_type = $_FILES['bukti']['type'];
        if (in_array($file_type, $allowed_types)) {
            $file_name = time() . '_' . basename($_FILES["bukti"]["name"]);
            $target_path = $upload_dir . $file_name;

            if (move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_path)) {
                $stmt = $conn->prepare("INSERT INTO topup (user_id, jumlah, metode_pembayaran, bukti_transfer) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("idss", $user_id, $jumlah, $metode, $file_name);
                if ($stmt->execute()) {
                    header("Location: indeks.php?page=Saldo&status=sukses");
                    exit();
                } else {
                    $message = "Gagal menyimpan data topup.";
                }
            } else {
                $message = "Gagal upload file bukti transfer.";
            }
        } else {
            $message = "Gagal upload bukti transaksi. Pastikan file berupa gambar (jpg, png, jpeg, gif).";
        }
    } else {
        $message = "Harap upload bukti transaksi.";
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
            <div class="saldo-desc">Masukkan nominal, metode pembayaran, dan bukti transfer</div>

            <?php if ($message): ?>
                <div style="color: red; font-weight: bold; margin: 15px 0;"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>

            <form method="post" class="topup-form" enctype="multipart/form-data">
                <input type="number" name="jumlah" placeholder="Jumlah Top Up (Rp)" required min="1000" step="1000">
                <select name="metode" required>
                    <option value="" disabled selected>Pilih Metode Pembayaran</option>
                    <option value="gopay">GoPay</option>
                    <option value="dana">DANA</option>
                    <option value="shopeepay">ShopeePay</option>
                    <option value="bank_transfer">Bank Transfer</option>
                    <option value="lainnya">Lainnya</option>
                </select>
                <label>Upload Bukti Transaksi (gambar):</label>
                <input type="file" name="bukti" accept="image/*" required>
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
