<?php require_once '../frontend/header.php'; ?>
<h1>Login Form</h1>
<br><br>
<p>
    if you're registered:
    <a href="http://localhost/Progetto/frontend/login.php">Login</a>
</p>
<br><br>
    <form action="http://localhost/Progetto/backend/register.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" placeholder="ex. Mario"><br><br>

        <label for="cognome">Cognome:</label>
        <input type="text" name="cognome" placeholder="ex. Rossi"><br><br>

        <label for="dataNascita">Data di nascita:</label>
        <input type="date" name="dataNascita" placeholder="dataNascita"><br><br>

        <label for="statoNascita">Stato di nascita:</label>
        <input type="text" name="statoNascita" placeholder="statoNascita"><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="email@gmail.com"><br><br>

        <input type="submit" value="Register">
    </form>
<?php require_once '../frontend/footer.php'; ?>