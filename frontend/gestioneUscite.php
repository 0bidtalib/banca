<?php
    require_once '../frontend/header.php';
    require_once '../backend/conn.php';
    if ($_SESSION['isadmin']) {
        $sql = "SELECT uscite.*, loginfo.*, categorie.id AS cat_id, categorie.descrizione AS cat_desc FROM uscite INNER JOIN categorie ON uscite.categoria = categorie.id INNER JOIN loginfo ON uscite.utente = loginfo.id WHERE data>='".date('Y-m-01')."' AND data<='".date('Y-m-t')."'";
    } else {
        $sql = "SELECT uscite.*, categorie.id AS cat_id, categorie.descrizione AS cat_desc FROM uscite INNER JOIN categorie ON uscite.categoria = categorie.id WHERE utente=".$_SESSION['userID']." AND data>='".date('Y-m-01')."' AND data<='".date('Y-m-t')."'";
    }
    $result1 = $conn->query($sql);
    $totale = 0;
    while ($row = $result1->fetch_assoc()) {
        $totale += $row['importo'];
    }
    $result = $conn->query($sql);
?>
    <div class="title">
        <h1>Gestione uscite</h1>
    </div>
    <br>
    <a href="http://localhost/Progetto/frontend/insertUscita.php">Inserisci uscita</a>
    <br><br>
    <a href="http://localhost/Progetto/frontend/index.php">back</a>
    <br><br>
    <h2>Totale: <?php echo $totale; ?> €</h2>
    <br>
    
    <form action="../frontend/byCategoria.php" method="get">
        <h4>&nbsp;Selezione per categoria:</h4>
        <select name="categoria">
            <?php
                $sql_categorie = 'SELECT * FROM categorie';
                $res_cat = $conn->query($sql_categorie);
                while ($row_cat = $res_cat->fetch_assoc()) {
            ?>
                <option value=<?php echo $row_cat['id'] ?>><?php echo $row_cat['key_word'] ?></option>
            <?php } ?>
        </select>
        <br><br>
        <h3>&nbsp;o/e data:</h3>
        <label for="filtroDataDal">Data dal:</label>
        <input type="date" name="filtroDataDal">
        <br><br>
        <label for="filtroDataAl">data al:</label>
        <input type="date" name="filtroDataAl">
        <br><br>
        <input type="submit" value="Cerca">
    </form>
    
    <br>
    <table>
        <thead>
            <th class="headings">Data</th>
            <th class="headings">Importo</th>
            <th class="headings">Descrizione</th>
            <th class="headings">Categoria</th>
            <?php
                if ($_SESSION['isadmin']) {
                    echo "<th class='headings'>Utente</th>";
                }
            ?>
        </thead>
        <tbody>
        <?php
            while ($row = $result->fetch_assoc()) {
                $totale += $row['importo'];
        ?>
            <tr>
                <td><?php echo $row["data"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo $row["importo"]; ?> €&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo $row["descrizione"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo $row["cat_id"].'-'.$row["cat_desc"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <?php
                    if ($_SESSION['isadmin']) {
                        echo "<td>".$row['username']."</td>";
                    }
                ?>
                <td><a href="eliminaUscita.php?idUscita=<?php echo $row['id'] ?>">Elimina</a></td>
            </tr>
        <?php } ?>
    </tbody>
    </table>
    <br>
<?php require_once '../frontend/footer.php'; ?>
