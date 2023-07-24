<?php
    require_once '../frontend/header.php';
    require_once '../backend/conn.php';

    $sql = 'SELECT * FROM categorie';
    $result = $conn->query($sql);
?>
<h1>Categorie</h1>
<br>
<a href="http://localhost/Progetto/frontend/insertCategoria.php">Crea una categoria</a>
<br><br>
<a href="http://localhost/Progetto/frontend/index.php">Back</a>
<br>
<table>
    <thead>
        <th class="headings">ID</th>
        <th class="headings">Key word</th>
        <th class="headings">Descrizione</th>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()) {?>
            <tr>
                <td><?php echo $row['id'] ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo $row['key_word'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo $row['descrizione'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php require_once '../frontend/footer.php' ?>