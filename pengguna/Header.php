<?php
include "config.php";

$ID = $_SESSION['user_id'];

$sqlStatement = "SELECT * FROM user WHERE user_id = '$ID'";
$query = mysqli_query($conn, $sqlStatement);
$fotoProfil = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <style>
    .main-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #0077cc;
    padding: 10px 20px;
    color: #333;
    font-family: 'MuseoModerno', sans-serif;
    }
    a {
        text-decoration: none;
    }
    .logo-container {
    display: flex;
    align-items: center;
    }
    .logo {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 10px;
    }
    .logo-text .title {
    font-weight: bold;
    font-size: 18px;
    color: white;
    }
    .logo-text .subtitle {
    font-size: 10px;
    color: #fff;
    }
    .search-bar {
    position: relative;
    flex-grow: 1;
    margin: 0 30px;
    max-width: 400px;
    }
    .search-bar input {
    width: 100%;
    padding: 10px 35px 10px 10px;
    border: none;
    border-radius: 8px;
    font-size: 14px;
    }
    .search-icon {
    position: absolute;
    right: 10px;
    top: 10px;
    pointer-events: none;
    color: #555;
    }
    .nav-links {
    display: flex;
    align-items: center;
    gap: 20px;
    }
    .nav-links a {
    text-decoration: none;
    color: #f9f9f9;
    font-weight: bold;
    }
    .profile-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    }
    </style>
</head>
<body>
    <header class="main-header">
        <a href="indeks.php?page=Home">
            <div class="logo-container">
                <img src="Umum/foto/Wanderlust Logo Plain.png" alt="Wanderlust Logo" class="logo">
                <div class="logo-text">
                    <div class="title">Wanderlust</div>
                    <div class="subtitle">WANDERINGS FOR WONDERS</div>
                </div>
            </div>
        </a>

        <div class="search-bar">
            <form action="indeks.php" method="GET">
                <input type="hidden" name="page" value="Pencarian">
                <input type="text" placeholder="Search wonder..." name="kataKunci">
            </form>
        </div>

        <nav class="nav-links">
            <a href="notFound.php">My Tickets</a>
            <a href="indeks.php?page=Favorit">Bookmark</a>
            <a href="notFound.php">Rating</a>
            <a href="indeks.php?page=Profil">
                <img src="pengguna/foto/<?= $fotoProfil['foto_profil']?>" alt="Profile Picture" class="profile-icon">
            </a>
        </nav>

    </header>
</body>
</html>