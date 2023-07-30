<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <link rel="stylesheet" href="../frontend//css/login.css">
</head>
<body>
    <div class="login-form">
        <div class="haeder">
        <h1>Login Form</h1>
        </div>
        <div class="body">
            <form action="http://localhost/Progetto/backend/login.php" method="post">
                <div class="username">
                    <input type="text" name="username" placeholder="username or email">
                </div>

                <div class="password">
                    <input type="password" name="password" placeholder="password">
                </div>

                <div class="login-btn">
                    <input type="submit" value="Login">
                </div>
            </form>
        </div>
        <div class="footer">
            <p> if you're not registered: <a href="http://localhost/Progetto/frontend/register.php">Register</a> </p>
        </div>
    </div>
</body>
</html>