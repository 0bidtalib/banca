<?php
    require_once '../frontend/header.php';
    require_once '../backend/conn.php';
    if (!$_SESSION['logged']) {
        header("location: http://localhost/Progetto/frontend/login.php");
    }
    $sqlEnt = "SELECT * FROM entrate WHERE utente=".$_SESSION['userID'];
    $sqlUsc = "SELECT * FROM uscite WHERE utente=".$_SESSION['userID'];
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
    <div class="testa">
        <div class="title">
            <h1>Just mine - <?php echo $_SESSION['user'] ?></h1>
        </div>
        <div class="greetings">
            <?php if ($_SESSION['logged']) { ?>
                <h4><a href="http://localhost/Progetto/frontend/profilo.php"><?php echo $_SESSION['user'] ?></a></h4>
                <h4 class="log-out"><a href="http://localhost/Progetto/backend/logout.php">Log out</a></h4>
            <?php } ?>
        </div>
    </div>
    <div class="body">
        <div class="table-upper">
            <div class="back">
                Uscite:<h3><?php echo $totUscite ?> €</h3>
            </div>
            <div class="insert">
                Entrate:<h3><?php echo $totEntrate ?> €</h3>
            </div>
        </div>
        <div class="btns">
            <div class="btn">
                <a href="http://localhost/Progetto/frontend/gestioneEntrate.php">Gestione entrate</a>
            </div>
            <div class="btn">
                <a href="http://localhost/Progetto/frontend/gestioneUscite.php">Gestione uscite</a>
            </div>
        </div>
    </div>
<?php require_once '../frontend/footer.php'; ?>