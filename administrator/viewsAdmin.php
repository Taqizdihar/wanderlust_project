<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Views Admin</title>
    <style>
    .sidebar {
    position: fixed;
    width: 200px;
    height: 100%;
    background-color: #333;
    color: white;
    padding: 20px;
    z-index: 999;
    top: 0;
    }

    #halo {
    font: 20px "verdana";
    margin-bottom: 10px;
    }
  
    .sidebar h2 {
    margin-top: 10px;
    margin-bottom: 40px;
    }

    .sidebar ul {
    list-style: none;
    padding: 0;
    }

    .sidebar ul li {
    margin-bottom: 10px;
    }

    .sidebar ul li a {
    color: white;
    text-decoration: none;
    display: block;
    padding: 10px;
    }

    .sidebar ul li a:hover {
    background-color: #555;
    }
    </style>
</head>
<body>
    <aside class="sidebar">
      <h2 id="halo">Hi, </h2>
      <h2><?= $profile['nama'];?></h2>
      <ul>
        <li><a href="indeks.php?page=dashboardAdmin">Dashboard</a></li>
        <li><a href="indeks.php?page=accpengolah">ACC Pengolah Wisata</a></li>
        <li><a href="indeks.php?page=accwisata">ACC Wisata</a></li>
        <li><a href="indeks.php?page=acctransaksi">ACC Transaksi</a></li>
        <li><a href="notFound.php">Daftar Member</a></li>
        <li><a href="indeks.php?page=logout" onclick="return confirm('Are you sure to Log Out?')">Log Out</a></li>
      </ul>
    </aside>
</body>
</html>