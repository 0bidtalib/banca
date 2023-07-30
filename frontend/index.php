<?php
    require_once '../frontend/header.php';
    require_once '../backend/conn.php';
    if (!$_SESSION['logged']) {
        header("location: http://localhost/Progetto/frontend/login.php");
    }
    if ($_SESSION['isadmin']) {
        $sqlEnt = "SELECT * FROM entrate WHERE inizio_periodo>='2023/06/01'";
        $sqlUsc = "SELECT * FROM uscite WHERE data>='".date('Y-m-01')."' AND data<='".date('Y-m-t')."'";
    } else {
        $sqlEnt = "SELECT * FROM entrate WHERE utente=".$_SESSION['userID']." AND inizio_periodo>='2023/06/01'";
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
    <div class="testa">
        <div class="title">
            <h1>Home page</h1>
        </div>
        <div class="greetings">
            <?php if ($_SESSION['logged']) { ?>
                <h3>Entrate: <?php echo $totEntrate ?> €</h3>
                <h3>Uscite: <?php echo $totUscite ?> €</h3>
                <h4><a href="http://localhost/Progetto/frontend/profilo.php"><?php echo $_SESSION['user'] ?></a></h4>
                <h4 class="log-out"><a href="http://localhost/Progetto/backend/logout.php">Log out</a></h4>
            <?php } ?>
        </div>
    </div>
    <div class="body">
        <div class="btns">
            <div class="btn">
                <a href="http://localhost/Progetto/frontend/gestioneEntrate.php">Gestione entrate</a>
            </div>
            <div class="btn">
                <a href="http://localhost/Progetto/frontend/gestioneUscite.php">Gestione uscite</a>
            </div>
            <?php if ($_SESSION['isadmin']) { ?>
                <div class="btn">
                    <a href="http://localhost/Progetto/frontend/gestioneprestiti.php">Gestione prestiti</a>
                </div>
                <div class="btn">
                    <a href="http://localhost/Progetto/frontend/categorie.php">Categorie</a>
                </div>
            <?php } ?>
        </div>
    </div>
<?php require_once '../frontend/footer.php'; ?>