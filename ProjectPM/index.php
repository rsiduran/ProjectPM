
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/login.css">
    <title>Login | Jail Jail</title>
    <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const errorMessage = urlParams.get('error');
            
            if (errorMessage) {
                alert(decodeURIComponent(errorMessage));  
            }
        };
    </script>
</head>
<body>
    <div class="login-box">
        <div class="login-header">
            <header>Login</header>
        </div>
        <form method="POST" action="Backend/login.php">
            <div class="input-box">
                <input type="text" name="user_id" class="input-field" placeholder="User ID:" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" class="input-field" placeholder="Password" autocomplete="off" required>
            </div>
            <div class="forgot">
                <section>
                    <input type="checkbox" id="check" name="remember">
                    <label for="check">Remember me</label>
                </section>
                <section>
                    <a href="#">Forgot password</a>
                </section>
            </div>
            <div class="input-submit">
                <button class="submit-btn" id="submit"></button>
                <label for="submit">Sign In</label>
            </div>
            <div class="sign-up-link">
                <p>Already have an account? <a href="Form/Registration.php">Register now</a></p>
            </div>
        </form>
    </div>
</body>
</html>
