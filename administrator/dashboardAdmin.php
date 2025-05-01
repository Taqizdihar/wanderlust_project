<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Materio Style Admin Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    body {
      display: flex;
      background: #f5f7fa;
    }

    .sidebar {
      width: 240px;
      background-color: #6f42c1;
      color: #fff;
      min-height: 100vh;
      padding-top: 20px;
    }

    .sidebar h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    .sidebar a {
      display: flex;
      align-items: center;
      padding: 15px 20px;
      text-decoration: none;
      color: #fff;
      transition: background 0.2s;
    }

    .sidebar a:hover {
      background-color: #5936a2;
    }

    .sidebar a i {
      margin-right: 10px;
    }

    .main {
      flex: 1;
      padding: 20px;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #fff;
      padding: 15px 20px;
      border-radius: 10px;
      margin-bottom: 20px;
      box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);
    }

    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
    }

    .card {
      background: #fff;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);
    }

    .card h3 {
      font-size: 18px;
      margin-bottom: 10px;
      color: #333;
    }

    .card .value {
      font-size: 24px;
      font-weight: bold;
      color: #6f42c1;
    }

    .card .label {
      color: #666;
      font-size: 14px;
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h2>Materio</h2>
    <a href="#"><i>🏠</i> Dashboard</a>
    <a href="#"><i>⚙️</i> Account Settings</a>
    <a href="#"><i>🔐</i> Login</a>
    <a href="#"><i>📝</i> Register</a>
    <a href="#"><i>❌</i> Error</a>
  </div>

  <div class="main">
    <div class="header">
      <h2>Dashboard</h2>
      <div>👤 Halo, Admin</div>
    </div>

    <div class="cards">
      <div class="card">
        <h3>Congratulations John! 🏆</h3>
        <div class="value">$42.8k</div>
        <div class="label">Best seller of the month</div>
      </div>

      <div class="card">
        <h3>Statistics</h3>
        <div class="label">Sales: <strong>245k</strong></div>
        <div class="label">Customers: <strong>12.5k</strong></div>
        <div class="label">Products: <strong>1.54k</strong></div>
        <div class="label">Revenue: <strong>$88k</strong></div>
      </div>

      <div class="card">
        <h3>Total Earnings</h3>
        <div class="value">$24,895</div>
        <div class="label">Compared to $84,325 last year</div>
      </div>

      <div class="card">
        <h3>Total Profit</h3>
        <div class="value">$25.6k</div>
        <div class="label">+42% Weekly Profit</div>
      </div>

      <div class="card">
        <h3>Refunds</h3>
        <div class="value">$78</div>
        <div class="label">-15% Past Month</div>
      </div>
    </div>
  </div>

</body>
</html>
