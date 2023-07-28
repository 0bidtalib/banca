<?php
    require_once '../backend/conn.php';
    $sql = "DELETE FROM uscite WHERE id = " . $_GET['idUscita'];
    $result = $conn->query($sql);
    if ($result === true) {
        header("location: http://localhost/Progetto/frontend/gestioneUscite.php");
    } else  {
        echo "Error while deleting uscita. <br>";
        echo "sql: " . $sql . "<br>";
        echo "result: " . $result;
    }
?>