<?php
    require_once '../frontend/header.php';
?>
<h1>Second stage</h1>
<br><br>
<p>Choose your username and password in order to utilize our services.</p>
<br><br>
    <form action="http://localhost/Progetto/backend/register2.php" method="post">

        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="email u selected earlier or a new username"><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="password"><br><br>

        <input type="submit" value="Save">
    </form>
<?php
    require_once '../frontend/footer.php';
?>