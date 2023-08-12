<?php
    require_once '../backend/conn.php';
    require_once '../frontend/header.php'
?>
<h1>Elimazione entrata</h1><br><br>
<h3><a href="../backend/eliminaEntrata.php?idEntrata=<?php echo $_GET['idEntrata'] ?>">Conferma</a></h3>
<?php require_once "../frontend/footer.php" ?>