<?php
<<<<<<< HEAD
if (session_status() === PHP_SESSION_NONE) session_start();
include "config.php";
?>

<main>
<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    $pages_umum = ['login', 'signin', 'homeUmum', 'choice', 'logout'];
    $pages_pw = ['verifikasiEntitas', 'dashboardWisata', 'profilPemilikWisata', 'editProfilWisata', 'daftarWisata', 'addWisata', 'editWisata', 'deleteWisata', 'seeWisata', 'addPaket', 'daftarPaket', 'kelolaPaket', 'deletePaket'];
    $pages_owner_verif = ['acc', 'accpengolah', 'accproperti'];
    $pages_admin = ['acctransaksi', 'dashboardAdmin', 'pengolahStatus', 'propertiStatus', 'verifikasiTopUp', 'memberlist', 'member', 'accwisata'];
    $pages_wisatawan = ['Home', 'detailDestinasiWisata', 'reservasiTiket', 'Favorit', 'Pencarian', 'Profil', 'editProfil', 'Saldo', 'topUpSaldo', 'riwayatReservasi'];

    if (in_array($page, $pages_umum)) {
        include "Umum/$page.php";
    } elseif (in_array($page, $pages_pw)) {
        include "pemilikWisata/$page.php";
    } elseif (in_array($page, $pages_owner_verif)) {
        include "ownerverification/$page.php";
    } elseif (in_array($page, $pages_admin)) {
        include "administrator/$page.php";
    } elseif (in_array($page, $pages_wisatawan)) {
        include "pengguna/$page.php";
    } else {
        echo "<h2>404 - Halaman tidak ditemukan</h2>";
=======
session_start();
?>
<main>
<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        $pages_umum = ['login', 'signin', 'homeUmum', 'choice', 'logout'];
        $pages_pw = ['verifikasiEntitas', 'dashboardWisata', 'profilPemilikWisata', 'editProfilWisata', 'daftarWisata', 'addWisata', 'editWisata', 'deleteWisata', 'seeWisata', 'addPaket', 'daftarPaket', 'kelolaPaket', 'deletePaket'];
        $pages_admin = ['acc', 'accpengolah', 'accproperti', 'acctransaksi', 'dashboardAdmin', 'pengolahStatus', 'propertiStatus', 'verifikasiTopUp', 'memberlist', 'member', 'accwisata', 'transaksiverifikasi'];

        $pages_wisatawan = ['Home', 'detailDestinasiWisata', 'reservasiTiket', 'Favorit', 'Pencarian', 'Profil', 'editProfil', 'Saldo', 'topUpSaldo', 'riwayatReservasi'];
        
        if (in_array($page, $pages_umum)) {
            include "Umum/$page.php";
        } else if (in_array($page, $pages_pw)) {
            include "pemilikWisata/$page.php";
        } else if (in_array($page, $pages_admin)) {

            include "administrator/$page.php"; 
        } else if (in_array($page, $pages_wisatawan)) {
            include "pengguna/$page.php";
        } else {
            echo "<h2>404 - Halaman tidak ditemukan</h2>";
        }
    } else {
        // Halaman default jika tidak ada parameter 'page'
        include "Umum/homeUmum.php";
>>>>>>> 7302301b496f3c305bbe7fc333a582bd99dcc3a5
    }
} else {
    include "Umum/homeUmum.php";
}
?>
</main>