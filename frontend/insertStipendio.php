<?php
    require_once '../backend/conn.php';
    require_once '../frontend/header.php';
?>
    <h1>Inserimento stipendio</h1><br>
    <h4>inserisci lo stipendio che ricevuto:</h4><br>
    <form action="http://localhost/Progetto/backend/insertStipendio.php" method="post">
        <label for="stipendio">Stipendio</label>
        <input type="text" name="stipendio" id="stipendio" placeholder="inserire stipendio"><br><br>

        <label for="descrizione">Descrizione</label>
        <input type="text" name="descrizione" placeholder="da dove deriva"><br><br>
        
        <p>indicare il periodo</p><br>
        <label for="inizio_periodo">Dal:</label>
        <input type="date" name="inizio_periodo" id="dataInizio" placeholder="specificare l'inizio">

        <label for="fine_periodo">Al:</label>
        <input type="date" name="fine_periodo" id="dataFine" placeholder="specificare la fine"><br><br>

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

        <input type="submit" value="Salva">
    </form>
    <br>
    <a href="http://localhost/Progetto/frontend/index.php">back</a>
<?php require_once '../frontend/footer.php'; ?>