<?php
    require_once '../frontend/header.php';
    require_once '../backend/conn.php';
    if ($_SESSION['isadmin']) {
        $sql = "SELECT entrate.*, users.nome, users.cognome, users.id AS id_utente FROM entrate INNER JOIN users ON entrate.utente = users.id WHERE inizio_periodo>='2023/06/01'";
    } else {
        $sql = "SELECT * FROM entrate WHERE utente=".$_SESSION['userID']." AND inizio_periodo>='2023/06/01'";
    }
    $result = $conn->query($sql);
    $totale = 0;
?>
    <div class="testa">
        <div class="title">
            <h1>Gestione dello stipendio</h1>
        </div>

        <div class="insert">
            <a href="http://localhost/Progetto/frontend/insertStipendio.php">Inserisci stipendio</a>
        </div>

        <div class="back">
            <a href="http://localhost/Progetto/frontend/index.php">back</a>
        </div>
    </div>
    
    <table>
        <thead>
            <th class="headings">Stipendio</th>
            <th class="headings">Descrizione</th>
            <th class="headings">Inizio periodo</th>
            <th class="headings">Fine periodo</th>
            <?php
                if($_SESSION['isadmin']) {
                    echo "<th class='headings'>Utente</th>";
                }
            ?>
        </thead>
        <tbody>
        
        <?php
            while($row = $result->fetch_assoc()) {
                $totale = $row["stipendio"] + $totale;
        ?>
            <tr>
                <!-- <td><?php //echo $row["id"] ?></td> -->
                <td><?php echo $row["stipendio"];?> €&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo $row["descrizione"];?> €&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo $row["inizio_periodo"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo $row["fine_periodo"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <?php
                    if ($_SESSION['isadmin']) {
                        echo '<td>'.$row["nome"].' '.$row['cognome'].' (id = <b>'.$row['id_utente'].'</b>)</td>';
                    }
                 ?>
            </tr>
        <?php } ?>
        
    </tbody>
    </table>
    <br><br>
    <h2>Totale: <?php echo $totale?> €</h2>
<?php require_once '../frontend/footer.php'; ?>