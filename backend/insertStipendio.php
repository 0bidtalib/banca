<?php
    require_once '../backend/conn.php';
    $sql = "INSERT INTO entrate (stipendio, inizio_periodo, fine_periodo, utente) VALUES (".$_POST['stipendio'].", '".$_POST['inizio_periodo']."', '".$_POST['fine_periodo']."', '".$_SESSION['userID']."')";

    $res = $conn->query($sql);

    if ( $res === 'true') {
        header("location: http://localhost/Progetto/frontend/insertStipendio.php");
    } else {
        echo $res . '<br>';
        echo "something went wrong while inserting...<br>";
        echo $sql;
    }
?>
