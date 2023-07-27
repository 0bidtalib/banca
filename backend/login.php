<?php
    require_once '../backend/conn.php';
    $sql = "SELECT * FROM loginfo WHERE (username='".$_POST['username']."' OR email='".$_POST['username']."') AND password='".$_POST['password']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['logged'] = true;
        $_SESSION['user'] = $row['username'];
        $_SESSION['userID'] = $row['id'];
        ($row['ruolo'] == 1) ? $_SESSION['isadmin'] = true : $_SESSION['isadmin'] = false;
        header("location: http://localhost/Progetto/frontend/index.php");
    } else {
        echo "No user found or you entered wrong credentials";
    }
?>