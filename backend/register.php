<?php
    require_once '../backend/conn.php';
    $_SESSION['email'] = $_POST['email'];
    $sql = "INSERT INTO users (nome, cognome, data_nascita, stato_nascita, email) VALUES ('".$_POST['nome']."', '".$_POST['cognome']."', '".$_POST['dataNascita']."', '".$_POST['statoNascita']."', '".$_POST['email']."')";

    if ($conn->query($sql) === 'true') {
        header("location: http://localhost/Progetto/frontend/register2.php");
    } else {
        header("location: http://localhost/Progetto/frontend/register2.php");
    }
?>