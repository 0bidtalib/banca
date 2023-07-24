<?php require_once '../frontend/header.php'; ?>
<h1>Login Form</h1>
<br><br>
<p>
    if you're not registered:
    <a href="http://localhost/Progetto/frontend/register.php">Register</a>
</p>
<br><br>
    <form action="http://localhost/Progetto/backend/login.php" method="post">
    
        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="username or email"><br><br>

        <label for="password">Passwrod:</label>
        <input type="password" name="password" placeholder="password"><br><br>

        <input type="submit" value="Login">
    </form>
<?php require_once '../frontend/footer.php'; ?>
