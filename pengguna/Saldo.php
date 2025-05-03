<?php

  $saldo = [
    "total" => 0.00,
    "ditukar" => 0.00,
    "kedaluwarsa" => 0.00
  ];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Saldo Wanderlust</title>
  <link rel="stylesheet" href="saldo.css">
</head>
<body>
  <div class="container">
    <div class="header">
      <img src="https://cdn-icons-png.flaticon.com/512/854/854878.png" alt="Wanderlust Icon">
      <div>
        <h1>WanderlustPoints</h1>
        <div class="subtitle">Jelajahi dunia. Tukarkan pengalamanmu.</div>
      </div>
    </div>

    <div class="balance-info">
      <strong>Total poin tersedia:</strong>
      <span>(Rp 0) USD <?= number_format($saldo["total"], 2) ?></span>
    </div>
    <div class="balance-info">
      <strong>Sudah ditukar:</strong>
      <span>(Rp 0) USD <?= number_format($saldo["ditukar"], 2) ?></span>
    </div>
    <div class="balance-info">
      <strong>Kedaluwarsa:</strong>
      <span>(Rp 0) USD <?= number_format($saldo["kedaluwarsa"], 2) ?></span>
    </div>

    <div class="tabs">
      <div class="tab active">Tersedia</div>
      <div class="tab">Sudah Ditukar</div>
      <div class="tab">Kedaluwarsa</div>
    </div>

    <div class="tab-content">
      Tersedia: (Rp 0) USD <?= number_format($saldo["total"], 2) ?>
    </div>
  </div>
</body>
</html>