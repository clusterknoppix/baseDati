<?php include('/fi.licursi/database.php');
// Ricezione dei dati dal modulo HTML
$treno = $_POST["treno"];
$quantita = $_POST["quantita"];
$tratta = $_POST["tratta"];
$orario_partenza = $_POST["orario_partenza"];
$orario_arrivo = $_POST["orario_arrivo"];

// Esempio di inserimento dei dati nel database
$sql = "INSERT INTO treni (tipo, quantita, tratta, orario_partenza, orario_arrivo) VALUES ('$treno', $quantita, '$tratta', '$orario_partenza', '$orario_arrivo')";

if ($conn->query($sql) === TRUE) {
    echo "Treno aggiunto con successo!";
} else {
    echo "Errore nell'aggiunta del treno: " . $conn->error;
}

// Chiudi la connessione al database
$conn->close();
?>
