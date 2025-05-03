<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Views</title>
    <style>
        .navbar {
    position: fixed;
    display: flex;
    width: 100%;
    background-color: #bf6115;
    color: #fff;
    padding: 15px;
    z-index: 999;
    top: 0;
    }

    .navbar h1 {
        margin: 0;
        font-size: 25px;
        display: inline-block;
        align-self: center;
    }

    .navbar img {
        height: auto;
        width: 200px;
        margin-right: 10px;
    }

    .navbar a {
        position: absolute;
        right: 20px;
        top: 25px;
        justify-content: flex-end;
        color: #fff;
        text-decoration: none;
        margin-right: 60px;
    }

    .navbar a i {
        font-size: 50px;
    }

    .sidebar {
        width: 200px;
        background-color: #434343;
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        padding-top: 120px;
        color: #fff;
    }

    .sidebar a {
        display: block;
        color: #ccc;
        padding: 15px 20px;
        text-decoration: none;
        font: 20px "verdana";
    }

    .sidebar a:hover {
        background-color: #292929;
        color: #fff;
    }
    </style>
</head>
<body>
    <div class="navbar">
        <img src="Umum/photos/Wanderings for Wonders side white.png" alt="Wanderlust Logo">
        <h1>| Partner Dashboard</h1>
        <a href="indeks.php?page=profilPemilikWisata"><i class="fa-regular fa-circle-user"></i></a> 
    </div>

    <div class="sidebar">
        <a href="indeks.php?page=dashboardWisata">Dashboard</a>
        <a href="indeks.php?page=daftarWisata">Properties</a>
        <a href="notFound.php">Orders</a>
        <a href="notFound.php">Help Centre</a>
        <a href="indeks.php?page=logout" onclick="return confirm('Are you sure to Log Out?')">Log Out</a>
    </div>
</body>
</html>