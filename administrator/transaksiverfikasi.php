<?php
// Pastikan $profile sudah didefinisikan atau setel default jika tidak
if (!isset($profile) || !is_array($profile)) {
    $profile = ['nama' => 'Guest', 'role' => 'Unknown'];
}

// Aktifkan pelaporan kesalahan untuk debugging. Ini harus selalu ada di file PHP development.
error_reporting(E_ALL);
ini_set('display_errors', 1);

// =========================================================
// 1. PENGATURAN KONEKSI DATABASE
//    (Bagian ini bisa Anda pindahkan ke file konfigurasi terpisah jika Anda punya)
// =========================================================
$servername = "localhost"; // Umumnya "localhost"
$username = "root";       // Ganti dengan username database Anda
$password = "";           // Ganti dengan password database Anda (kosongkan jika tidak ada)
$dbname = "wanderlust";   // Ganti dengan nama database Anda yang sebenarnya

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa apakah koneksi berhasil
if ($conn->connect_error) {
    // Gunakan die() agar skrip berhenti jika koneksi gagal dan tampilkan pesan
    die("Koneksi database gagal: " . $conn->connect_error);
}

// =========================================================
// 2. LOGIKA PEMROSESAN FORMULIR UNTUK VERIFIKASI TRANSAKSI (Setujui/Tolak)
// =========================================================
$message = ""; // Variabel untuk menyimpan pesan sukses atau error

// Memeriksa apakah formulir telah dikirim (metode POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transaksi_id = $_POST['transaksi_id'];
    $action = '';

    if (isset($_POST['setujui_transaksi'])) {
        $action = 'setujui';
    } elseif (isset($_POST['tolak_transaksi'])) {
        $action = 'tolak';
    }

    if (!empty($transaksi_id) && is_numeric($transaksi_id)) {
        $new_status = '';
        $success_message = '';
        // Kondisi default: hanya transaksi dengan status 'pending' yang bisa diubah
        $current_status_condition = "status = 'pending'"; 

        if ($action === 'setujui') {
            $new_status = 'selesai';
            $success_message = "berhasil disetujui menjadi 'selesai'.";
        } elseif ($action === 'tolak') {
            $new_status = 'dibatalkan';
            $success_message = "berhasil ditolak menjadi 'dibatalkan'.";
        } else {
            // Jika tidak ada tombol aksi yang valid diklik
            $message = "<p style='color: red;'>Aksi tidak valid. Pilih Setujui atau Tolak.</p>";
        }

        if (!empty($new_status)) {
            // Menyiapkan SQL query untuk memperbarui status transaksi
            // Menggunakan placeholder '?' untuk nilai yang akan dimasukkan
            $sql = "UPDATE transaksi SET status = ? WHERE transaksi_id = ? AND " . $current_status_condition;

            // Menggunakan prepared statement untuk keamanan (sangat penting untuk mencegah SQL Injection)
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                // Mengikat parameter ke placeholder dalam query:
                // 's' untuk tipe string (new_status), 'i' untuk tipe integer (transaksi_id)
                $stmt->bind_param("si", $new_status, $transaksi_id);

                // Mengeksekusi query yang sudah disiapkan
                if ($stmt->execute()) {
                    // Memeriksa berapa banyak baris yang terpengaruh oleh operasi UPDATE
                    // Jika affected_rows > 0, berarti ada baris yang berhasil diubah
                    if ($stmt->affected_rows > 0) {
                        $message = "<p style='color: green;'>Transaksi ID " . htmlspecialchars($transaksi_id) . " " . $success_message . "</p>";
                    } else {
                        // Jika affected_rows adalah 0, berarti tidak ada baris yang memenuhi kondisi WHERE
                        // (misal: ID tidak ditemukan, atau statusnya sudah tidak 'pending')
                        $message = "<p style='color: orange;'>Tidak ada transaksi dengan ID " . htmlspecialchars($transaksi_id) . " yang berstatus 'pending' atau transaksi tidak ditemukan.</p>";
                    }
                } else {
                    // Jika ada error saat mengeksekusi query
                    $message = "<p style='color: red;'>Error memperbarui record: " . $stmt->error . "</p>";
                }
                // Menutup statement untuk membebaskan sumber daya
                $stmt->close();
            } else {
                // Jika ada error saat menyiapkan prepared statement
                $message = "<p style='color: red;'>Error menyiapkan pernyataan: " . $conn->error . "</p>";
            }
        }
    } else {
        // Jika input ID Transaksi tidak valid
        $message = "<p style='color: red;'>Mohon masukkan ID Transaksi yang valid (harus angka).</p>";
    }
}

