<?php
    require_once '../backend/conn.php';
    $sql = "INSERT INTO entrate (stipendio, inizio_periodo, fine_periodo, utente) VALUES (".$_POST['stipendio'].", '".$_POST['inizio_periodo']."', '".$_POST['fine_periodo']."', '".$_SESSION['userID']."')";

    echo $sql;

    // if ($conn->query($sql) === 'true') {
    //     header("location: http://localhost/Progetto/frontend/insertStipendio.php");
    // } else {
    //     echo "something went wrong while inserting...<br>";
    //     echo $sql;
    // }
?>
