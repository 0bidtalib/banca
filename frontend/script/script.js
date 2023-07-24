// const stipendio = document.getElementById("stipendio");
// const inizio = document.getElementById("dataInizio");
// const fine = document.getElementById("dataFine");

// function salvaStipendio() {
//     console.log("stipendio: " + stipendio.value);
//     console.log("dal: " + inizio.value);
//     console.log("al: " + fine.value);
// }

// const importo = document.getElementById("importo");
// const dataImporto = document.getElementById("dataImporto");

// function salvaOperazione() {
//     console.log("Importo: " + importo.value);
//     console.log("data operazione: " + dataImporto.value);
// }

function goToTable(e) {
    console.log("table: "+ e);
    // headers("location: http://localhost/Progetto/frontend/table.php")
}

function goToInsert() {
    console.log("insert");
    headers("location: http://localhost/Progetto/frontend/insert.php")
}

function goToInsertOperation() {
    console.log("insertOperation");
    headers("location: http://localhost/Progetto/frontend/insertOperation.php")
}