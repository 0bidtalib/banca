<?php
    require_once '../frontend/header.php';
?>
<h1>Modifica uscita</h1><br>
<form action="http://localhost/Progetto/frontend/modificaUscita.php">
    <label for="importoMod">Importo</label>
    <input type="number" name="importoMod" placeholder="inserire l'importo modificato" value="<?php //echo $_GET['importoMod']?>"><br><br>

    <label for="descrizioneMod">Descrizione</label>
    <input type="text" name="descrizioneMod" placeholder="descrizione modificato" value="<?php //echo $_GET['descMod']?>"><br><br>

    <label for="dataMod">Data</label>
    <input type="date" name="dataMod" value="<?php //echo $_GET['dataMod']?>"><br><br>

    <input type="submit" value="Modifica"> <br><br>
</form>
<a href="http://localhost/Progetto/frontend/gestioneUscite.php">Back</a>
<?php require_once '../frontend/footer.php'; ?>