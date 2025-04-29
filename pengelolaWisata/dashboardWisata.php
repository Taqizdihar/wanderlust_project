<?php
session_start();

// Contoh validasi login
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }

        .navbar {
            background-color: #333;
            color: #fff;
            padding: 15px;
        }

        .navbar h1 {
            margin: 0;
            font-size: 20px;
            display: inline-block;
        }

        .navbar a {
            float: right;
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
            font-size: 16px;
        }

        .sidebar {
            width: 200px;
            background-color: #222;
            position: fixed;
            top: 50px;
            bottom: 0;
            left: 0;
            padding-top: 20px;
            color: #fff;
        }

        .sidebar a {
            display: block;
            color: #ccc;
            padding: 10px 20px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #444;
            color: #fff;
        }

        .main {
            margin-left: 220px;
            padding: 20px;
        }

        .card {
            background-color: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 1px 1px 5px rgba(0,0,0,0.1);
        }

        .card h3 {
            margin: 0;
            margin-bottom: 10px;
        }

        .stat {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

<div class="navbar">
    <h1>Dashboard Admin</h1>
    <a href="logout.php">Logout</a>
</div>

<div class="sidebar">
    <a href="#">Dashboard</a>
    <a href="#">Pengguna</a>
    <a href="#">Laporan</a>
    <a href="#">Pengaturan</a>
</div>

<div class="main">
    <h2>Selamat Datang, Admin!</h2>

    <div class="card">
        <h3>Total Pengguna</h3>
        <div class="stat">1200</div>
    </div>

    <div class="card">
        <h3>Laporan Hari Ini</h3>
        <div class="stat">85</div>
    </div>

    <div class="card">
        <h3>Pesan Masuk</h3>
        <div class="stat">14</div>
    </div>
</div>

</body>
</html>
