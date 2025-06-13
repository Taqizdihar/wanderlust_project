<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <style>
        footer {
        background-color: #0077cc;
        color: white;
        padding: 40px 20px 20px;
        text-align: center;
        }

        .footer-container {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
        }

        .footer-logo {
        display: flex;
        align-items: center;
        gap: 10px;
        }

        .footer-logo img {
        border-radius: 100%;
        }

        .footbar table {
        color: white;
        }

        .footbar a {
        text-decoration: none;
        color: #ccc;
        font-size: 0.9em;
        }

        .footbar a:hover {
        color: #fff;
        }
    </style>
</head>
<body>
    <footer>
        <div class="footer-container">
            <div class="footer-logo">
            <img src="Umum/foto/Wanderlust Logo Plain.png" height="70" width="70" alt="Wanderlust Logo"/>
            <div>
                <h5>Wanderlust <span style="display: block; font: 15px 'Concert One', sans-serif;">WANDERINGS FOR WONDERS</span></h5>
            </div>
            </div>
            <div class="footbar">
            <table>
                <tr>
                <td><a href="">Tentang Kami</a></td>
                <td><a href="Komunitas.php">Komunitas</a></td>
                <td><a href="Profil.php">Profil</a></td>
                </tr>
                <tr>
                <td><a href="ContactUs.php">Kontak Kami</a></td>
                <td><a href="Tips.php">Tips & Trick</a></td>
                <td><a href="Agenda.php">Agenda</a></td>
                </tr>
                <tr>
                <td><a href="FAQs.php">FAQs</a></td>
                <td><a href="Promo.php">Promo</a></td>
                <td><a href="Home.php">Home</a></td>
                </tr>
            </table>
            </div>
        </div>
        <p>Copyright © 2025 Wanderlust. All rights reserved</p>
    </footer>
</body>
</html>