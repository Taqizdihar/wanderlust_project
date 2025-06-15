<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<main>

// Sisa kode...

?>
<main>
<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        $pages_umum = ['login', 'signin', 'homeUmum', 'choice', 'logout'];
        $pages_pw = ['verifikasiEntitas', 'dashboardWisata', 'profilPemilikWisata', 'editProfilWisata', 'daftarWisata', 'addWisata', 'editWisata', 'deleteWisata', 'seeWisata', 'addPaket', 'daftarPaket', 'kelolaPaket', 'deletePaket'];
        $pages_owner_verif = ['acc', 'accpengolah', 'accproperti']; // <-- Pindahkan ke array tersendiri
        $pages_admin = ['acctransaksi', 'dashboardAdmin', 'pengolahStatus', 'propertiStatus', 'verifikasiTopUp', 'memberlist', 'member', 'accwisata'];
        $pages_wisatawan = ['Home', 'detailDestinasiWisata', 'reservasiTiket', 'Favorit', 'Pencarian', 'Profil', 'editProfil', 'Saldo', 'topUpSaldo', 'riwayatReservasi'];
        
        if (in_array($page, $pages_umum)) {
            include "Umum/$page.php";
        } else if (in_array($page, $pages_pw)) {
            include "pemilikWisata/$page.php";
        } else if (in_array($page, $pages_owner_verif)) {
            include "ownerverification/$page.php";
        } else if (in_array($page, $pages_admin)) {
            include "administrator/$page.php";
        } else if (in_array($page, $pages_wisatawan)) {
            include "pengguna/$page.php";
        } else {
            echo "<h2>404 - Halaman tidak ditemukan</h2>";
        }
    } else {
        include "Umum/homeUmum.php";
    }
?>
</main>
