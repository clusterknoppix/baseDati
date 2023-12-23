<?php
// Inizio sessione (ricordarsi di verificare che sia presente all'inizio di ogni pagina che utilizza le sessioni)
session_start();

// Controlla se l'utente è autenticato (puoi personalizzare questa condizione in base alle tue esigenze)
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    // Elimina tutte le variabili di sessione
    session_unset();

    // Distrugge la sessione
    session_destroy();

    // Reindirizza l'utente alla home page 
    header("Location: /fi.licursi/index.php");
    exit();
} else {
    // L'utente non è autenticato, Reindirizzo alla home page
    header("Location: /fi.licursi/index.php");
    exit();
}
?>