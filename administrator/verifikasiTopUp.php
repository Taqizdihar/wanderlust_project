<?php
session_start();
include 'config.php';

if ($_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id']) && isset($_GET['aksi'])) {
    $topup_id = $_GET['id'];
    $aksi = $_GET['aksi'];

    $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM topup WHERE topup_id = $topup_id"));
    $user_id = $data['user_id'];
    $jumlah = $data['jumlah'];

    if ($aksi === 'setujui') {
        mysqli_query($conn, "UPDATE topup SET status = 'disetujui', tanggal_verifikasi = NOW() WHERE topup_id = $topup_id");
        mysqli_query($conn, "UPDATE user SET saldo = saldo + $jumlah WHERE user_id = $user_id");
    } elseif ($aksi === 'tolak') {
        mysqli_query($conn, "UPDATE topup SET status = 'ditolak', tanggal_verifikasi = NOW() WHERE topup_id = $topup_id");
    }

    header("Location: verifikasiTopUp.php?msg=update");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Top Up</title>
    <link rel="stylesheet" href="administrator/cssAdmin/verifikasiTopUp.css">
</head>
<body>

<h2 class="judul">Permintaan Top Up Menunggu Verifikasi</h2>

<?php if (isset($_GET['msg']) && $_GET['msg'] === 'update'): ?>
    <div class="notifikasi">Status berhasil diperbarui.</div>
<?php endif; ?>

<table class="tabel-topup">
    <thead>
        <tr>
            <th>User ID</th>
            <th>Jumlah (Rp)</th>
            <th>Metode</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM topup WHERE status = 'menunggu' ORDER BY tanggal_pengajuan DESC");
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>
                    <td>{$row['user_id']}</td>
                    <td>Rp " . number_format($row['jumlah'], 0, ',', '.') . "</td>
                    <td>" . ucfirst($row['metode_pembayaran']) . "</td>
                    <td>" . date('d M Y, H:i', strtotime($row['tanggal_pengajuan'])) . "</td>
                    <td>
                        <a href='verifikasiTopUp.php?id={$row['topup_id']}&aksi=setujui' class='btn setujui'>Setujui</a>
                        <a href='verifikasiTopUp.php?id={$row['topup_id']}&aksi=tolak' class='btn tolak'>Tolak</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5' style='text-align:center;'>Tidak ada permintaan top up.</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>