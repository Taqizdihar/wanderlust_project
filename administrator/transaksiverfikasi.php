<?php
// =========================================================
// 1. PENGATURAN KONEKSI DATABASE
// =========================================================
$servername = "localhost"; // Umumnya "localhost"
$username = "root";       // Ganti dengan username database Anda (contoh: "root")
$password = "";           // Ganti dengan password database Anda (kosongkan jika tidak ada password)
$dbname = "wanderlust";   // Ganti dengan nama database Anda yang sebenarnya (berdasarkan screenshot, ini 'wanderlust')

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// =========================================================
// 2. LOGIKA PEMROSESAN FORMULIR UNTUK VERIFIKASI TRANSAKSI
// =========================================================
$message = ""; // Variabel untuk menyimpan pesan sukses atau error

// Memeriksa apakah formulir telah dikirim (metode POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai 'transaksi_id' dari input form
    $transaksi_id = $_POST['transaksi_id'];
    
    // Mengambil aksi yang diminta (dari nama tombol submit yang diklik)
    $action = '';
    if (isset($_POST['setujui_transaksi'])) {
        $action = 'setujui';
    } elseif (isset($_POST['tolak_transaksi'])) {
        $action = 'tolak';
    }

    // Melakukan validasi dasar untuk memastikan input tidak kosong dan berupa angka
    if (!empty($transaksi_id) && is_numeric($transaksi_id)) {
        $new_status = '';
        $success_message = '';
        // Kondisi default: hanya transaksi dengan status 'pending' yang bisa diubah
        $current_status_condition = "status = 'pending'"; 

        // Menentukan status baru dan pesan sukses berdasarkan aksi
        if ($action === 'setujui') {
            $new_status = 'selesai';
            $success_message = "berhasil disetujui menjadi 'selesai'.";
        } elseif ($action === 'tolak') {
            $new_status = 'dibatalkan';
            $success_message = "berhasil ditolak menjadi 'dibatalkan'.";
            // Catatan: Jika Anda ingin bisa menolak transaksi meskipun statusnya bukan 'pending'
            // (misalnya 'diproses'), Anda bisa mengubah $current_status_condition di sini
            // menjadi sesuatu seperti: "$current_status_condition = \"status IN ('pending', 'diproses')\"";
        } else {
            // Jika tidak ada tombol aksi yang valid diklik
            $message = "<p style='color: red;'>Aksi tidak valid. Pilih Setujui atau Tolak.</p>";
        }

        // Melanjutkan jika aksi valid dan status baru telah ditentukan
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
                $message = "<p style='color: red;'>Error menyiapkan pernyataan (prepared statement): " . $conn->error . "</p>";
            }
        }
    } else {
        // Jika input ID Transaksi tidak valid
        $message = "<p style='color: red;'>Mohon masukkan ID Transaksi yang valid (harus angka).</p>";
    }
}

// =========================================================
// 3. MENUTUP KONEKSI DATABASE
// =========================================================
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Verifikasi Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #0056b3;
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"] {
            width: calc(100% - 22px); /* Mengurangi padding dan border */
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 10px; /* Jarak antar tombol */
        }
        .button-group input[type="submit"] {
            flex-grow: 1; /* Membuat tombol mengisi ruang yang tersedia */
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }
        input[name="setujui_transaksi"] {
            background-color: #28a745; /* Hijau untuk setuju */
            color: white;
        }
        input[name="setujui_transaksi"]:hover {
            background-color: #218838;
        }
        input[name="tolak_transaksi"] {
            background-color: #dc3545; /* Merah untuk tolak */
            color: white;
        }
        input[name="tolak_transaksi"]:hover {
            background-color: #c82333;
        }
        .message {
            margin-top: 25px;
            padding: 15px;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
        }
        .message p {
            margin: 0;
        }
        /* Style untuk pesan sukses, peringatan, dan error */
        .message p[style*="green"] {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
            border: 1px solid;
        }
        .message p[style*="orange"] {
            background-color: #fff3cd;
            border-color: #ffeeba;
            color: #856404;
            border: 1px solid;
        }
        .message p[style*="red"] {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            border: 1px solid;
        }
        .note {
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sistem Verifikasi Transaksi</h2>
        <p class="note">Pilih untuk menyetujui (status 'selesai') atau menolak (status 'dibatalkan') transaksi yang pending.</p>

        <?php if (!empty($message)): // Menampilkan pesan jika ada ?>
            <div class="message">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="transaksi_id">Masukkan ID Transaksi:</label>
            <input type="text" id="transaksi_id" name="transaksi_id" placeholder="Cth: 1, 2, 3" required>

            <div class="button-group">
                <input type="submit" name="setujui_transaksi" value="Setujui Transaksi">
                <input type="submit" name="tolak_transaksi" value="Tolak Transaksi">
            </div>
        </form>

        <p class="note">Perubahan status hanya berlaku untuk transaksi yang masih dalam kondisi 'pending'.</p>
        <p class="note">Anda dapat melihat daftar ID transaksi di phpMyAdmin pada tabel `transaksi`.</p>
    </div>
</body>
</html>