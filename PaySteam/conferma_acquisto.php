<h1>Conferma Acquisto</h1>

    <?php
	error_reporting(E_ALL);
				ini_set('display_errors', 1);
    // Simulazione di un carrello con un prezzo fisso
    $prezzoProdotto = 50.00;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Elabora il pagamento qui

        // Puoi utilizzare questa sezione per aggiornare il database o inviare i dettagli del pagamento a un gateway di pagamento esterno
        // ...

        echo "<p>Acquisto confermato! Grazie per il tuo ordine.</p>";
    }
    ?>

    <form method="post" action="">
        <p>Totale: €<?php echo number_format($prezzoProdotto, 2); ?></p>
        <button type="submit" name="confermaAcquisto">Conferma Acquisto</button>
    </form>