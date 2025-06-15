<?php
// Sisipkan file konfigurasi database
include 'index.php';

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Member</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #4a4a4a;
            border-bottom: 2px solid #eaeaea;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        thead th {
            background-color: #007bff;
            color: #ffffff;
            font-weight: bold;
        }
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tbody tr:hover {
            background-color: #e9ecef;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            color: #777;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Daftar Member</h1>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Tanggal Bergabung</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query untuk mengambil semua data member, diurutkan berdasarkan nama
                $sql = "SELECT id, nama, email, tanggal_bergabung FROM members ORDER BY nama ASC";
                
                // Menggunakan prepared statement untuk keamanan
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $nomor = 1;
                    // Loop untuk menampilkan setiap baris data
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $nomor++ . "</td>";
                        // Menggunakan htmlspecialchars untuk mencegah XSS
                        echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        // Format tanggal menjadi format Indonesia
                        echo "<td>" . date("d F Y", strtotime($row['tanggal_bergabung'])) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    // Tampilkan pesan jika tidak ada data
                    echo '<tr><td colspan="4" class="no-data">Tidak ada data member yang ditemukan.</td></tr>';
                }

                // Tutup statement dan koneksi
                $stmt->close();
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>