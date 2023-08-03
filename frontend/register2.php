<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>2nd stage of registration form</title>
        <link rel="stylesheet" href="../frontend//css/login.css">
    </head>
    <body>
        <div class="login-form">
            <div class="header">
                <h1>Second stage</h1>
            </div>
            <div class="body">
                <form action="http://localhost/Progetto/backend/register2.php" method="post">
                    <div class="username">
                        <input type="text" name="username" placeholder="email or username">
                    </div>

                    <div class="username">
                        <input type="password" name="password" placeholder="password">
                    </div>

                    <div class="login-btn">
                        <input type="submit" value="Save">
                    </div>
                </form>
            </div>
            <div class="footer">
                <p style="color:chartreuse">Choose your username and password in order to utilize our services.</p>
            </div>
        </div>
    </body>
</html>