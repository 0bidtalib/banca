<?php
    require_once '../frontend/header.php';
    require_once '../backend/conn.php';
    if (!$_SESSION['isadmin']) {
        echo 'You are not allowed to access this page.';
    }
?>
    <div class="testa">
        <div class="title">
            <h1>Creazione categoria</h1>
        </div>
    </div>

    <div class="body">
        <div class="table-upper">
            <div class="back">
                <a href="http://localhost/Progetto/frontend/categorie.php">Back</a>
            </div>
        </div>
        <div class="form">
            <form action="http://localhost/Progetto/backend/insertCategoria.php" method="get">
                <div class="" style="margin-bottom:20px">
                    <label for="key_word">Key Word</label>
                    <input type="text" name="key_word" placeholder="Key word per la categoria">
                </div>
                <div class="" style="margin-bottom:20px">
                    <label for="descrizione">Descrizione</label>
                    <input type="text" name="descrizione" placeholder="Inserire la descrizione della categoria">
                </div>
                <div class="" style="display: flex; justify-content: center;">
                    <input style="padding: 10px; width:100px; background-color: green; font-weight: bold; letter-spacing: 1px" type="submit" value="Crea">
                </div>
            </form>
        </div>
    </div>
<?php require_once '../frontend/footer.php'; ?>