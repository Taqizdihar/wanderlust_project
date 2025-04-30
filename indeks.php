<?php
session_start();
?>
<main>
<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        $allowed_pages = ['login', 'signin', 'homeUmum'];
        
        if (in_array($page, $allowed_pages)) {
            include "Umum/$page.php";
        } else {
            echo "<h2>404 - Halaman tidak ditemukan</h2>";
        }
    } else {
        include "Umum/homeUmum.php";
    }
?>
</main>
