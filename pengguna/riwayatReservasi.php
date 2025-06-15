<?php
include "config.php";

$ID = $_SESSION['user_id'];
function getTickets($conn, $ID, $statuses)
{
    // Mengubah array status menjadi string untuk klausa IN di SQL
    $status_list = "'" . implode("','", $statuses) . "'";

    $sql = "SELECT
                tw.nama_lokasi,
                pw.nama_paket,
                fw.link_foto,
                t.tanggal_kunjungan,
                t.jumlah_tiket,
                t.status
            FROM transaksi t
            JOIN tempatwisata tw ON t.tempatwisata_id = tw.tempatwisata_id
            JOIN paketwisata pw ON t.paket_id = pw.paket_id
            LEFT JOIN fotowisata fw ON t.tempatwisata_id = fw.tempatwisata_id AND fw.urutan = 1
            WHERE t.wisatawan_id = ? AND t.status IN ($status_list)
            ORDER BY t.tanggal_kunjungan DESC";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("i", $ID);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $tickets = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tickets[] = $row;
        }
    }
    $stmt->close();
    return $tickets;
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
    <link rel="stylesheet" href="pemilikWisata/cssWisata/riwayatReservasi.css">
</head>
<body>

    <div class="main-container">
        <h1>Tiket Wisata Saya</h1>

        <!-- Bagian Tiket Aktif -->
        <section id="active-tickets">
            <h2>Tiket Anda</h2>
            <div class="tickets-list">
                <?php if (count($active_tickets) > 0) : ?>
                    <?php foreach ($active_tickets as $ticket) : ?>
                        <div class="ticket-card">
                            <img src="<?= htmlspecialchars($ticket['link_foto'] ?: 'https://placehold.co/180x150/007bff/FFFFFF?text=Wisata') ?>" alt="Foto Wisata" class="ticket-image" onerror="this.onerror=null;this.src='https://placehold.co/180x150/cccccc/FFFFFF?text=Error';">
                            <div class="ticket-content">
                                <h3><?= htmlspecialchars($ticket['nama_lokasi']) ?></h3>
                                <p><?= htmlspecialchars($ticket['nama_paket']) ?></p>
                                <p>Tanggal Kunjungan: <span class="ticket-info"><?= date('d F Y', strtotime($ticket['tanggal_kunjungan'])) ?></span></p>
                                <p>Jumlah: <span class="ticket-info"><?= htmlspecialchars($ticket['jumlah_tiket']) ?> tiket</span></p>
                                <span class="ticket-status status-<?= htmlspecialchars($ticket['status']) ?>"><?= htmlspecialchars($ticket['status']) ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="no-tickets">Anda tidak memiliki tiket yang sedang aktif atau menunggu pembayaran.</p>
                <?php endif; ?>
            </div>
        </section>

        <!-- Bagian Riwayat Tiket -->
        <section id="history-tickets">
            <h2>Riwayat Tiket</h2>
            <div class="tickets-list">
                <?php if (count($history_tickets) > 0) : ?>
                    <?php foreach ($history_tickets as $ticket) : ?>
                         <div class="ticket-card">
                            <img src="<?= htmlspecialchars($ticket['link_foto'] ?: 'https://placehold.co/180x150/6c757d/FFFFFF?text=Wisata') ?>" alt="Foto Wisata" class="ticket-image" onerror="this.onerror=null;this.src='https://placehold.co/180x150/cccccc/FFFFFF?text=Error';">
                            <div class="ticket-content">
                                <h3><?= htmlspecialchars($ticket['nama_lokasi']) ?></h3>
                                <p><?= htmlspecialchars($ticket['nama_paket']) ?></p>
                                <p>Tanggal Kunjungan: <span class="ticket-info"><?= date('d F Y', strtotime($ticket['tanggal_kunjungan'])) ?></span></p>
                                <p>Jumlah: <span class="ticket-info"><?= htmlspecialchars($ticket['jumlah_tiket']) ?> tiket</span></p>
                                <span class="ticket-status status-<?= htmlspecialchars($ticket['status']) ?>"><?= htmlspecialchars($ticket['status']) ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="no-tickets">Tidak ada riwayat tiket yang ditemukan.</p>
                <?php endif; ?>
            </div>
        </section>

    </div>

</body>
</html>
