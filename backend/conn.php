<?php
    session_start();
    require_once('db_dati.php');
    $conn = new mysqli($server,
    $username, $password, $nome_DB);

    if ($conn->connect_error) {
        echo "error: " + $conn->connect_error;
    }
?>