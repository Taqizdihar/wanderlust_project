<?php
include "config.php";
$warning = "";

if (isset($_POST['loginBtn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sqlStatement = "SELECT * FROM user WHERE email = '$email'";
    $query = mysqli_query($conn, $sqlStatement);
    $registeredUser = mysqli_fetch_assoc($query);

    if ($registeredUser) {
        if (password_verify($password, $registeredUser['password'])) {
           
            $_SESSION['user_id'] = $registeredUser['user_id'];
            $_SESSION['id'] = $registeredUser['user_id']; 
            $_SESSION['email'] = $registeredUser['email'];
            $_SESSION['role'] = $registeredUser['role'];

            if ($registeredUser['role'] == 'wisatawan') {
                header("location: indeks.php?page=Home");
                exit();
            } else if ($registeredUser['role'] == 'pw') {
                header("location: indeks.php?page=dashboardWisata");
                exit();
            } else if ($registeredUser['role'] == 'admin') {
                header("location: indeks.php?page=dashboardAdmin");
                exit();
            }
        } else {
            $warning = "Wrong password, please try again";
        }
    } else {
        $warning = "Unregistered email, choose Sign Up option";
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <link rel="stylesheet" href="Umum/cssUmum/login.css">
</head>
<body>
    <h2>Welcome back!</h2>
    <div class="login-container">
        <h3>Log In</h3>

        <?php if (!empty($warning)) : ?>
        <p id="warning"><?= $warning ?></p>
        <?php endif; ?>

        <form method="post" action="">
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
                <a href="indeks.php?page=homeUmum" id="backButton">Back to the start</a>
            </div>
        </form>
    </div>
    <div class="logo">
        <img src="Umum/foto/Wanderings for Wonders side.png" alt="Wanderlust Logo">
    </div>
</body>
</html>