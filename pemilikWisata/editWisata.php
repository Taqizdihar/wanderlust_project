<?php
include "config.php";

$ID = $_SESSION['user_id'];

$tempatwisata_id = $_GET['tempatwisata_id'];

$getTempatWisata = "SELECT * FROM tempatwisata WHERE tempatwisata_id = '$tempatwisata_id'";
$QueryTempatWisata = mysqli_query($conn, $getTempatWisata);
$tempatWisata = mysqli_fetch_assoc($QueryTempatWisata);

$sqlGetFoto = "SELECT * FROM fotowisata WHERE tempatwisata_id = '$tempatwisata_id' ORDER BY urutan ASC";
$queryGetFoto = mysqli_query($conn, $sqlGetFoto);
$fotoTempatWisata = [];
while ($row = mysqli_fetch_assoc($queryGetFoto)) {
    $fotoTempatWisata[$row['urutan']] = $row;
}


if (isset($_POST['update'])) {
    $nama_lokasi = $_POST['nama_lokasi'];
    $alamat_lokasi = $_POST['alamat_lokasi'];
    $jenis_wisata = $_POST['jenis_wisata'];
    $waktu_buka = $_POST['waktu_buka'];
    $waktu_tutup = $_POST['waktu_tutup'];
    $deskripsi = $_POST['deskripsi'];
    $sumir = $_POST['sumir'];
    $nomor_pic = $_POST['nomor_pic'];

    $namaFileSuratIzin = $_POST['old_surat_izin'];
    if (isset($_FILES['surat_izin']) && $_FILES['surat_izin']['error'] == 0 && !empty($_FILES['surat_izin']['name'])) {
        $fileSuratIzin = $_FILES['surat_izin'];
        $uploadPathSI = 'pemilikWisata/dokumen/' . basename($fileSuratIzin['name']);
        
        if (move_uploaded_file($fileSuratIzin['tmp_name'], $uploadPathSI)) {
            $namaFileSuratIzin = $fileSuratIzin['name'];
        }
    }

    $sqlUpdateWisata = "UPDATE tempatwisata SET nama_lokasi = '$nama_lokasi', alamat_lokasi = '$alamat_lokasi', jenis_wisata = '$jenis_wisata', waktu_buka = '$waktu_buka', 
                        waktu_tutup = '$waktu_tutup', deskripsi = '$deskripsi', sumir = '$sumir', nomor_pic = '$nomor_pic', surat_izin = '$namaFileSuratIzin'
                        WHERE tempatwisata_id = '$tempatwisata_id' AND pw_id = '$pw_id'";
    
    $queryUpdateWisata = mysqli_query($conn, $sqlUpdateWisata);

    if (isset($_FILES['foto_wisata'])) {
        for ($i = 0; $i < 6; $i++) {
            if (isset($_FILES['foto_wisata']['name'][$i]) && !empty($_FILES['foto_wisata']['name'][$i]) && $_FILES['foto_wisata']['error'][$i] == 0) {
                $uploadPathFoto = 'pemilikWisata/foto/' . basename($_FILES["foto_wisata"]["name"][$i]);
                
                if (move_uploaded_file($_FILES['foto_wisata']['tmp_name'][$i], $uploadPathFoto)) {
                    $link_foto_baru = basename($_FILES["foto_wisata"]["name"][$i]);
                    $urutan = $i + 1;

                    $sqlUpdateFoto = "UPDATE fotowisata SET link_foto = '$link_foto_baru' WHERE tempatwisata_id = '$tempatwisata_id' AND urutan = '$urutan'";
                    mysqli_query($conn, $sqlUpdateFoto);
                }
            }
        }
    }

    if ($queryUpdateWisata) {
        mysqli_query($conn, "UPDATE tempatwisata SET status = 'review' WHERE tempatwisata_id = '$tempatwisata_id'");
        header("location: /Proyek Wanderlust/wanderlust_project/indeks.php?page=daftarWisata");
        exit();
    } else {
        echo "<p>Property update failed!</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Tempat Wisata</title>
    <!-- Pastikan path CSS sudah benar -->
    <link rel="stylesheet" href="pemilikWisata/cssWisata/addWisata.css"> 
</head>
<body>
    <?php include "pemilikWisata/viewsWisata.php";?>
    <div class="container">
        <h2>Edit property/tourist attraction</h2>
        <p class="subtitle">Update the necessary information of your property/tourist attraction</p>

        <?php if ($tempatWisata): ?>
        <form action="" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="nama_lokasi">Property Name</label>
                <input type="text" id="nama_lokasi" name="nama_lokasi" required value="<?= $tempatWisata['nama_lokasi']; ?>">
            </div>

            <div class="form-group">
                <label for="alamat_lokasi">Property Address</label>
                <textarea id="alamat_lokasi" name="alamat_lokasi" rows="3" required><?= $tempatWisata['alamat_lokasi']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="jenis_wisata">Category</label>
                <select id="jenis_wisata" name="jenis_wisata" required>
                    <option value="Nature" <?php echo ($dataWisata['jenis_wisata'] == 'Nature') ? 'selected' : ''; ?>>Nature</option>
                    <option value="Cultural" <?php echo ($dataWisata['jenis_wisata'] == 'Cultural') ? 'selected' : ''; ?>>Cultural</option>
                    <option value="Historical" <?php echo ($dataWisata['jenis_wisata'] == 'Historical') ? 'selected' : ''; ?>>Historical</option>
                    <option value="Religion" <?php echo ($dataWisata['jenis_wisata'] == 'Religion') ? 'selected' : ''; ?>>Religion</option>
                    <option value="Theme Park" <?php echo ($dataWisata['jenis_wisata'] == 'Theme Park') ? 'selected' : ''; ?>>Theme Park</option>
                    <option value="Other" <?php echo ($dataWisata['jenis_wisata'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                </select>
            </div>

            <div class="time-group">
                <div class="form-group">
                    <label for="waktu_buka">Open Hour</label>
                    <input type="time" id="waktu_buka" name="waktu_buka" required value="<?= $tempatWisata['waktu_buka']; ?>">
                </div>
                <div class="form-group">
                    <label for="waktu_tutup">Close Hour</label>
                    <input type="time" id="waktu_tutup" name="waktu_tutup" required value="<?= $tempatWisata['waktu_tutup']; ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="deskripsi">Description</label>
                <textarea id="deskripsi" name="deskripsi" required><?= $tempatWisata['deskripsi']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="sumir">Summary</label>
                <textarea id="sumir" name="sumir" rows="2" required><?= $tempatWisata['sumir']; ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="nomor_pic">Person in Charge (PIC) Phone Number</label>
                <input type="text" id="nomor_pic" name="nomor_pic" required value="<?= $tempatWisata['nomor_pic']; ?>">
            </div>

            <div class="form-group">
                <label for="surat_izin">Upload New Legal Business Document (Optional)</label>
                <p class="current-file">Current file: <?= $tempatWisata['surat_izin']; ?></p>
                <input type="file" id="surat_izin" name="surat_izin" accept=".pdf,.doc,.docx,.jpg,.png">
                <input type="hidden" name="old_surat_izin" value="<?= $dataWisata['surat_izin']; ?>">
                <small class="form-hint">Leave blank if you don't want to change the file.</small>
            </div>

            <div class="form-group">
                <label>Update images of your property (Optional)</label>
                <div class="photo-grid">
                    <?php for ($i = 1; $i <= 6; $i++): 
                        $foto_link = isset($fotoTempatWisata[$i]) ? 'pemilikWisata/foto/'.basename($fotoTempatWisata[$i]['link_foto']) : '#';
                        $has_foto = isset($fotoTempatWisata[$i]);
                    ?>
                    <div class="photo-upload-box">
                        <label for="foto_<?php echo $i; ?>" class="photo-upload-label">
                            <img id="preview_<?php echo $i; ?>" class="photo-preview" src="<?php echo $foto_link; ?>" alt="Photo" style="<?php echo $has_foto ? 'display:block;' : 'display:none;'; ?>"/>
                            <div id="placeholder_<?php echo $i; ?>" class="photo-placeholder" style="<?php echo !$has_foto ? 'display:flex;' : 'display:none;'; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                <span>Ganti Foto <?php echo $i; ?></span>
                            </div>
                        </label>
                        <input type="file" name="foto_wisata[]" id="foto_<?php echo $i; ?>" class="photo-input" accept="image/*" onchange="previewImage(event, <?php echo $i; ?>)">
                    </div>
                    <?php endfor; ?>
                </div>
                 <small class="form-hint">Choose a new image to replace an existing one. Leave blank to keep the old image.</small>
            </div>

            <div class="form-group">
                <button type="submit" name="update" class="submit-btn">Update Property</button>
            </div>
        </form>
        <?php else: ?>
            <p>Data yang akan diedit tidak ditemukan. Silakan kembali ke daftar wisata.</p>
        <?php endif; ?>
    </div>

    <script>
    function previewImage(event, index) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const preview = document.getElementById('preview_' + index);
                const placeholder = document.getElementById('placeholder_' + index);
                
                preview.src = e.target.result;
                preview.style.display = 'block';
                placeholder.style.display = 'none';
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>

</body>
</html>
