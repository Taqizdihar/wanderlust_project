<?php
include "config.php";

if (isset($_POST['signinBtn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordSecured = password_hash($password, PASSWORD_DEFAULT);

    $sqlStatement = "INSERT INTO user (email, password, role) VALUES('$email', '$passwordSecured', '$role')";
    $query = mysqli_query($conn, $sqlStatement);
    $getID = mysqli_insert_id($conn);
    
    $_SESSION['user_id'] = $getID;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $passwordSecured;

    if (mysqli_affected_rows($conn) != 0) {
        if ($role == 'wisatawan') {
            header("location: /Proyek Wanderlust/wanderlust_project/indeks.php?page=homeUmum");
            exit();
        } else if ($role == 'pw') {
            header("location: /Proyek Wanderlust/wanderlust_project/indeks.php?page=verifikasiEntitas");
            exit();
        }
    } else {
        echo "<p>Pendaftaran akun gagal!</p>";
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="Umum/cssUmum/login.css?v=1.0.4">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
</head>
<body>
    <h2>Welcome back!</h2>
    <div class="login-container">
        <h3>Log In</h3>
        <form action="post">
            <div class="form-item">
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Email" required>
            </div>
            <div class="form-item">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="password-item">
                <a href="notFound.php">Forgot password</a>
            </div>
            <input type="submit" value="Log In" name="loginBtn" id="submitButton">
            <div class="login-footer">
                <p>Don't have any account? <a href="indeks.php?page=choice">Sign In</a></p>
                <br>
                <a href="indeks.php?page=homeUmum" id="backButton">Back to the start</a>
            </div>
        </form>
    </div>
    <div class="logo">
        <img src="Umum/photos/Wanderings for Wonders side.png" alt="Wanderlust Logo">
    </div>
</body>
</html>