<!DOCTYPE html>
<html>
    <head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>SFT</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
        <link rel="stylesheet" href="/fi.licursi/css/style.css">
    </head>
    <body>
	<header>
	<h1 align=center>Società Ferroviaria Turistica</h1>
	 <?php include('/fi.licursi/database.php');?> 
        <nav>
            <ul>
               <li><a href="/fi.licursi/index.php">Home</a></li>
                <li><a href="/fi.licursi/php/backoffice_esercizio2.php">Backoffice Esercizio</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
		<?php
				error_reporting(E_ALL);
				ini_set('display_errors', 1);
				$servername = "mysql.57gimp.home";
                $username_db = "fi.licursi";
                $password_db = "kJ1L27dW";
                $dbname = "fi_licursi";

                $conn = new mysqli($servername, $username_db, $password_db, $dbname);

                if ($conn->connect_error) {
                    die("Connessione fallita: " . $conn->connect_error);
                }


		$cdquery = "SELECT * FROM SFT_composizioneTreno WHERE idTreno='" . $_GET["idTreno"] . "'";
		$cdresult = mysqli_query($conn, $cdquery);
		echo "
<table>
<thead><td>Treno numero |</td><td>Treno nome |</td><td>Stazione partenza |</td><td>Ora di arrivo |</td><td>Stazione di arrivo |</td><td>Ora partenza |</td><td>Giorno |</td><td>Distanza |</td></thead>
";
		while ($cdrow = mysqli_fetch_array($cdresult)) {
			echo "
<tr><td>" . $cdrow['idTreno'] . "</td><td>" . $cdrow['tname'] . "</td><td>" . $cdrow['sp'] . "</td><td>" . $cdrow['st'] . "</td><td>" . $cdrow['dp'] . "</td><td>" . $cdrow['dt'] . "</td><td>" . $cdrow['dd'] . "</td><td>" . $cdrow['distance'] . "</td></tr>
";
		}
		echo "</table>";



		$cdquery = "SELECT * FROM SFT_schedule where id='" . $_GET["idTreno"] . "' ORDER BY distance ASC  ";
		$cdresult = mysqli_query($conn, $cdquery);
		$stations = array();
		$arrival = array();
		$departure = array();
		$distance = array();
		$i = 0;
		while ($cdrow = mysqli_fetch_array($cdresult)) {
			$stations[$i] = $cdrow["nome"];
			$arrival[$i] = $cdrow["arrival_time"];
			$departure[$i] = $cdrow["departure_time"];
			$distance[$i] = $cdrow["distance"];
			$i += 1;
		}

	echo "
    <table>
        <thead>
            <th>Treno numero</th>
            <th>Stazione partenza</th>
            <th>Ora di arrivo</th>
            <th>Stazione destinazione</th>
            <th>Ora di partenza</th>
            <th>Distanza</th>
            <th></th>
        </thead>
    ";
    $temp = 0;
    while ($temp < $i - 1) {
        echo "
        <tr>
            <td>" . ($temp + 1) . "</td>
            <td>" . $stations[$temp] . "</td>
            <td>" . $departure[$temp] . "</td>
            <td>" . $stations[$temp + 1] . "</td>
            <td>" . $arrival[$temp + 1] . "</td>
            <td>" . ($distance[$temp + 1] - $distance[$temp]) . "</td>
            <td>
                <a href=\"/fi.licursi/php/seat_plan.php?idTreno=" . urlencode($_GET["idTreno"]) . "&sp=" . urlencode($stations[$temp]) . "&dp=" . urlencode($stations[$temp + 1]) . "\">
                    <button>Seat Plan</button>
                </a>
            </td>
        </tr>
        ";
        $temp += 1;
    }
    echo "</table>";
    ?>
        </section>
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

		</main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> prova itinere per Base di Dati</p>
    </footer>

    
    <!--<script src="/fi.licursi/scriptjs/script.js"></script>-->
    </body>
</html>