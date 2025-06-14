<?php
session_start();
?>

<main>
<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        $pages_umum = ['login', 'signin', 'homeUmum', 'choice', 'logout']; //untuk seluruh halaman Umum (Sebelum Login/Sign in)
        $pages_pw = ['verifikasiEntitas', 'dashboardWisata', 'profilPemilikWisata', 'editProfilWisata', 'daftarWisata', 'addWisata', 'editWisata', 'deleteWisata', 'seeWisata'];
        $pages_admin = ['acc', 'accwisata', 'accpengolah', 'acctransaksi', 'member' ,'dashboardAdmin', 'pengolahStatus', 'accproperti', 'propertiStatus'];
        $pages_wisatawan = ['Home', 'detailDestinasiWisata', 'reservasiTiket', 'Favorit', 'Pencarian', 'Profil'];
        
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
        include "Umum/homeUmum.php";
    }
?>
</main>