// =========================================================
// 3. MENGAMBIL DATA TRANSAKSI PENDING DARI DATABASE UNTUK DITAMPILKAN
// =========================================================
$transactions = [];
$sql_select = "SELECT transaksi_id, wisatawan_id, total_harga, tanggal_transaksi, status FROM transaksi WHERE status = 'pending' ORDER BY tanggal_transaksi ASC";
$result = $conn->query($sql_select);

if (!$result) {
    // Tangani error jika query SELECT gagal
    $message .= "<p style='color: red;'>Error mengambil data transaksi: " . $conn->error . "</p>";
} else if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $transactions[] = $row;
    }
}

// =========================================================
// 4. MENUTUP KONEKSI DATABASE
//    (Penting untuk menutup koneksi setelah selesai menggunakan database)
// =========================================================
$conn->close();
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<style>
    /* Reset margin dan font-family dasar */
    body {
        margin: 0;
        font-family: 'Segoe UI', sans-serif;
        background-color: #f5f7fa;
    }

    /* Gaya untuk Sidebar */
    .sidebar {
        height: 100vh;
        width: 250px;
        position: fixed;
        left: 0;
        top: 0;
        background-color: #1e4db7; /* Warna biru gelap */
        color: white;
        display: flex;
        flex-direction: column;
        padding: 20px 0;
        box-shadow: 2px 0 5px rgba(0,0,0,0.1); /* Sedikit bayangan */
        z-index: 999; /* Pastikan sidebar di atas konten lain */
    }

    .sidebar-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .sidebar-header p {
        margin: 0;
        font-size: 16px;
    }

    .sidebar-header strong {
        font-size: 20px;
    }

    .sidebar-menu {
        list-style-type: none;
        padding: 0;
        margin: 0;
        flex-grow: 1; /* Memastikan menu mengisi sisa ruang vertikal */
    }

    .sidebar-menu li {
        margin: 5px 0;
    }

    .sidebar-menu li a {
        display: flex; /* Untuk ikon dan teks sejajar */
        align-items: center;
        gap: 10px; /* Jarak antara ikon dan teks */
        color: white;
        text-decoration: none;
        padding: 12px 20px;
        font-weight: 500;
        transition: background-color 0.2s ease-in-out; /* Transisi halus saat hover */
    }

    .sidebar-menu li a:hover {
        background-color: #163a8a; /* Warna lebih gelap saat hover */
        border-left: 4px solid #fff; /* Garis putih di kiri */
        padding-left: 16px; /* Dorong sedikit ke kanan untuk efek */
    }
    /* Gaya untuk item menu yang aktif */
    .sidebar-menu li.active a {
        background-color: #163a8a;
        border-left: 4px solid #fff;
        padding-left: 16px;
    }


    /* Gaya untuk Konten Utama */
    .main-content {
        margin-left: 250px; /* Menyesuaikan dengan lebar sidebar agar tidak tertutup */
        padding: 30px; /* Padding di sekitar konten */
    }

    /* Gaya tabel dari sebelumnya */
    table {
        width: 100%;
        border-collapse: collapse; /* Hilangkan spasi antar sel */
        background-color: white;
        box-shadow: 0 0 10px rgba(0,0,0,0.05); /* Bayangan lembut */
        margin-top: 20px; /* Jarak dari elemen di atasnya */
    }

    table th, table td {
        padding: 12px 15px;
        border: 1px solid #ddd; /* Garis tipis antar sel */
        text-align: left;
    }

    table th {
        background-color: #f0f0f0; /* Latar belakang header tabel */
    }

    table tr:hover {
        background-color: #f9f9f9; /* Efek hover pada baris */
    }

    /* Gaya untuk form aksi di dalam tabel (tombol Setujui/Tolak) */
    .action-form {
        display: flex; /* Mengatur tombol sejajar */
        gap: 5px; /* Jarak antar tombol aksi */
    }
    .action-form input[type="submit"] {
        padding: 8px 12px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        color: white;
    }
    .action-form input[name="setujui_transaksi"] {
        background-color: #28a745; /* Hijau */
    }
    .action-form input[name="setujui_transaksi"]:hover {
        background-color: #218838; /* Hijau lebih gelap saat hover */
    }
    .action-form input[name="tolak_transaksi"] {
        background-color: #dc3545; /* Merah */
    }
    .action-form input[name="tolak_transaksi"]:hover {
        background-color: #c82333; /* Merah lebih gelap saat hover */
    }

    /* Gaya untuk pesan notifikasi (sukses, peringatan, error) */
    .message {
        margin-bottom: 20px;
        padding: 15px;
        border-radius: 5px;
        font-size: 16px;
        text-align: center;
    }
    .message p { margin: 0; } /* Hapus margin default dari paragraf dalam pesan */
    .message p[style*="green"] { /* Gaya untuk pesan sukses */
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
        border: 1px solid;
    }
    .message p[style*="orange"] { /* Gaya untuk pesan peringatan */
        background-color: #fff3cd;
        border-color: #ffeeba;
        color: #856404;
        border: 1px solid;
    }
    .message p[style*="red"] { /* Gaya untuk pesan error */
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
        border: 1px solid;
    }

    /* Gaya untuk catatan di bawah form/tabel */
    .note {
        margin-top: 20px;
        font-size: 0.9em;
        color: #777;
        text-align: center;
    }

