<?php
include "config.php";
$warning = "";

if (isset($_POST['loginBtn'])) {
    $email = $_POST['email'];
    $petName = $_POST['petname'];
    $password = $_POST['password'];

    $sqlStatement = "SELECT * FROM user WHERE email = '$email'";
    $query = mysqli_query($conn, $sqlStatement);
    $registeredUser = mysqli_fetch_assoc($query);

    if ($registeredUser) {
        if ($petName == $registeredUser['nama_peliharaan']) {
        $passwordSecured = password_hash($password, PASSWORD_DEFAULT);
        $sqlResetPassword = "UPDATE user SET password='$passwordSecured'";
        $queryReset = mysqli_query($conn, $sqlResetPassword);
        
            if (mysqli_affected_rows($conn) != 0) {
                echo "<script>alert('Hooray! Password has been reset. Take care of your lovely pet!');
                window.location.href = 'indeks.php?page=login';</script>";
                exit();
            }
        } else {
            $warning = "Wrong pet name! <br> Try uppercase and lowercase combination";
        }
    } else {
        $warning = "Unregistered email, choose Sign Up option instead";
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <link rel="stylesheet" href="Umum/cssUmum/forgotPassword.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <h2>Uh oh, wait...</h2>
    <div class="login-container">
        <h3>Forgot your password?</h3>
        <p class="info">To reset your password, <br> please enter the name <br> of your favorite pet!</p>

        <?php if (!empty($warning)) : ?>
        <p id="warning"><?= $warning ?></p>
        <?php endif; ?>

        <form method="post" action="">
            <div class="form-item">
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Email" required>
            </div>
            <div class="form-item">
                <label for="petname">Input your lovely pet name</label>
                <input type="text" name="petname" placeholder="Who is your lovely pet's name?" required autocomplete="off">
            </div>
            <div class="form-item">
                <label for="password">New Password</label>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <input type="submit" value="Reset Password" name="loginBtn" id="submitButton">
            <div class="login-footer">
                <a href="indeks.php?page=login" id="backButton">Back to Login</a>
            </div>
        </form>
    </div>
    <div class="logo">
        <img src="Umum/foto/Wanderings for Wonders side.png" alt="Wanderlust Logo">
    </div>
</body>
</html>