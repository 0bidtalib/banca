<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration form</title>
        <link rel="stylesheet" href="../frontend//css/login.css">
    </head>
    <body>
        <div class="login-form">
            <div class="header">
                <h1>Registration Form</h1>
            </div>
            <div class="body">
                <form action="http://localhost/Progetto/backend/register.php" method="post">
                    <div class="username">
                        <input type="text" name="nome" placeholder="ex. Mario">
                    </div>

                    <div class="username">
                        <input type="text" name="cognome" placeholder="ex. Rossi">
                    </div>

                    <div class="username">
                        <input type="date" name="dataNascita" placeholder="dataNascita">
                    </div>

                    <div class="username">
                        <input type="text" name="statoNascita" placeholder="statoNascita">
                    </div>

                    <div class="username">
                        <input type="email" name="email" placeholder="email@gmail.com">
                    </div>

                    <div class="login-btn">
                        <input type="submit" value="Register">
                    </div>
                </form>
            </div>
            <div class="footer">
                <p>if you're registered: <a href="http://localhost/Progetto/frontend/login.php">Login</a></p>
            </div>
        </div>
    </body>
</html>