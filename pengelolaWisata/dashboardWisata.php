<?php
include "../config.php";

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="pengelolaWisata/cssWisata/dashboardWisata.css?v=1.0.4">
    <link rel="stylesheet" href="cssWisata/dashboardWisata.css?v=1.0.4">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
</head>
<body>

<div class="navbar">
    <img src="" alt="Wanderlust Logo">
    <h1>Partner Dashboard</h1>
    <a href="logout.php"><i class="fa-regular fa-circle-user"></i></a> 
</div>

<div class="sidebar">
    <a href="dashboardWisata.php">Dashboard</a>
    <a href="../notFound.php">Places</a>
    <a href="../notFound.php">Orders</a>
    <a href="../notFound.php">Help Centre</a>
    <a href="../notFound.php">Log Out</a>
</div>

<div class="main">
    <h2>Welcome, </h2>

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
