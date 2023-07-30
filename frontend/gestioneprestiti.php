<?php
    require_once '../frontend/header.php';
    require_once '../backend/conn.php';
    if (!$_SESSION['isadmin']) {
        echo 'not allowed!';
    }
    $sql = "SELECT presititigente.*, loginfo.username FROM presititigente INNER JOIN loginfo ON presititigente.a_chi = loginfo.id";
    $result = $conn->query($sql);
    $totale = 0;
    $res = $conn->query($sql);
    while ($r = $res->fetch_assoc()) {
        $totale += $r['quanto'];
    }
?>
    <div class="testa">
        <div class="title">
            <h1>Gestione prestiti</h1>
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
            <div class="insert">
                <a href="http://localhost/Progetto/frontend/insertPrestito.php">Inserisci</a>
            </div>
        </div>
        <table class="tabella">
            <thead>
                <th class="headings">Da chi</th>
                <th class="headings">Per cosa</th>
                <th class="headings">Quando</th>
                <th class="headings">Quanto</th>
                <th class="headings">A chi</th>
                <th class="headings">Resitituito</th>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["da_chi"];?></td>
                        <td><?php echo $row["per_cosa"];?></td>
                        <td><?php echo $row["quando"]; ?></td>
                        <td><?php echo $row["quanto"]; ?> €</td>
                        <td><?php echo $row["username"]; ?></td>
                        <td><?php echo ($row["restituzione"]) ? 'restituito' : 'non ancora' ; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php require_once '../frontend/footer.php'; ?>