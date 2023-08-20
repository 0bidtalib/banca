<?php
    require_once '../backend/conn.php';
    require_once '../frontend/header.php';
    $sql_cat = 'SELECT * FROM categorie WHERE id='.$_GET['categoria'];
    $res_cat = $conn->query($sql_cat);
    $row_cat = $res_cat->fetch_assoc();
    if ($_GET['categoria'] == '999') {
        $sql = 'SELECT uscite.*, categorie.id AS cat_id, categorie.descrizione AS cat_desc FROM uscite INNER JOIN categorie ON uscite.categoria = categorie.id';
    } else {
        $sql = 'SELECT uscite.*, categorie.id AS cat_id, categorie.descrizione AS cat_desc FROM uscite INNER JOIN categorie ON uscite.categoria = categorie.id WHERE uscite.categoria='.$_GET['categoria'];
    }
    if (!$_SESSION['isadmin']) {
        $sql = $sql . ' AND uscite.utente='.$_SESSION['userID'];
    }
    if (strlen($_GET['filtroDataDal']) > 0) {
        $sql = $sql . ' AND uscite.data>="'.$_GET['filtroDataDal'].'"';
    }
    if (strlen($_GET['filtroDataAl']) > 0) {
        $sql = $sql . ' AND uscite.data<="'.$_GET['filtroDataAl'].'"';
    }
    $sql .= ' ORDER BY uscite.data DESC';
    $res = $conn->query($sql);
    $tot = 0;
    while ($row_temp = $res->fetch_assoc()) {
        $tot += $row_temp['importo'];
    }
    $result = $conn->query($sql);
?>
    <div class="testa">
        <div class="title">
            <h1>Gestione uscite per categoria</h1>
        </div>
        <div class="greetings">
            <h2>Totale: <?php echo $tot ?> €</h2>
        </div>
    </div>

    <div class="body">
        <div class="table-upper">
            <div class="back">
                <a href="http://localhost/Progetto/frontend/gestioneUscite.php">Back</a>
            </div>
        </div>

        <table class="tabella">
            <br>
            <div class="table-upper">
                <h3>Categoria:
                <?php
                echo ($_GET['categoria'] == '999') ? 'Tutti' : $row_cat['key_word'];
                    if (strlen($_GET['filtroDataDal'])>0) {
                        echo ' - dal: ' . $_GET['filtroDataDal'];
                    }

                    if (strlen($_GET['filtroDataAl'])>0) {
                        echo ' al: ' . $_GET['filtroDataAl'];
                    }
                ?></h3>
            </div>
            <thead>
                <th class="headings">Data</th>
                <th class="headings">Importo</th>
                <th class="headings">Descrizione</th>
                <th class="headings">Categoria</th>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["data"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td><?php echo $row["importo"]; ?> €&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td><?php echo $row["descrizione"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td><?php echo $row["cat_id"].'-'.$row["cat_desc"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <?php
                            $url = urlencode('idMod='.$row['id'].'&dataMod="'.$row["data"].'"&importoMod='.$row["importo"].'&descMod="'.$row["descrizione"].'"&catMod='.$row['cat_id']);
                        ?>
                        <td><a href="modificaUscita.php?<?php echo $url; ?>">Modifica</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php require_once '../frontend/footer.php' ?>