<?php
session_start();
include "views/header.php";
?>
<main>
<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        $allowed_pages = ['about','mahasiswa','addmahasiswa','editmahasiswa','login'];
        
        if (in_array($page, $allowed_pages)) {
            include "pages/$page.php";
        } else {
            echo "<h2>404 - Halaman tidak ditemukan</h2>";
        }
    } else {
        include "dashboardUmum.php";
    }
?>
</main>
<?php
include "Views/sidebar.php";
include "views/footer.php";  
?>
