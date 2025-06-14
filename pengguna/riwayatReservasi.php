<?php
include "config.php";

$ID = $_SESSION['user_id'];

$sqlStatement = "SELECT transaksi.*, paketwisata.*, tempatwisata.*, fotowisata.link_foto FROM transaksi JOIN
    paketwisata ON transaksi.paket_id = paketwisata.paket_id JOIN tempatwisata ON paketwisata.tempatwisata_id = tempatwisata.tempatwisata_id
    JOIN fotowisata ON tempatwisata.tempatwisata_id = fotowisata.tempatwisata_id AND fotowisata.urutan = 1";
$query = mysqli_query($conn, $sqlStatement);

$tiket = [];
while ($row = mysqli_fetch_assoc($query)) {
    $tiket[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Tickets</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="pengguna/cssPengguna/riwayatReservasi.css">
</head>
<body>
<?php include "pengguna/Header.php";?>

<h1>My Tickets</h1>

<div class="container">
  <div class="column">
    <h2>Tickets</h2>
    <div class="ticket-card">
      <img src="beach.jpg" alt="Beach Image">
      <div class="ticket-info">
        <h3>Beach Tour</h3>
        <p>Santolo Beach</p>
        <div class="status-badge">active</div>
        <p><i class="fa-solid fa-box info-icon"></i>Package: 2</p>
        <p><i class="fa-solid fa-calendar-days info-icon"></i>28/06/2025</p>
      </div>
      <button class="btn btn-download">Download</button>
    </div>
  </div>

  <div class="column">
    <h2>History</h2>
    <div class="ticket-card">
      <img src="beach.jpg" alt="Beach Image">
      <div class="ticket-info">
        <h3>Beach Tour</h3>
        <p>Rahong Beach</p>
        <p><i class="fa-solid fa-box info-icon"></i>Package: 2</p>
        <p><i class="fa-solid fa-calendar-days info-icon"></i>28/06/2025</p>
      </div>
      <button class="btn btn-details">Details</button>
    </div>
  </div>
</div>

<?php include "pengguna/Footer.php";?>

</body>
</html>
