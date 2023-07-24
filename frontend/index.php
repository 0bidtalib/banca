<?php
    if (!$_SESSION['logged']) {
        header("location: http://localhost/Progetto/frontend/login.php");
    }
    require_once '../frontend/header.php';
    require_once '../backend/conn.php';
    if ($_SESSION['user']=='admin' && $_SESSION['userID']==5 ) {
        $sqlEnt = "SELECT * FROM entrate WHERE inizio_periodo>='2023/06/01' AND fine_periodo<='2023/06/30'";
        $sqlUsc = "SELECT * FROM uscite WHERE data>='".date('Y-m-01')."' AND data<='".date('Y-m-t')."'";
    } else {
        $sqlEnt = "SELECT * FROM entrate WHERE utente=".$_SESSION['userID']." AND inizio_periodo>='2023/06/01' AND fine_periodo<='2023/06/30'";
        $sqlUsc = "SELECT * FROM uscite WHERE utente=".$_SESSION['userID']." AND data>='".date('Y-m-01')."' AND data<='".date('Y-m-t')."'";
    }

    $resEnt = $conn->query($sqlEnt);
    $totEntrate = 0;
    while ($row = $resEnt->fetch_assoc()) {
        $totEntrate += $row["stipendio"];
    }
    
    $resUsc = $conn->query($sqlUsc);
    $totUscite = 0;
    while ($row = $resUsc->fetch_assoc()) {
        $totUscite += $row["importo"];
    }
?>
    <h1>Home page</h1>
    
    <?php
        if ($_SESSION['logged']) {
            echo '<br><br><h4>Welcome '. $_SESSION['user'] .'</h4><br><br>';
            echo '<h3>Totale entrate: ' . $totEntrate . ' €</h3><br>';
            echo '<h3>Totale uscite: ' . $totUscite . ' €</h3><br><br>';
        }
    ?>
    <a href="http://localhost/Progetto/frontend/gestioneEntrate.php">Gestione entrate</a><br><br>
    <a href="http://localhost/Progetto/frontend/gestioneUscite.php">Gestione uscite</a><br><br>
    <?php
        if ($_SESSION['user']=='admin' && $_SESSION['userID']==5) {
            echo '<a href="http://localhost/Progetto/frontend/categorie.php">Categorie</a><br><br>';
        }
    ?>
    <br>
    <a href="http://localhost/Progetto/backend/logout.php">Log out</a>
<?php require_once '../frontend/footer.php'; ?>
