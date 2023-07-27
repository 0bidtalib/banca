<?php
    require_once '../backend/conn.php';
    if ($_SESSION['user'] == 'admin' && $_SESSION['userID'] == 5 ) {
        $sql = 'INSERT INTO categorie(descrizione, key_word) VALUES ("'.$_GET['descrizione'].'", key_word="'.$_GET['key_word'].'")';
        if ($conn->query($sql) === true) {
            header("location: http://localhost/Progetto/frontend/categorie.php");
        } else {
            echo 'Errore nell\'inserimento della categoria: <br>';
            echo $sql;
        }
    } else {
        echo 'You are not allowed to create a new category';
    }
?>
