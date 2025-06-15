<?php
// administrator/memberlist.php
// Halaman untuk menampilkan daftar anggota (member list)

// Pastikan koneksi database sudah tersedia dari indeks.php
// Jika tidak, Anda bisa require_once di sini, tapi idealnya sudah di indeks.php
if (!isset($conn)) {
    // Jalur ini mengasumsikan koneksi.php ada di satu level di atas folder administrator/
    require_once '../koneksi.php'; // Sesuaikan jalur jika koneksi.php ada di tempat lain
}

// Ambil data anggota dari database
$sql = "SELECT id, nama, email, role, status FROM users ORDER BY id DESC";
$result = $conn->query($sql);

?>

<div class="page-content">
    <h2>Daftar Anggota Sistem</h2>

    <?php if ($result->num_rows > 0) : ?>
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Peran (Role)</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['nama']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['role']); ?></td>
                        <td>
                            <?php
                            $status_class = '';
                            if ($row['status'] == 'active') {
                                $status_class = 'status-active';
                            } elseif ($row['status'] == 'inactive') {
                                $status_class = 'status-inactive';
                            } elseif ($row['status'] == 'pending') {
                                $status_class = 'status-pending';
                            }
                            ?>
                            <span class="<?php echo $status_class; ?>">
                                <?php echo htmlspecialchars(ucfirst($row['status'])); ?>
                            </span>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Tidak ada anggota yang ditemukan di database.</p>
    <?php endif; ?>

    <?php
    // Tutup koneksi database setelah selesai digunakan
    // Ini penting jika Anda tidak ingin koneksi tetap terbuka di seluruh skrip
    $conn->close();
    ?>
</div>