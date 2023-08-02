<?php
    require_once '../backend/conn.php';
    require_once '../frontend/header.php'
?>
<h1>Elimazione uscita</h1><br><br>
<h3><a href="../backend/eliminaUscita.php?idUscita=<?php echo $_GET['idUscita'] ?>">Conferma</a></h3>
<?php require_once '../frontend/footer.php' ?>