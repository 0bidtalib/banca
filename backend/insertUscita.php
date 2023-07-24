<?php
    require_once '../backend/conn.php';
    $sql = "INSERT INTO uscite (importo, descrizione, data, categoria, utente) VALUES (".$_POST['importo'].", '".$_POST['descrizione']."', '".$_POST['dataImporto']."', ".$_POST['categoria'].", ".$_SESSION['userID'].")";

    if ($conn->query($sql) === 'true') {
        header("location: http://localhost/Progetto/frontend/gestioneUscite.php");
    } else {
        echo "Error while inserting the operation <br>";
        echo $sql;
    }
?>