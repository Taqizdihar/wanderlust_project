<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <style>
        .footer {
        background-color: #0077cc;
        color: white;
        padding: 24px;
        display: flex;
        flex-direction: column;
        gap: 16px;
        }

        .footer-top {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        align-items: flex-start;
        width: 100%;
        }

        .footer-left {
        display: flex;
        align-items: center;
        gap: 10px;
        }

        .footer-logo {
        display: flex;
        align-items: center;
        gap: 10px;
        }

        .logo-img {
            width: 60px;
            height: 60px;
            border-radius: 100%;
        }

        .footer-links {
        display: grid;
        grid-template-columns: repeat(3, auto);
        gap: 12px 32px;
        text-align: left;
        justify-content: flex-end;
        }

        .footer-links a {
        color: white;
        text-decoration: none;
        font-size: 14px;
        }

        .footer-center {
        width: 100%;
        text-align: center;
        font-size: 14px;
        }
    </style>
</head>
<body>
    <footer class="footer">
    <div class="footer-top">
      <div class="footer-left">
        <div class="footer-logo">
          <img src="Umum/foto/Wanderlust Logo Plain.png" alt="Wanderlust Logo" class="logo-img">
          <span class="logo-text">Wanderlust</span>
        </div>
      </div>
      <div class="footer-links">
        <a href="#">Tentang Kami</a>
        <a href="#">Kontak Kami</a>
        <a href="#">FAQs</a>
        <a href="#">Komunitas</a>
        <a href="#">Tips & Tik</a>
        <a href="#">Promo</a>
        <a href="#">Profil</a>
        <a href="#">Agenda</a>
        <a href="#">Home</a>
      </div>
    </div>
    <div class="footer-center">
      Copyright © 2025 Wanderlust. All rights reserved
    </div>
  </footer>
</body>
</html>