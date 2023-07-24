<?php require_once '../frontend/header.php'; ?>
    <h1>Inserimento stipendio</h1>
    <h4>inserisci lo stipendio che ricevuto:</h4>
    <form action="http://localhost/Progetto/backend/insertStipendio.php" method="post">
        <label for="stipendio">Stipendio</label>
        <input type="text" name="stipendio" id="stipendio" placeholder="inserire stipendio">
        
        <p>indicare il periodo</p>
        <label for="inizio_periodo">Dal:</label>
        <input type="date" name="inizio_periodo" id="dataInizio" placeholder="specificare l'inizio">

        <label for="fine_periodo">Al:</label>
        <input type="date" name="fine_periodo" id="dataFine" placeholder="specificare la fine">

        <br><br>
        <input type="submit" value="Salva">
    </form>
    <br>
    <a href="http://localhost/Progetto/frontend/index.php">back</a>
<?php require_once '../frontend/footer.php'; ?>
