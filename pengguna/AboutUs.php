<?php
// aboutus.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert+One">
    <link rel="stylesheet" href="aboutus.css">
</head>

<body>
    <!-- Navbar/header -->
    <?php include 'navbar.php'; ?>
    <!-- Navbar/header -->

    <div class="tour-package-section">
        <div class="content">
            <h2>Paket Wisata Domestik</h2>
            <p>Jangan dirumah aja<br>Indonesia itu indah.<br>
                <strong>Ayo liburan bersama Wanderlust</strong><br>
                Kunjungi most affordable wisata di kota kesayangan anda.
            </p>
        </div>
    </div>

    <div class="services-container">
        <h1>PRODUK DAN LAYANAN KAMI</h1>
        <p>Rekomendasi pilihan produk dan layanan untuk perjalanan Anda</p>
        <div class="service-grid">
            <div class="service-card">
                <img src="Images/De Rocka.webp" alt="Tour">
                <div class="service-title">Tour</div>
            </div>
            <div class="service-card">
                <img src="Images/Pesawat.jpeg" alt="Tiket Pesawat">
                <div class="service-title">Tiket Pesawat</div>
            </div>
            <div class="service-card">
                <img src="Images/Vacation.jpeg" alt="Hotel">
                <div class="service-title">Paket Wisata</div>
            </div>
            <div class="service-card">
                <img src="Images/Concert2.webp" alt="Event">
                <div class="service-title">Event</div>
            </div>
            <div class="service-card">
                <img src="Images/Destination.jpeg" alt="Destinasi">
                <div class="service-title">Destinasi</div>
            </div>
            <div class="service-card">
                <img src="Images/Calendar.jpeg" alt="Agenda">
                <div class="service-title">Agenda</div>
            </div>
        </div>

        <!-- Section: Why Choose Us -->
        <div style="margin-top: 40px;">
            <h2 style="text-align: center; margin-bottom: 20px;">Kenapa pilih Wanderlust?</h2>
            <div class="agoda-reasons">
                <div class="reason-card">
                    <h3>300.000+ aktivitas</h3>
                    <p>Pesan tur atau atraksi apa saja dari seluruh dunia</p>
                </div>
                <div class="reason-card">
                    <h3>Cepat dan fleksibel</h3>
                    <p>Pesan beragam tiket aktivitas online tanpa ribet, dan bisa dibatalkan gratis!</p>
                </div>
                <div class="reason-card">
                    <h3>Pengalaman Traveling Terpadu</h3>
                    <p>Aktivitas tanpa ribet dan nikmati dukungan CS berkualitas & konsisten!</p>
                </div>
            </div>
        </div>

        <div class="container">
            <h1 class="title">Ulasan Pelanggan Menggunakan Pelayanan Wanderlust</h1>
            <p class="subtitle">BAGUS SEKALI ⭐⭐⭐⭐⭐</p>
            <div class="reviews">
                <?php
                $reviews = [
                    ["img" => "Images/Faiz.jpg", "name" => "Faiz Syafiq Nabily", "date" => "2024-04-17", "text" => "Jalan-jalan wisata dengan Nagan Tour memang nyaman dan menyenangkan dan memiliki banyak fitur sehingga merasa nyaman👍"],
                    ["img" => "Images/person1.jpg", "name" => "Aisyah Noviani", "date" => "2024-04-14", "text" => "Kedua kali tur Jogja pakai Wanderlust sangat puas dengan pelayanan yang baik dan ramah. Respon admin yang cepat."],
                    ["img" => "Images/person2.jpg", "name" => "Siti Amany", "date" => "2024-04-14", "text" => "Terima kasih buat mas Nopal yang on time jemput dan semua agenda bisa berjalan dengan lancar."],
                    ["img" => "Images/person4.jpg", "name" => "Audri Melina Muthi", "date" => "2024-04-14", "text" => "Terima kasih buat mas
