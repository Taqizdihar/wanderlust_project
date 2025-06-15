<?php
include "config.php";

$id = $_GET['id'] ?? null;
$nama = '';
$email = '';

if ($id) {
    $query = mysqli_query($conn, "SELECT * FROM member WHERE id='$id'");
    if ($data = mysqli_fetch_assoc($query)) {
        $nama = $data['nama'];
        $email = $data['email'];
    } else {
        echo "Data tidak ditemukan!";
        exit;
    }
}
?>

<h2><?= $id ? "Edit" : "Tambah" ?> Member</h2>
<form action="proses.php" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>" required><br><br>
    
    <label>Email:</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" required><br><br>

    <button type="submit" name="<?= $id ? 'update' : 'tambah' ?>">
        <?= $id ? 'Update' : 'Tambah' ?>
    </button>
</form>
<a href="index.php">← Kembali</a>
