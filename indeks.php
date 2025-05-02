<?php
session_start();
?>
<main>
<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        $pages_umum = ['login', 'signin', 'homeUmum', 'choice', 'logout'];
        $pages_pw = ['verifikasiEntitas', 'dashboardWisata', 'profilPemilikWisata', 'editProfilWisata', 'daftarWisata', 'addWisata', 'editWisata'];
        
        if (in_array($page, $pages_umum)) {
            include "Umum/$page.php";
        } else if (in_array($page, $pages_pw)) {
            include "pengelolaWisata/$page.php";
        } else {
            echo "<h2>404 - Halaman tidak ditemukan</h2>";
        }
    } else {
        include "Umum/homeUmum.php";
    }
?>
</main>
