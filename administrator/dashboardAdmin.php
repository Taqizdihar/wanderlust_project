<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Admin</title>
  <style>
    body {
      margin: 0;
      font-family: "Segoe UI", sans-serif;
      background: #f4f6f9;
    }

    .wrapper {
      display: flex;
      min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
      width: 240px;
      background-color: #2c3e50;
      color: white;
      padding: 20px 15px;
      display: flex;
      flex-direction: column;
    }

    .sidebar h2 {
      font-size: 20px;
      margin-bottom: 20px;
    }

    .sidebar ul {
      list-style: none;
      padding: 0;
    }

    .sidebar li {
      margin-bottom: 15px;
    }

    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      padding: 10px;
      border-radius: 5px;
    }

    .sidebar a:hover {
      background-color: #1abc9c;
    }

    /* Main Content */
    .main {
      flex: 1;
      padding: 30px;
    }

    .main h1 {
      margin-bottom: 20px;
      font-size: 24px;
    }

    table {
      width: 100%;
      background: white;
      border-collapse: collapse;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    thead {
      background-color: #34495e;
      color: white;
    }

    td, th {
      padding: 15px;
      border: 1px solid #ddd;
      text-align: left;
    }

    button.acc {
      background-color: #2ecc71;
      border: none;
      color: white;
      padding: 7px 12px;
      cursor: pointer;
      border-radius: 4px;
      margin-right: 5px;
    }

    button.tolak {
      background-color: #e74c3c;
      border: none;
      color: white;
      padding: 7px 12px;
      cursor: pointer;
      border-radius: 4px;
    }

    @media (max-width: 768px) {
      .wrapper {
        flex-direction: column;
      }

      .sidebar {
        width: 100%;
        flex-direction: row;
        overflow-x: auto;
      }

      .sidebar ul {
        display: flex;
      }

      .sidebar li {
        margin-right: 15px;
      }
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <aside class="sidebar">
      <h2>Halo,Admin</h2>
      <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Member</a></li>
        <li><a href="#">Monitor</a></li>
        <li><a href="#">Jejak</a></li>
        <li><a href="#">Pengaturan</a></li>
        <li><a href="#">ACC Pengolah Wisata</a></li>
      </ul>
    </aside>

    <main class="main">
      <h1>Daftar Pengajuan Pengolah Wisata</h1>
      <table>
        <thead>
          <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Nama Wisata</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Rina Kusuma</td>
            <td>rina@mail.com</td>
            <td>Curug Pelangi</td>
            <td>
              <button class="acc">ACC</button>
              <button class="tolak">Tolak</button>
            </td>
          </tr>
          <tr>
            <td>Andi Pratama</td>
            <td>andi@mail.com</td>
            <td>Pantai Biru</td>
            <td>
              <button class="acc">ACC</button>
              <button class="tolak">Tolak</button>
            </td>
          </tr>
        </tbody>
      </table>
    </main>
  </div>
</body>
</html>
