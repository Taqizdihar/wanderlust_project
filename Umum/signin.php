<?php
include "config.php";
$role = $_GET['role'];

$warning = "";

if (isset($_POST['signinBtn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $petName = $_POST['petname'];
    $passwordSecured = password_hash($password, PASSWORD_DEFAULT);

    $sqlCall = "SELECT * FROM user WHERE email = '$email' AND role= '$role'";
    $registration = mysqli_query($conn, $sqlCall);

    if (mysqli_num_rows($registration) > 0) {
        $warning = "Email is already used as either tourist or TOA, <br> please use other email or Log In";
    } else {
        $sqlStatement = "INSERT INTO user (email, password, role, nama_peliharaan) VALUES('$email', '$passwordSecured', '$role', '$petName')";
        $query = mysqli_query($conn, $sqlStatement);
        $getID = mysqli_insert_id($conn);

        $_SESSION['user_id'] = $getID;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $passwordSecured;

        if (mysqli_affected_rows($conn) != 0) {
            if ($role == 'wisatawan') {
                header("location: /Proyek Wanderlust/wanderlust_project/indeks.php?page=Home");
                exit();
            } else if ($role == 'pw') {
                header("location: /Proyek Wanderlust/wanderlust_project/indeks.php?page=verifikasiEntitas");
                exit();
            }
        } else {
            $warning = "Registration failed. Please try again";
        }
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="Umum/cssUmum/signin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
</head>

<body>
    <?php
    if ($role == 'wisatawan') {
        echo "<h2>New Face, New Smile!</h2>";
    } else if ($role == 'pw') {
        echo "<h2>Make your place a wonder</h2>";
    }
    ?>
    <div class="login-container">
        <h3>Sign In</h3>

        <?php if (!empty($warning)) : ?>
        <p id="warning"><?= $warning?></p>
        <?php endif; ?>

        <form method="post" action="">
            <?php
            if ($role == 'wisatawan') {
            ?>
                <div class="form-item">
                    <label for="email">Your role is:</label>
                    <input type="text" name="role" value="Tourist" id="Tourist" disabled>
                </div>
            <?php
            } else if ($role == 'pw') {
            ?>
                <div class="form-item">
                    <label for="email">Your role is:</label>
                    <input type="text" name="role" value="Tourist Attraction Owner" id="TAO" disabled>
                </div>
            <?php  
            }
            ?>
            <div class="form-item">
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Email" required>
            </div>
            <div class="form-item">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-item">
                <label for="email">Your pet's name!</label>
                <input type="text" name="petname" placeholder="Pet name" required>
            </div>
            <input type="submit" value="Register" name="signinBtn" id="submitButton">
            <div class="login-footer">
                <p>Have an account? <a href="indeks.php?page=login">Log In</a></p>
                <br>
                <a href="indeks.php?page=homeUmum" id="backButton">Back to the start</a>
            </div>
        </form>
    </div>
    <div class="logo">
        <img src="Umum/foto/Wanderings for Wonders side.png" alt="Wanderlust Logo">
    </div>
</body>
</html>