<?php
// administrator/memberlist.php
// Halaman untuk menampilkan daftar anggota (member list)

// Tampilkan error saat pengembangan
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Pastikan koneksi database sudah tersedia dari indeks.php
if (!isset($conn)) {
    // Sesuaikan jalur jika koneksi.php ada di tempat lain
    require_once '../koneksi.php';
}

// Ambil data anggota dari database
$sql = "SELECT id, nama, email, role, status FROM users ORDER BY id DESC";
$result = $conn->query($sql);

// Jika query gagal, tampilkan pesan error
if (!$result) {
    echo "<p>Terjadi kesalahan dalam mengambil data: " . $conn->error . "</p>";
    exit;
}
?>

<div class="page-content">
    <h2>Daftar Anggota Sistem</h2>

    <?php if ($result->num_rows > 0) : ?>
        <table class="data-table" border="1" cellspacing="0" cellpadding="8">
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
                <?php while ($row = $result->fetch_assoc()) : ?>
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

    <?php $conn->close(); ?>
</div>
