<?php
    require_once '../frontend/header.php';
    require_once '../backend/conn.php';
    if ($_SESSION['isadmin']) {
        $sql = "SELECT uscite.*, loginfo.*, categorie.id AS cat_id, categorie.descrizione AS cat_desc FROM uscite INNER JOIN categorie ON uscite.categoria = categorie.id INNER JOIN loginfo ON uscite.utente = loginfo.id ORDER BY uscite.data DESC";
    } else {
        $sql = "SELECT uscite.*, categorie.id AS cat_id, categorie.descrizione AS cat_desc FROM uscite INNER JOIN categorie ON uscite.categoria = categorie.id WHERE utente=".$_SESSION['userID']. " ORDER BY uscite.data DESC";
    }
    $result1 = $conn->query($sql);
    $totale = 0;
    while ($row = $result1->fetch_assoc()) {
        $totale += $row['importo'];
    }
    $result = $conn->query($sql);
?>
    <div class="testa">
        <div class="title">
            <h1>Gestione uscite</h1>
        </div>
        <div class="greetings">
            <h2>Totale: <?php echo $totale; ?> €</h2>
        </div>
    </div>

    <div class="body">
        <div class="table-upper">
            <div class="back">
                <a href="http://localhost/Progetto/frontend/index.php">back</a>
            </div>
            <div class="filter">
                <form action="http://localhost/Progetto/frontend/gestioneUsciteByFiltro.php" method="get">
                    Dal: <input type="date" name="dataDal"> Al: <input type="date" name="dataAl">
                    <select name="utente">
                    <?php
                        if ($_SESSION['isadmin']) {
                            $risultato = $conn->query("SELECT * FROM loginfo");
                            while ($row = $risultato -> fetch_assoc() ) {
                    ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['username'] ?></option>
                    <?php }} ?>
                    </select>
                    <input type="submit" value="Search">
                </form>
            </div>
            <div class="insert">
                <a href="http://localhost/Progetto/frontend/insertUscita.php">Inserisci uscita</a>
            </div>
        </div>
        <table class="tabella">
            <br>
            <div class="table-upper">
                <form action="../frontend/byCategoria.php" method="get">
                    <h4 class="greetings">Selezione per categoria:</h4>
                    <select name="categoria">
                        <?php
                            $sql_categorie = 'SELECT * FROM categorie';
                            $res_cat = $conn->query($sql_categorie);
                            while ($row_cat = $res_cat->fetch_assoc()) {
                        ?>
                            <option value=<?php echo $row_cat['id'] ?>><?php echo $row_cat['key_word'] ?></option>
                        <?php } ?>
                    </select>
                    <h3>o/e data:</h3>
                    <label for="filtroDataDal">Data dal:</label>
                    <input type="date" name="filtroDataDal">
                    
                    <label for="filtroDataAl">data al:</label>
                    <input type="date" name="filtroDataAl">

                    <input type="submit" value="Cerca">
                </form>
            </div>
            <thead>
                <th class="headings">Data</th>
                <th class="headings">Importo</th>
                <th class="headings">Descrizione</th>
                <th class="headings">Categoria</th>
                <?php echo ($_SESSION['isadmin']) ? "<th class='headings'>Utente</th>" : '' ?>
                <th class="headings">Azione</th>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["data"]; ?></td>
                        <td><?php echo $row["importo"]; ?> €</td>
                        <td><?php echo $row["descrizione"]; ?></td>
                        <td><?php echo $row["cat_id"].'-'.$row["cat_desc"]; ?></td>
                        <?php echo ($_SESSION['isadmin']) ? "<td>".$row['username']."</td>" : '' ?>
                        <td><a href="eliminaUscita.php?idUscita=<?php echo $row['id'] ?>">Elimina</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php require_once '../frontend/footer.php'; ?>