</style>

<div class="sidebar">
    <div class="sidebar-header">
        <p>Hi, Admin<br><strong><?= htmlspecialchars($profile['nama']) ?></strong></p>
    </div>
    <ul class="sidebar-menu">
        <li><a href="indeks.php?page=dashboardAdmin"><i class="fas fa-globe"></i> Dashboard</a></li>
        <li><a href="indeks.php?page=accpengolah"><i class="fas fa-user-check"></i> Owner Verification</a></li>
        <li><a href="indeks.php?page=accwisata"><i class="fas fa-home"></i> Property Verification</a></li>
        <li><a href="indeks.php?page=verifikasiTopUp"><i class="fas fa-wallet"></i> Verifikasi Top Up</a></li>
        <li class="active"><a href="indeks.php?page=transaksiverifikasi"><i class="fas fa-file-invoice-dollar"></i> Transaction Verification</a></li>
        <li><a href="indeks.php?page=memberlist"><i class="fas fa-users"></i> Member List</a></li>
        <li><a href="indeks.php?page=logout" onclick="return confirm('Are you sure to Log Out?')"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
</div>

<div class="main-content">
    <h2>Verifikasi Transaksi Pending</h2>

    <?php if (!empty($message)): // Menampilkan pesan jika ada ?>
        <div class="message">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($transactions)): // Jika ada transaksi yang perlu diverifikasi ?>
        <table>
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>ID Wisatawan</th>
                    <th>Total Harga</th>
                    <th>Tanggal Transaksi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction): ?>
                    <tr>
                        <td><?= htmlspecialchars($transaction['transaksi_id']) ?></td>
                        <td><?= htmlspecialchars($transaction['wisatawan_id']) ?></td>
                        <td>Rp. <?= number_format($transaction['total_harga'], 0, ',', '.') ?></td>
                        <td><?= htmlspecialchars($transaction['tanggal_transaksi']) ?></td>
                        <td><span style="color: orange; font-weight: bold;"><?= htmlspecialchars($transaction['status']) ?></span></td>
                        <td>
                            <form method="post" class="action-form">
                                <input type="hidden" name="transaksi_id" value="<?= htmlspecialchars($transaction['transaksi_id']) ?>">
                                <input type="submit" name="setujui_transaksi" value="Setujui">
                                <input type="submit" name="tolak_transaksi" value="Tolak">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: // Jika tidak ada transaksi pending ?>
        <p style="text-align: center; margin-top: 30px; font-size: 1.1em; color: #555;">Tidak ada transaksi pending untuk diverifikasi.</p>
    <?php endif; ?>
</div>