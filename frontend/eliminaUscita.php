<?php
    require_once '../backend/conn.php';
    require_once '../frontend/header.php'
?>
<h1>Elimazione uscita</h1><br><br>
<a href="../backend//eliminaUscita.php?idUscita=<?php echo$_GET['idUscita'] ?>">Conferma</a>
<?php require_once '../frontend/footer.php' ?>