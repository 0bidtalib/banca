<?php
    require_once '../backend/conn.php';
    require_once '../frontend/header.php';
?>
    <div class="testa">
        <div class="title">
            <h1>Inserimento stipendio</h1>
        </div>
    </div>
    <div class="body">
        <div class="table-upper">
            <div class="back">
                <a href="http://localhost/Progetto/frontend/index.php">back</a>
            </div>
        </div>
        <div style="position: absolute; top: 67px; left: 39%; margin: auto">
            <h3 style="letter-spacing: 1px;">Inserisci lo stipendio che ricevuto</h3>
        </div>
        <div class="form">
            <form action="http://localhost/Progetto/backend/insertStipendio.php" method="post">
                <div style="margin-bottom:20px; margin-top: 10px">
                    <label for="stipendio">Stipendio</label>
                    <input type="text" name="stipendio" id="stipendio" placeholder="inserire stipendio">
                </div>
                
                <div style="margin-bottom:20px">
                    <label for="descrizione">Descrizione</label>
                    <input type="text" name="descrizione" placeholder="da dove deriva">
                </div>
                
                <div style="margin-bottom:20px">
                    <p>indicare il periodo</p><br>
                    <label for="inizio_periodo">Dal:</label>
                    <input type="date" name="inizio_periodo" id="dataInizio" placeholder="specificare l'inizio">

                    <label for="fine_periodo">Al:</label>
                    <input type="date" name="fine_periodo" id="dataFine" placeholder="specificare la fine">
                </div>

                <div style="margin-bottom:20px">
                    <?php
                        if ($_SESSION['isadmin']) {
                            $sql = "SELECT * FROM loginfo";
                            $result = $conn->query($sql);
                    ?>
                        <label for="utente">Scegliere l'utente:</label>
                        <select name="utente">
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['username'] ?></option>
                            <?php } ?>
                        </select>
                    <?php } ?>
                </div>

                <div style="display: flex; justify-content: center;">
                    <input style="padding: 10px; width:100px; background-color: green; font-weight: bold; letter-spacing: 1px" type="submit" value="Salva">
                </div>
            </form>
        </div>
    </div>
<?php require_once '../frontend/footer.php'; ?>