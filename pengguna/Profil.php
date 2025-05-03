<?php
session_start();
$_SESSION['nama'] = $_SESSION['nama'] ?? 'Faiz Syafiq Nabily';
$_SESSION['email'] = $_SESSION['email'] ?? 'faizsn@gmail.com';
$_SESSION['telepon'] = $_SESSION['telepon'] ?? '081234567890';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil - Wanderlust</title>
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno&family=Concert+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Profil.css">
</head>
<body>

<header>
    <div class="header-content">
        <div class="header-logo">
            <a href="#">Wanderlust</a>
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="PemesananTiket.php">Pemesanan</a></li>
                <li><a href="Promo.php">Promo</a></li>
                <li><a href="Tips.php">Tips</a></li>
                <li><a href="Profil.php">Profil</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="profil-container">
    <div class="profil-card">
        <img src="img/user.jpg" alt="Foto Profil">
        <h2><?= htmlspecialchars($_SESSION['nama']) ?></h2>
        <p>Email: <?= htmlspecialchars($_SESSION['email']) ?></p>
        <p>Telepon: <?= htmlspecialchars($_SESSION['telepon']) ?></p>
        <a href="#" class="edit-button">Edit Profil</a>
    </div>
</main>

<footer>
    <div class="footer-logo">
        <h2>Wanderlust</h2>
    </div>
    <div class="footbar">
        <table>
            <tr>
                <td><a href="index.php">Beranda</a></td>
                <td><a href="PemesananTiket.php">Pemesanan</a></td>
                <td><a href="Promo.php">Promo</a></td>
                <td><a href="Tips.php">Tips</a></td>
                <td><a href="Profil.php">Profil</a></td>
            </tr>
        </table>
    </div>
</footer>

</body>
</html>