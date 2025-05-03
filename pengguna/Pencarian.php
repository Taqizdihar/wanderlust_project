<?php
$destinasi = [
    [
        'nama' => 'Dusun Bambu Lembang',
        'lokasi' => 'Bandung',
        'gambar' => 'uploads/bandung1.jpg',
        'harga_normal' => 150000,
        'harga_diskon' => 90000,
        'rating' => 4.8,
        'ulasan' => 210,
        'label' => 'Promo'
    ],
    [
        'nama' => 'Farmhouse Susu Lembang',
        'lokasi' => 'Lembang, Bandung',
        'gambar' => 'uploads/bandung2.jpg',
        'harga_normal' => 100000,
        'harga_diskon' => 65000,
        'rating' => 4.5,
        'ulasan' => 300,
        'label' => ''
    ],
    [
        'nama' => 'Orchid Forest Cikole',
        'lokasi' => 'Cikole, Bandung',
        'gambar' => 'uploads/bandung3.jpg',
        'harga_normal' => 120000,
        'harga_diskon' => 75000,
        'rating' => 4.7,
        'ulasan' => 185,
        'label' => 'Diskon'
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Pencarian</title>
    <link rel="stylesheet" href="Pencarian.css">
</head>
<body>

<header class="header">
    <form class="search-bar" method="GET" action="Pencarian.php">
        <select class="select-destinasi" name="kategori">
            <option>Pilih destinasi</option>
        </select>
        <input type="text" class="search-input" name="q" placeholder="Cari destinasi...">
        <button type="submit">Cari</button>
    </form>
</header>

<main class="main-content">
    <div class="section-title">
        <h2>Menampilkan aktivitas dengan "Bandung"</h2>
        <div class="filter">
            <label>Urutkan dari:</label>
            <select>
                <option selected>Paling Relevan</option>
            </select>
        </div>
    </div>

    <div class="card-container">
        <?php foreach ($destinasi as $item): ?>
            <div class="card">
                <img src="<?= $item['gambar'] ?>" alt="<?= htmlspecialchars($item['nama']) ?>">
                <?php if (!empty($item['label'])): ?>
                    <span class="badge sale"><?= htmlspecialchars($item['label']) ?></span>
                <?php endif; ?>
                <div class="card-info">
                    <p class="lokasi"><?= htmlspecialchars($item['lokasi']) ?></p>
                    <h3><?= htmlspecialchars($item['nama']) ?></h3>
                    <p class="harga">
                        <del>Rp <?= number_format($item['harga_normal']) ?></del>
                        <span class="harga-diskon">Rp <?= number_format($item['harga_diskon']) ?></span>
                    </p>
                    <p class="rating">
                        ⭐ <?= htmlspecialchars($item['rating']) ?> (<?= htmlspecialchars($item['ulasan']) ?> review)
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

</body>
</html>