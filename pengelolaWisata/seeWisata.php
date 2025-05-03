<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tempat Wisata</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .back-button {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #333;
            font-size: 18px;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        
        .back-button:hover {
            background-color: #e0e0e0;
        }
        
        .main-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .image-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-bottom: 20px;
        }
        
        .grid-image {
            width: 100%;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.3s;
        }
        
        .grid-image:hover {
            transform: scale(1.05);
        }
        
        .location-info {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        
        .location-name {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #2c3e50;
        }
        
        .location-type {
            font-size: 16px;
            color: #7f8c8d;
            margin-bottom: 10px;
        }
        
        .location-hours {
            font-size: 16px;
            margin-bottom: 10px;
        }
        
        .ticket-info {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }
        
        .ticket-item {
            margin-bottom: 8px;
        }
        
        .description {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        
        .description h2 {
            font-size: 20px;
            margin-bottom: 15px;
            color: #2c3e50;
        }
        
        .description p {
            text-align: justify;
        }
        
        .legal-document {
            text-align: center;
            margin-top: 20px;
        }
        
        .legal-document a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        
        .legal-document a:hover {
            background-color: #2980b9;
        }
        
        .divider {
            height: 1px;
            background-color: #eee;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Tombol Kembali -->
        <a href="javascript:history.back()" class="back-button">← Kembali</a>
        
        <!-- Foto Utama -->
        <img src="path_to_main_image.jpg" alt="Foto Utama Lokasi" class="main-image">
        
        <!-- Grid Foto -->
        <div class="image-grid">
            <img src="path_to_image1.jpg" alt="Foto 1" class="grid-image">
            <img src="path_to_image2.jpg" alt="Foto 2" class="grid-image">
            <img src="path_to_image3.jpg" alt="Foto 3" class="grid-image">
        </div>
        
        <!-- Informasi Lokasi -->
        <div class="location-info">
            <h1 class="location-name">Nama Lokasi</h1>
            <p class="location-type">Jenis Lokasi</p>
            <p class="location-hours">08:00 - 17:00</p>
            
            <div class="ticket-info">
                <p class="ticket-item"><strong>Harga Tiket:</strong> Rp 50.000</p>
                <p class="ticket-item"><strong>Kuota Tiket:</strong> 200 per hari</p>
            </div>
        </div>
        
        <!-- Deskripsi -->
        <div class="description">
            <h2>Deskripsi:</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet consequat mauris, id vestibulum velit. Nunc tincidunt, massa sit amet malesuada tristique, velit velit vulputate ex, quis interdum justo justo quis nisl.</p>
        </div>
        
        <!-- Divider -->
        <div class="divider"></div>
        
        <!-- Dokumen Legal -->
        <div class="legal-document">
            <p><strong>Nomor PIC:</strong> 1234567890</p>
            <a href="path_to_legal_document.pdf" target="_blank">View Legal Document</a>
        </div>
    </div>
</body>
</html>