<?php
// Simulasi data user untuk tampilan
$user = [
    'nama' => 'John Doe',
    'foto' => 'user.jpg'
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hapus Akun</title>
    <link rel="stylesheet" href="cssPengguna/Profil.css">
</head>

<body>
    <div class="header">
        <div class="logo">Wanderlust</div>
        <input type="text" class="search-bar" placeholder="Search...">
        <div class="nav-options">
            <a href="#">Option 3</a>
            <a href="#">Option 2</a>
            <a href="#">Option 1</a>
        </div>
        <div class="user-avatar">
            <img src="<?= $user['foto']; ?>" alt="User">
        </div>
    </div>

    <div class="profile-container">
        <div class="sidebar">
            <img src="../Umum/photos/Images/Michael I Roma.jpg"<?= $user['foto']; ?>" alt="Profile" class="profile-pic">
            <button class="edit-btn">Edit Profil</button>
            <ul class="menu-options">
                <li>Option 1</li>
                <li>Option 2</li>
                <li>Option 3</li>
                <li>Option 4</li>
            </ul>
        </div>

        <div class="profile-card">
            <h2>Delete Your Account</h2>
            <p>
                Deleting your account will permanently erase all of your data in this account. 
                The data include your balance, your history, your messages, et cetera. 
                Delete your account if you really have nothing to do with this account anymore.
            </p>

            <form method="POST">
                <button type="submit" class="btn" style="margin-top: 20px;">
                    I understand the risk and I want to proceed deleting my account permanently
                </button>
            </form>
        </div>
    </div>

    <div class="footer">
        <div class="footer-logo">Wanderlust</div>
        <div class="footer-links">
            <a href="#">Tentang Kami</a>
            <a href="#">Kontak Kami</a>
            <a href="#">FAQs</a>
            <a href="#">Komunitas</a>
            <a href="#">Tips & Trick</a>
            <a href="#">Promo</a>
            <a href="#">Profil</a>
            <a href="#">Agenda</a>
            <a href="#">Home</a>
        </div>
        <div>&copy; 2025 Wanderlust. All rights reserved</div>
    </div>
</body>

</html>