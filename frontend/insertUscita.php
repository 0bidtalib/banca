<?php
    require_once '../frontend/header.php';
    require_once '../backend/conn.php';
    $res = $conn->query('SELECT * FROM categorie');
?>
    <div class="testa">
        <div class="title">
            <h1>Inserisci Uscita</h1>
        </div>
    </div>
    
    <div class="body">
        <div class="table-upper">
            <div class="back">
                <a href="http://localhost/Progetto/frontend/gestioneUscite.php">back</a>
            </div>
        </div>
        <div style="position: absolute; top: 67px; left: 39%; margin: auto">
            <h3 style="letter-spacing: 1px;">Inserisci gli importi di tutte le operazioni:</h3><br>
        </div>
        <div class="form">
            <form action="http://localhost/Progetto/backend/insertUscita.php" method="post">
                <div style="margin-bottom:20px; margin-top: 20px;">
                    <label for="importo">Importo: </label>
                    <input type="" name="importo" placeholder="importo">
                </div>

                <div style="margin-bottom:20px">
                    <label for="descrizione">Descrizione:</label>
                    <input type="text" name="descrizione" placeholder="motivo della transazione">
                </div>

                <div style="margin-bottom:20px">
                    <label for="dataImporto">Data:</label>
                    <input type="date" name="dataImporto" placeholder="data operazione">
                </div>

                <div style="margin-bottom:20px">
                    <select name="categoria">Categoria:
                        <?php while ($row = $res->fetch_assoc()) { ?>
                            <option value=<?php echo $row['id'] ?>><?php echo $row['id'] .'->'.$row['key_word']  ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div style="display: flex; justify-content: center;">
                    <input style="padding: 10px; width:100px; background-color: green; font-weight: bold; letter-spacing: 1px" type="submit" value="Inserisci">
                </div>
            </form>
        </div>
    </div>
<?php require_once '../frontend/footer.php'; ?>