<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Umum/cssUmum/login.css?v=1.0.4">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
</head>
<body>
    <h2>Welcome back, Wanderer!</h2>
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
                <a href=""></a>
                <a href="">Forgot password</a>
            </div>
            <input type="submit" value="Log In" name="loginBtn" id="submitButton">
            <div class="login-footer">
                <p>Don't have any account? <a href="">Sign In</a></p>
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