<?php
session_start();
include "config.php";
?>

<main>
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        $pages_umum = ['login', 'signin', 'homeUmum', 'choice', 'logout'];
        $pages_pw = ['verifikasiEntitas', 'dashboardWisata', 'profilPemilikWisata', 'editProfilWisata', 'daftarWisata', 'addWisata', 'editWisata', 'deleteWisata', 'seeWisata', 'addPaket', 'daftarPaket', 'kelolaPaket', 'deletePaket'];
        $pages_admin = ['verifikasi_transaksi', 'transaksiverifikasi', 'acctransaksi', 'dashboardAdmin', 'pengolahStatus', 'propertiStatus', 'verifikasiTopUp', 'memberlist', 'member', 'accwisata', 'acc', 'accpengolah', 'accproperti'];
        $pages_wisatawan = ['Home', 'detailDestinasiWisata', 'reservasiTiket', 'Favorit', 'Pencarian', 'Profil', 'editProfil', 'Saldo', 'topUpSaldo', 'riwayatReservasi'];

    if (in_array($page, $pages_umum)) {
        include "Umum/$page.php";
    } elseif (in_array($page, $pages_pw)) {
        include "pemilikWisata/$page.php";
    } elseif (in_array($page, $pages_admin)) {
        include "administrator/$page.php";
    } elseif (in_array($page, $pages_wisatawan)) {
        include "pengguna/$page.php";
    } else {
        echo "<h2>404 - Halaman tidak ditemukan</h2>";
    }

}    ?>
</main>