<?php
    require_once '../backend/conn.php';
    $sql = "INSERT INTO loginfo (username, email, password) VALUES ('".$_POST['username']."', '".$_SESSION['email']."', '".$_POST['password']."')";
    if ($conn->query($sql) === 'true') {
        header("location: http://localhost/Progetto/frontend/login.php");
    } else {
        header("location: http://localhost/Progetto/frontend/register2.php");
    }
?>
