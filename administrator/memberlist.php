<?php
// member_list.php
include "config.php";
$members = mysqli_query($conn, "SELECT * FROM member");
?>

<h2>Daftar Member</h2>
<a href="form.php">+ Tambah Member</a>
<br><br>
<table border="1" cellpadding="8">
    <tr>
        <th>No</th><th>Nama</th><th>Email</th><th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($members)) {
        echo "<tr>
            <td>$no</td>
            <td>{$row['nama']}</td>
            <td>{$row['email']}</td>
            <td>
                <a href='form.php?id={$row['id']}'>Edit</a> |
                <a href='proses.php?hapus={$row['id']}' onclick=\"return confirm('Yakin hapus?')\">Hapus</a>
            </td>
        </tr>";
        $no++;
    }
    ?>
</table>
