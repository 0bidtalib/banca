<?php
    require_once '../backend/conn.php';
    $sql = "SELECT * FROM loginfo WHERE (username='".$_POST['username']."' OR email='".$_POST['username']."') AND password='".$_POST['password']."'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['logged'] = true;
        $_SESSION['user'] = $row['username'];
        $_SESSION['userID'] = $row['id'];
        header("location: http://localhost/Progetto/frontend/index.php");
    } else {
        echo "0 results";
    }
?>