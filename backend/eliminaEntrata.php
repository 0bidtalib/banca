<?php
    require_once '../backend/conn.php';
    $sql = "DELETE FROM entrate WHERE id = " . $_GET['idEntrata'];
    $result = $conn->query($sql);
    if ($result === true) {
        header("location: http://localhost/Progetto/frontend/gestioneEntrate.php");
    } else  {
        echo "Error while deleting entrata. <br>";
        echo "sql: " . $sql . "<br>";
        echo "result: " . $result;
    }
?>