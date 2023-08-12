<?php
    require_once '../frontend/header.php';
    require_once '../backend/conn.php';
    if ($_SESSION['isadmin']) {
        $sql = "SELECT entrate.*, users.nome, users.cognome, users.id AS id_utente FROM entrate INNER JOIN users ON entrate.utente = users.id";
    } else {
        $sql = "SELECT * FROM entrate WHERE utente=".$_SESSION['userID'];
    }
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
                <a href="http://localhost/Progetto/frontend/index.php">back</a>
            </div>
            <div class="filter">
                <form action="http://localhost/Progetto/frontend/gestioneEntrateByFiltro.php" method="get">
                    Dal: <input type="date" name="dataDal"> Al: <input type="date" name="dataAl">
                    <?php
                        if ($_SESSION['isadmin']) {
                            echo '<select name="utente">';
                            $risultato = $conn->query("SELECT * FROM loginfo");
                            while ($row = $risultato -> fetch_assoc() ) {
                    ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['username'] ?></option>
                    <?php } echo '</select>'; } ?>
                    
                    <input type="submit" value="Search">
                </form>
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
                <th class="headings"></th>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["stipendio"];?> €</td>
                        <td><?php echo $row["descrizione"];?> €</td>
                        <td><?php echo $row["inizio_periodo"]; ?></td>
                        <td><?php echo $row["fine_periodo"]; ?></td>
                        <?php echo ($_SESSION['isadmin']) ? '<td>'.$row["nome"].' '.$row['cognome'].' (id = <b>'.$row['id_utente'].'</b>)</td>' : '' ?>
                        <td><a href="http://localhost/Progetto/frontend/eliminaEntrata.php?idEntrata=<?php echo $row["id"];?>">Elimina</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php require_once '../frontend/footer.php'; ?>