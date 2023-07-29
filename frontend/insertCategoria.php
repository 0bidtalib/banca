<?php
    require_once '../frontend/header.php';
    require_once '../backend/conn.php';
    if (!$_SESSION['isadmin']) {
        echo 'You are not allowed to access this page.';
    }
?>
    <div class="title">
        <h1>Creazione categoria</h1>
    </div>
<br>
<form action="http://localhost/Progetto/backend/insertCategoria.php" method="get">
    
    <label for="key_word">Key Word</label>
    <input type="text" name="key_word" placeholder="Key word per la categoria"><br><br>

    <label for="descrizione">Descrizione</label>
    <input type="text" name="descrizione" placeholder="Inserire la descrizione della categoria"><br><br>
    
    <input type="submit" value="Crea">
</form>

<br><br>

<a href="http://localhost/Progetto/frontend/categorie.php">Back</a>

<?php require_once '../frontend/footer.php'; ?>