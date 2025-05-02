<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <style>
    body { margin: 0; font-family: sans-serif; background: #f4f6f9; }
    .wrapper { display: flex; min-height: 100vh; }
    .sidebar {
      width: 240px; background-color: #2c3e50;
      color: white; padding: 20px;
    }
    .sidebar h2 { font-size: 20px; margin-bottom: 20px; }
    .sidebar ul { list-style: none; padding: 0; }
    .sidebar li { margin-bottom: 15px; }
    .sidebar a {
      color: white; text-decoration: none;
      padding: 10px; display: block; border-radius: 5px;
    }
    .sidebar a:hover { background-color: #1abc9c; }
    .main { flex: 1; padding: 30px; }
  </style>
</head>
<body>
  <div class="wrapper">
    <aside class="sidebar">
      <h2>Admin Panel</h2>
      <ul>
        <li><a href="index.php">Dashboard</a></li>
        <li><a href="acc.php">ACC Pengolah Wisata</a></li>
        <li><a href="#">Pengaturan</a></li>
      </ul>
    </aside>
    <main class="main">
      <h1>Selamat Datang di Dashboard</h1>
      <p>Silakan pilih menu di samping untuk mengelola sistem wisata.</p>
    </main>
  </div>
</body>
</html>
