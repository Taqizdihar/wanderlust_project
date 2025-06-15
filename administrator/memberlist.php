<?php
include 'config.php';
$profile = ['nama' => 'Admin']; // atau ambil dari session

include 'viewsAdmin.php'; // hanya sidebar
?>
<div class="main-content">
    <h2>Daftar Member</h2>

    <?php
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Gagal mengambil data.";
    } else {
        echo "<table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Gender</th>
                <th>Tanggal Lahir</th>
                <th>Role</th>
                <th>Saldo</th>
            </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['user_id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['no_telepon']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['tanggal_lahir']}</td>
                <td>{$row['role']}</td>
                <td>{$row['saldo']}</td>
              </tr>";
        }

        echo "</table>";
    }
    ?>
</div>
