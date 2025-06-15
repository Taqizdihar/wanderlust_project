<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f6f8fc;
      display: flex;
    }

    .sidebar {
      width: 250px;
      background-color: #1e4db7;
      color: white;
      height: 100vh;
      padding: 20px;
    }

    .sidebar-header p {
      margin: 0;
      font-size: 14px;
    }

    .sidebar-header h2 {
      margin: 5px 0 20px;
    }

    .sidebar ul {
      list-style: none;
      padding: 0;
    }

    .sidebar ul li {
      padding: 10px;
      cursor: pointer;
      font-size: 16px;
      display: flex;
      align-items: center;
      gap: 10px;
      border-radius: 8px;
    }

    .sidebar ul li.active,
    .sidebar ul li:hover {
      background-color: #0e3ca2;
    }

    .main-content {
      flex-grow: 1;
      padding: 20px;
    }

    .main-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: white;
      padding: 1rem 2rem;
      border-radius: 10px;
      margin-bottom: 20px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    .header-left {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .search-bar {
      display: flex;
      align-items: center;
      background-color: #f1f1f1;
      padding: 0.5rem 1rem;
      border-radius: 20px;
    }

    .search-bar input {
      border: none;
      background: none;
      outline: none;
      padding: 5px;
      width: 200px;
    }

    .header-right {
      display: flex;
      align-items: center;
      gap: 1.5rem;
    }

    .notif {
      position: relative;
    }

    .notif i {
      font-size: 1.2rem;
      color: #555;
    }

    .notif-dot {
      position: absolute;
      top: -5px;
      right: -5px;
      background: red;
      width: 8px;
      height: 8px;
      border-radius: 50%;
    }

    .profile-box {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .profile-icon {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
    }

    .profile-info {
      font-size: 14px;
    }

    .cards {
      display: flex;
      gap: 20px;
      margin-bottom: 30px;
    }

    .card {
      background-color: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.05);
      flex: 1;
    }

    .user-table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .user-table thead {
      background-color: #f1f1f1;
    }

    .user-table th, .user-table td {
      padding: 15px;
      text-align: left;
    }

    .role {
      padding: 5px 10px;
      border-radius: 12px;
      font-size: 12px;
    }

    .role.pw {
      background-color: #e3f5e1;
      color: #2c7a29;
    }

    .role.wis {
      background-color: #e1ecf5;
      color: #1769aa;
    }
  </style>
</head>
<body>

<div class="sidebar">
  <div class="sidebar-header">
    <p>Hi,Admin</p>
    <h2>Riska Dea Bakri</h2>
  </div>
  <ul>
    <li><i class="fas fa-tachometer-alt"></i> Dashboard</li>
    <li class="active"><i class="fas fa-check-double"></i> Owner Verification</li>
    <li><i class="fas fa-home"></i> Property Verification</li>
    <li><i class="fas fa-credit-card"></i> Transaction Verification</li>
    <li><i class="fas fa-users"></i> Member List</li>
    <li><i class="fas fa-sign-out-alt"></i> Log Out</li>
  </ul>
</div>

<div class="main-content">
  <header class="main-header">
    <div class="header-left">
      <h1>Dashboard</h1>
      <div class="search-bar">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="Search..." />
      </div>
    </div>
    <div class="header-right">
      <div class="notif">
        <i class="fas fa-bell"></i>
        <span class="notif-dot"></span>
      </div>
      <div class="profile-box">
        <img src="https://ui-avatars.com/api/?name=Riska+Dea+Bakri&background=1e4db7&color=fff" alt="Profile" class="profile-icon" />
        <div class="profile-info">
          <div class="profile-name">Riska Dea Bakri</div>
          <div class="profile-role">Admin</div>
        </div>
      </div>
    </div>
  </header>

  <div class="cards">
    <div class="card">
      <p>Total Properties</p>
      <h3>10</h3>
    </div>
    <div class="card">
      <p>Total Transactions</p>
      <h3>Unavailable</h3>
    </div>
  </div>

  <table class="user-table">
    <thead>
      <tr>
        <th>Email</th>
        <th>Role</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>chris@gmail.com</td>
        <td><span class="role pw">Pw</span></td>
      </tr>
      <tr>
        <td>maveen@gmail.com</td>
        <td><span class="role pw">Pw</span></td>
      </tr>
      <tr>
        <td>alnitah@gmail.com</td>
        <td><span class="role pw">Pw</span></td>
      </tr>
      <tr>
        <td>alniam@gmail.com</td>
        <td><span class="role pw">Pw</span></td>
      </tr>
      <tr>
        <td>relysian@gmail.com</td>
        <td><span class="role wis">Wisatawan</span></td>
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>
