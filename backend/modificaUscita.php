<?php
    require_once '../backend/conn.php';
    $sql = 'UPDATE uscite SET () VALUES WHERE id=';
    if ($conn->query($sql) === true) {
        header('header: http://localhost/Progetto/frontend/gestioneUscite.php';
    } else {
        echo 'Errore durante la modifica dell\'operazione: <br>';
        echo $sql;
    }
?>
