<?php
include "config.php"; 

$ID = $_SESSION['user_id'];

if (isset($_POST['submit'])) {
    $nama_lokasi = $_POST['nama_lokasi'];
    $alamat_lokasi = $_POST['alamat_lokasi'];
    $jenis_wisata = $_POST['jenis_wisata'];
    $waktu_buka = $_POST['waktu_buka'];
    $waktu_tutup = $_POST['waktu_tutup'];
    $deskripsi = $_POST['deskripsi'];
    $sumir = $_POST['sumir'];
    $nomor_pic = $_POST['nomor_pic'];
    $status = "review";
    $suratIzin = $_FILES['surat_izin'];

    if (isset($suratIzin)) {
    $uploadSIUP = 'pemilikWisata/dokumen/'.basename($suratIzin['name']);
    
      if (move_uploaded_file($suratIzin['tmp_name'], $uploadSIUP)) {
        $uploadNewSIUP = $suratIzin['name'];
      } else {
        $uploadNewSIUP = null;
      }
    }

    $sqlTempatWisata = "INSERT INTO tempatwisata (pw_id, nama_lokasi, alamat_lokasi, jenis_wisata, waktu_buka, waktu_tutup, deskripsi, sumir, nomor_pic, surat_izin, status) 
                         VALUES ('$ID', '$nama_lokasi', '$alamat_lokasi', '$jenis_wisata', '$waktu_buka', '$waktu_tutup', '$deskripsi', '$sumir', '$nomor_pic', '$uploadSuratIzin', '$status')";
    $queryTempatWisata = mysqli_query($conn, $sqlTempatWisata);

    $tempatwisata_id = mysqli_insert_id($conn);

    if (isset($_FILES['foto_wisata']) && count($_FILES['foto_wisata']['name']) == 6) {
        for ($i = 0; $i < 6; $i++) {
            $uploadFoto = 'pemilikWisata/foto/'.basename($_FILES["foto_wisata"]["name"][$i]);
            if (move_uploaded_file($_FILES['foto_wisata']['tmp_name'][$i], $uploadFoto)) {
                $link_foto = basename($_FILES["foto_wisata"]["name"][$i]);
                $urutan = $i + 1;
                $sqlFotoWisata = "INSERT INTO fotowisata (tempatwisata_id, link_foto, urutan) VALUES ('$tempatwisata_id', '$link_foto', '$urutan')";
                $queryFoto = mysqli_query($conn, $sqlFotoWisata);
            }
        }
    }

    if (mysqli_affected_rows($conn) != 0) {
        header("location: /Proyek Wanderlust/wanderlust_project/indeks.php?page=daftarWisata");
        exit();
    } else {
        echo "<p>Adding property failed</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Tempat Wisata</title>
    <link rel="stylesheet" href="pemilikWisata/cssWisata/addWisata.css">
</head>
<body>
    <?php include "pemilikWisata/viewsWisata.php";?>
    <div class="container">
        <h2>Add a property/tourist attraction</h2>
        <p class="subtitle">Fill all the necessary information of your property/tourist attraction</p>

        <form action="" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="nama_lokasi">Property Name</label>
                <input type="text" id="nama_lokasi" name="nama_lokasi" required placeholder="Example: Mount Ebott">
            </div>

            <div class="form-group">
                <label for="alamat_lokasi">Property Address</label>
                <textarea id="alamat_lokasi" name="alamat_lokasi" rows="3" required placeholder="Fill the address"></textarea>
            </div>

            <div class="form-group">
                <label for="jenis_wisata">Category</label>
                <select id="jenis_wisata" name="jenis_wisata" required>
                    <option value="" disabled selected>Choose category...</option>
                    <option value="Nature">Nature</option>
                    <option value="Cultural">Cultural</option>
                    <option value="Historical">Historical</option>
                    <option value="Religion">Religion</option>
                    <option value="Theme Park">Theme Park</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="time-group">
                <div class="form-group">
                    <label for="waktu_buka">Open Hour</label>
                    <input type="time" id="waktu_buka" name="waktu_buka" required>
                </div>
                <div class="form-group">
                    <label for="waktu_tutup">Close Hour</label>
                    <input type="time" id="waktu_tutup" name="waktu_tutup" required>
                </div>
            </div>

            <div class="form-group">
                <label for="deskripsi">Description</label>
                <textarea id="deskripsi" name="deskripsi" required placeholder="Describe your property"></textarea>
            </div>

            <div class="form-group">
                <label for="sumir">Summary</label>
                <textarea id="sumir" name="sumir" rows="2" required placeholder="Write your property summary"></textarea>
            </div>
            
            <div class="form-group">
                <label for="nomor_pic">Person in Charge (PIC) Phone Number</label>
                <input type="text" id="nomor_pic" name="nomor_pic" required placeholder="Example: 0812-3456-7890">
            </div>

            <div class="form-group">
                <label for="surat_izin">Upload Legal Business Document</label>
                <input type="file" id="surat_izin" name="surat_izin" accept=".pdf,.doc,.docx,.jpg,.png" required>
            </div>

            <div class="form-group">
                <label>Upload 6 images of your property</label>
                <div class="photo-grid">
                    <?php for ($i = 1; $i <= 6; $i++): ?>
                    <div class="photo-upload-box">
                        <label for="foto_<?php echo $i; ?>" class="photo-upload-label">
                            <img id="preview_<?php echo $i; ?>" class="photo-preview" src="#" alt="Pratinjau Foto <?php echo $i; ?>"/>
                            <div id="placeholder_<?php echo $i; ?>" class="photo-placeholder">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                <span>Foto <?php echo $i; ?></span>
                            </div>
                        </label>
                        <input type="file" name="foto_wisata[]" id="foto_<?php echo $i; ?>" class="photo-input" accept="image/*" required onchange="previewImage(event, <?php echo $i; ?>)">
                    </div>
                    <?php endfor; ?>
                </div>
                 <small class="form-hint">Choose 6 images with JPG, JPEG, atau PNG extension.</small>
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="submit-btn">Add property</button>
            </div>
        </form>
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
