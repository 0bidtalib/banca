<?php
    require_once '../backend/conn.php';
    $sql = "INSERT INTO entrate (stipendio, inizio_periodo, fine_periodo, descrizione, utente) VALUES (".$_POST['stipendio'].", '".$_POST['inizio_periodo']."', '".$_POST['fine_periodo']."', '".$_POST['descrizione']."', ";
    if (!$_SESSION['isadmin']) {
        $sql = $sql . $_SESSION['userID'] . ")";
    } else {
        $sql = $sql . $_POST['utente'] . ")";
    }
    $result = $conn->query($sql);
    if ( $result === true) {
        header("location: http://localhost/Progetto/frontend/insertStipendio.php");
    } else {
        echo $result . '<br>';
        echo "something went wrong while inserting...<br>";
        echo $sql;
    }
?>