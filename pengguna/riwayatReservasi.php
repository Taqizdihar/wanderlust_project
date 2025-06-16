<?php
include "config.php";

$ID = $_SESSION['user_id'];
function getTickets($conn, $ID, $statuses)
{
    $status_list = "'" . implode("','", $statuses) . "'";

    $sqlStatement = "SELECT tw.nama_lokasi, pw.nama_paket, fw.link_foto, t.tanggal_kunjungan, t.jumlah_tiket, t.status
            FROM transaksi t JOIN tempatwisata tw ON t.tempatwisata_id = tw.tempatwisata_id
            JOIN paketwisata pw ON t.paket_id = pw.paket_id
            LEFT JOIN fotowisata fw ON t.tempatwisata_id = fw.tempatwisata_id AND fw.urutan = 1
            WHERE t.wisatawan_id = '$ID' AND t.status IN ($status_list)
            ORDER BY t.tanggal_kunjungan DESC";

    $query = mysqli_query($conn, $sqlStatement);
    
    $tiket = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $tiket[] = $row;
    }
    return $tiket;
}

$active_tickets = getTickets($conn, $ID, ['pending', 'dipakai']);
$history_tickets = getTickets($conn, $ID, ['dibayarkan']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tickets</title>
    <link rel="stylesheet" href="pengguna/cssPengguna/riwayatReservasi.css">
</head>
<body>
    <?php include "pengguna/Header.php";?>
    <div class="main-container">
        <h1>My Tickets</h1>

        <section id="active-tickets">
            <h2>Ticket List</h2>
            <div class="tickets-list">
                <?php if (count($active_tickets) > 0) : ?>
                    <?php foreach ($active_tickets as $ticket) : ?>
                        <div class="ticket-card">
                            <img src="pemilikWisata/foto/<?= $ticket['link_foto']; ?>" alt="Foto Wisata" class="ticket-image">
                            <div class="ticket-content">
                                <h3><?= $ticket['nama_lokasi'] ?></h3>
                                <p><?= $ticket['nama_paket'] ?></p>
                                <p>Visit Date: <span class="ticket-info"><?= date('d F Y', strtotime($ticket['tanggal_kunjungan'])) ?></span></p>
                                <p>Ticket: <span class="ticket-info"><?= $ticket['jumlah_tiket'] ?> ticket(s)</span></p>
                                <span class="ticket-status status-<?= $ticket['status'] ?>"><?= $ticket['status'] ?></span>
                            </div>
                            <div class="ticket-buttons">
                              <a href="">Download Ticket</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="no-tickets">You don't have any ticket yet! Find some wonders and get the tickets!</p>
                <?php endif; ?>
            </div>
        </section>

        <section id="history-tickets">
            <h2>Ticket History</h2>
            <div class="tickets-list">
                <?php if (count($history_tickets) > 0) : ?>
                    <?php foreach ($history_tickets as $ticket) : ?>
                         <div class="ticket-card">
                            <img src="<?= $ticket['link_foto'] ?>" alt="Foto Wisata" class="ticket-image">
                            <div class="ticket-content">
                                <h3><?= $ticket['nama_lokasi'] ?></h3>
                                <p><?= $ticket['nama_paket'] ?></p>
                                <p>Visit Date: <span class="ticket-info"><?= date('d F Y', strtotime($ticket['tanggal_kunjungan'])) ?></span></p>
                                <p>Ticket: <span class="ticket-info"><?= $ticket['jumlah_tiket'] ?> ticket(s)</span></p>
                                <span class="ticket-status status-<?= $ticket['status'] ?>"><?= $ticket['status'] ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="no-tickets">There's no ticket here yet!</p>
                <?php endif; ?>
            </div>
        </section>
    </div>
    
    <?php include "pengguna/Footer.php";?>
</body>
</html>