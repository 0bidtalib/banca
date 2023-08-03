<?php
    require_once '../frontend/header.php';
    require_once '../backend/conn.php';
    if ($_SESSION['isadmin']) {
        $sql = "SELECT entrate.*, users.nome, users.cognome, users.id AS id_utente FROM entrate INNER JOIN users ON entrate.utente = users.id WHERE utente=".$_GET['utente']." AND inizio_periodo>='".$_GET['dataDal']."' AND fine_periodo<='".$_GET['dataAl']."'";
    } else {
        $sql = "SELECT * FROM entrate WHERE utente=".$_SESSION['userID']." AND inizio_periodo>='".$_GET['dataDal']."' AND fine_periodo<='".$_GET['dataAl']."'";
    }
    $sql .= " ORDER BY inizio_periodo";
    $result = $conn->query($sql);
    $totale = 0;
    $res = $conn->query($sql);
    while ($r = $res->fetch_assoc()) {
        $totale += $r['stipendio'];
    }
?>
    <div class="testa">
        <div class="title">
            <h1>Gestione dello stipendio</h1>
        </div>
        <div class="greetings">
            <h2>Totale: <?php echo $totale?> €</h2>
        </div>
    </div>

    <div class="body">
        <div class="table-upper">
            <div class="back">
                <a href="http://localhost/Progetto/frontend/gestioneEntrate.php">back</a>
            </div>
            <div class="filter">
                <h4>Filtro dal: <?php echo $_GET['dataDal'] ?> al: <?php echo $_GET['dataAl'] ?> per il utente:
                <?php
                    $res = $conn->query("SELECT * FROM loginfo WHERE id=".$_GET['utente']);
                    $utente = $res->fetch_assoc();
                    echo $utente['username']
                ?></h4>
            </div>
            <div class="insert">
                <a href="http://localhost/Progetto/frontend/insertStipendio.php">Inserisci stipendio</a>
            </div>
        </div>
        <table class="tabella">
            <thead>
                <th class="headings">Stipendio</th>
                <th class="headings">Descrizione</th>
                <th class="headings">Inizio periodo</th>
                <th class="headings">Fine periodo</th>
                <?php echo ($_SESSION['isadmin']) ? "<th class='headings'>Utente</th>" : '' ?>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["stipendio"];?> €</td>
                        <td><?php echo $row["descrizione"];?> €</td>
                        <td><?php echo $row["inizio_periodo"]; ?></td>
                        <td><?php echo $row["fine_periodo"]; ?></td>
                        <?php echo ($_SESSION['isadmin']) ? '<td>'.$row["nome"].' '.$row['cognome'].' (id = <b>'.$row['id_utente'].'</b>)</td>' : '' ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php require_once '../frontend/footer.php'; ?>