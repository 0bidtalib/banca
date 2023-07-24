<?php require_once '../frontend/header.php'; ?>
<h1>Creazione categoria</h1>
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