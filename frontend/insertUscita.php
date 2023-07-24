<?php
    require_once '../frontend/header.php';
    require_once '../backend/conn.php';
    $res = $conn->query('SELECT * FROM categorie');
?>
    <h1>Inserisci Uscita</h1><br>
    
    <a href="http://localhost/Progetto/frontend/gestioneUscite.php">back</a>
    <br><br>
    <h3>Inserisci gli importi di tutte le operazioni:</h3><br>

    <form action="http://localhost/Progetto/backend/insertUscita.php" method="post">
        <label for="importo">Importo: </label>
        <input type="" name="importo" placeholder="importo"><br><br>

        <label for="descrizione">Descrizione:</label>
        <input type="text" name="descrizione" placeholder="motivo della transazione"><br><br>

        <label for="dataImporto">Data:</label>
        <input type="date" name="dataImporto" placeholder="data operazione"><br><br>

        <select name="categoria">Categoria:
            <?php while ($row = $res->fetch_assoc()) { ?>
                <option value=<?php echo $row['id'] ?>><?php echo $row['id'] .'->'.$row['key_word']  ?></option>
            <?php } ?>
        </select><br><br>

        <input type="submit" value="Inserisci"><br><br>
    </form>
    <br>
<?php require_once '../frontend/footer.php'; ?>