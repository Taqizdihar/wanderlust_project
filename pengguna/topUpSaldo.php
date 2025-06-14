<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "wanderlust";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mulai sesi
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

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
        // Setelah sukses, redirect ke halaman Saldo via indeks.php
        header("Location: indeks.php?page=Saldo&status=sukses");
        exit();
    } else {
        $message = "Gagal melakukan top up: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Top Up Saldo - Wanderlust</title>
    <link rel="stylesheet" href="pengguna/cssPengguna/topUpSaldo.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

<?php include 'Header.php'; ?>

<div class="container" style="max-width: 600px; margin: 0 auto; padding: 40px 20px;">
    <h2 class="title">Top Up Saldo</h2>

    <?php if ($message): ?>
        <div class="alert" style="color: red; font-weight: bold; margin-bottom: 20px;">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <form method="post" class="topup-section">
        <label for="jumlah">Jumlah Top Up (Rp):</label>
        <input type="number" name="jumlah" id="jumlah" required min="1000" step="1000" placeholder="Masukkan nominal">

        <label for="metode">Metode Pembayaran:</label>
        <select name="metode" id="metode" required style="padding: 10px; border-radius: 6px; border: 2px solid #0077cc; margin-top: 10px;">
            <option value="gopay">GoPay</option>
            <option value="dana">DANA</option>
            <option value="shopeepay">ShopeePay</option>
            <option value="bank_transfer">Bank Transfer</option>
            <option value="lainnya">Lainnya</option>
        </select>

        <button type="submit" class="topup-btn">Kirim Permintaan Top Up</button>
    </form>

    <div style="text-align: center; margin-top: 20px;">
        <a href="indeks.php?page=Saldo" style="text-decoration: none; color: #0077cc;">← Kembali ke Saldo</a>
    </div>
</div>

<?php include 'Footer.php'; ?>

</body>
</html>