<?php
    require_once '../backend/conn.php';
    require_once '../frontend/header.php';

    $sql_cat = 'SELECT * FROM categorie WHERE id='.$_GET['categoria'];
    $res_cat = $conn->query($sql_cat);
    $row_cat = $res_cat->fetch_assoc();

    $sql = 'SELECT uscite.*, categorie.id AS cat_id, categorie.descrizione AS cat_desc FROM uscite INNER JOIN categorie ON uscite.categoria = categorie.id WHERE uscite.categoria='.$_GET['categoria'];
    if (!$_SESSION['isadmin']) {
        $sql = $sql . ' AND utente='.$_SESSION['userID'];
    }
    if (strlen($_GET['filtroDataDal']) > 0) {
        $sql = $sql . ' AND uscite.data>="'.$_GET['filtroDataDal'].'"';
    }
    if (strlen($_GET['filtroDataAl']) > 0) {
        $sql = $sql . ' AND data<="'.$_GET['filtroDataAl'].'"';
    }
    // if (strlen($_GET['filtroDataDal']) == 0 && strlen($_GET['filtroDataAl']) == 0) {
    //     $_GET['filtroDataDal'] = date('Y-m-01');
    //     $_GET['filtroDataAl'] = date('Y-m-d');
    //     $sql = $sql . ' AND uscite.data>="'.$_GET['filtroDataDal'].'" AND data<="'.$_GET['filtroDataAl'].'"';
    // }
    $res = $conn->query($sql);
    $tot = 0;
    while ($row_temp = $res->fetch_assoc()) {
        $tot += $row_temp['importo'];
    }
    $result = $conn->query($sql);
?>
    <div class="title">
        <h1>Gestione uscite per categoria</h1>
    </div>
    <br>
    <h3>Categoria:
    <?php 
        echo $row_cat['key_word'];
        if (strlen($_GET['filtroDataDal'])>0) {
            echo ' - dal: ' . $_GET['filtroDataDal'];
        }

        if (strlen($_GET['filtroDataAl'])>0) {
            echo ' al: ' . $_GET['filtroDataAl'];
        }
    ?></h3>
    <br>
    <h3>Totale: <?php echo $tot ?> €</h3>
    <br>
    <a href="http://localhost/Progetto/frontend/gestioneUscite.php">Back</a>
    <br><br>

    <table>
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
    <br>
<?php require_once '../frontend/footer.php' ?>
