<?php
$data = [
    "email" => "faizsn@gmail.com",
    "telepon" => "081234567890",
    "tanggal_lahir" => "2005-04-04",
    "jenis_kelamin" => "Laki-laki",
    "alamat" => "Ciamis, Jawa Barat",
    "preferensi" => "Pantai, Pegunungan"
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="Profil.css">
</head>
<body>

    <!-- Header -->
    <header class="main-header">
        <div class="logo-container">
            <img src="../Umum/photos/Wanderlust Logo Plain.png" alt="Logo" class="logo">
            <div class="logo-text">
                <div class="title">Wanderlust</div>
                <div class="subtitle">WANDERINGS FOR WONDERS</div>
            </div>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
        </div>
        <nav class="nav-links">
            <a href="#">Opsi 1</a>
            <a href="#">Opsi 2</a>
            <a href="#">Favorit</a>
            <div class="profile-icon">👤</div>
        </nav>
    </header>

    <!-- Form Edit Profil -->
    <section class="profil-container">
        <div class="profil-card">
            <img src="default-profile.png" alt="Foto Profil">
            <h2>Edit Profil</h2>
            <form action="SimpanEditProfil.php" method="POST">
                <table class="profil-table">
                    <tr>
                        <th><label for="email">Email:</label></th>
                        <td><input type="email" id="email" name="email" value="<?= $data['email'] ?>" required></td>
                    </tr>
                    <tr>
                        <th><label for="telepon">Telepon:</label></th>
                        <td><input type="text" id="telepon" name="telepon" value="<?= $data['telepon'] ?>" required></td>
                    </tr>
                    <tr>
                        <th><label for="tanggal_lahir">Tanggal Lahir:</label></th>
                        <td><input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>" required></td>
                    </tr>
                    <tr>
                        <th><label for="jenis_kelamin">Jenis Kelamin:</label></th>
                        <td>
                            <select id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                <option value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="alamat">Alamat:</label></th>
                        <td><input type="text" id="alamat" name="alamat" value="<?= $data['alamat'] ?>" required></td>
                    </tr>
                    <tr>
                        <th><label for="preferensi">Preferensi Destinasi:</label></th>
                        <td><input type="text" id="preferensi" name="preferensi" value="<?= $data['preferensi'] ?>" required></td>
                    </tr>
                </table>
                <button type="submit" class="edit-button">Simpan Perubahan</button>
            </form>
        </div>
    </section>

    <footer>
  <div class="footer-container">
    <div class="footer-logo">
      <img src="../Umum/photos/Wanderlust Logo Plain.png" height="70" width="70" alt="Wanderlust Logo"/>
      <div>
        <h5>Wanderlust <span style="display: block; font: 15px 'Concert One', sans-serif;">WANDERINGS for Wonders</span></h5>
      </div>
    </div>
    <div class="footbar">
      <table>
        <tr>
          <td><a href="AboutUs.php">Tentang Kami</a></td>
          <td><a href="Komunitas.php">Komunitas</a></td>
          <td><a href="Profil.php">Profil</a></td>
        </tr>
        <tr>
          <td><a href="ContactUs.php">Kontak Kami</a></td>
          <td><a href="Tips.php">Tips & Trick</a></td>
          <td><a href="Agenda.php">Agenda</a></td>
        </tr>
        <tr>
          <td><a href="FAQs.php">FAQs</a></td>
          <td><a href="Promo.php">Promo</a></td>
          <td><a href="Home.php">Home</a></td>
        </tr>
      </table>
    </div>
  </div>
  <p>Copyright © 2025 Wanderlust. All rights reserved</p>
</footer>

</body>
</html>