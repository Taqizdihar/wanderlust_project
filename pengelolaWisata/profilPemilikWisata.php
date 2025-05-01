<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link rel="stylesheet" href="pengelolaWisata/cssWisata/profilPemilikWisata.css?v=1.0.4">
    <link rel="stylesheet" href="cssWisata/profilPemilikWisata.css?v=1.0.4">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="navbar">
        <img src="../Umum/photos/Wanderings for Wonders side white.png" alt="Wanderlust Logo">
        <h1>| Partner Dashboard</h1>
        <a href="logout.php"><i class="fa-regular fa-circle-user"></i></a> 
    </div>

    <div class="sidebar">
        <a href="dashboardWisata.php">Dashboard</a>
        <a href="../notFound.php">Places</a>
        <a href="../notFound.php">Orders</a>
        <a href="../notFound.php">Help Centre</a>
        <a href="../notFound.php">Log Out</a>
    </div>

    <div class="main">
        <div class="profile-container">
        <div class="profile-pic-section">
        <div class="avatar"></div>
        <label class="change-btn">
            Change
            <input type="file" class="file-input" accept="image/*">
        </label>
        </div>

        <div class="profile-info">
        <h2 class="name">Full Name</h2>
        <div class="status">status</div>

        <div class="info-grid">
            <div class="info-left">
            <p><strong>Email :</strong></p>
            <div class="value-box">johndoe@gmail.com</div>

            <p><strong>Phone :</strong></p>
            <div class="value-box">1234567890</div>
            </div>

            <div class="info-right">
            <p><strong>Legal Tax Document:</strong></p>
            <a href="document_tax.pdf" target="_blank" class="doc-btn">See Document ➚</a>

            <p><strong>Legal Business Document :</strong></p>
            <a href="document_business.pdf" target="_blank" class="doc-btn">See Document ➚</a>
            </div>
        </div>

        <a href="edit-profile.php" class="edit-btn">Edit Identity</a>
        </div>
    </div>
    </div>
</body>
</html>