<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="Umum/cssUmum/signin.css?v=1.0.4">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
</head>
<body>
    <h2>New Face, New Smile!</h2>
    <div class="login-container">
        <h3>Sign In</h3>
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
                <a href=""></a>
                <a href="">Forgot password</a>
            </div>
            <input type="submit" value="Sign In" name="signinBtn" id="submitButton">
            <div class="login-footer">
                <p>Have an account? <a href="indeks.php?page=login">Log In</a></p>
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