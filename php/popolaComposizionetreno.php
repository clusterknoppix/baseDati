<!DOCTYPE html>
<html>
    <head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>SFT</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
        <link rel="stylesheet" href="/fi.licursi/css/style.css">
		<title> popola combo treno </title>
    </head>
    <body>
	<header>
        <h1 align=center>Società Ferroviaria Turistica</h1>
        <nav>
            <ul>
                <li><a href="/fi.licursi/index.php">Home</a></li>
                <li><a href="/fi.licursi/php/backoffice_esercizio2.php"> Torna a BackOffice esercizio</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
		<?php
	error_reporting(E_ALL); ini_set('display_errors', 1);
	echo "dettagli nuovo treno..";
	session_start();
				$servername = "mysql.57gimp.home";
                $username_db = "fi.licursi";
                $password_db = "kJ1L27dW";
                $dbname = "fi_licursi";

                $conn = new mysqli($servername, $username_db, $password_db, $dbname);

                if ($conn->connect_error) {
                    die("Connessione fallita: " . $conn->connect_error);
                }
	
	if (isset($_POST["ns"])) {
		$ns = $_POST["ns"];
		$tname = $_POST["tname"];
		$_SESSION["tname"] = "$tname"; //nome treno
		//aggiunta variabili campo nome carrozza
		$nc = $_POST["nc"];
		$_SESSION["nc"] = "$nc"; 
		//creata variabile per max posti
		$maxposti = $_POST["maxposti"];
		$_SESSION["maxposti"] = "$maxposti"
		$sp = $_POST["sp"];	//stazione partenza
		$_SESSION["sp"] = "$sp";
		$st = $_POST["st"];		//orario partenza
		$_SESSION["st"] = "$st";
		$dp = $_POST["dp"];
		$_SESSION["dp"] = "$dp"; //stazione arrivo
		$dt = $_POST["dt"];
		$_SESSION["dt"] = "$dt"; //orario arrivo
		$dd = $_POST["dd"];
		$_SESSION["dd"] = "$dd"; //giorno di arrivo
		$ns = $_POST["ns"];
		$_SESSION["ns"] = "$ns"; //numero stazioni intermedie
		$ds = $_POST["ds"];
		$_SESSION["ds"] = "$ds"; //distanza complessiva

		echo "<table><thead><td>nome Treno |</td><td>carrozza |</td><td>posti disponibili |</td><td>stazione partenza |</td><td>orario partenza |</td><td>Stazione arrivo |</td><td>orario di arrivo |</td><td>giorno di arrivo |</td><td>Stazioni intermedie |</td><td>distanza |</td></thead>";
		echo "<tr><td>" . $tname . "</td><td>" . $nc . "</td><td>" . $maxposti . "</td><td>" . $sp . "</td><td>" . $st . "</td><td>" . $dp . "</td><td>" . $dt . "</td><td>" . $dd . "</td><td>" . $ns . "</td><td>" . $ds . "</td></tr></table>";

		echo " <table><thead><td>SFT_Motrice</td><td>Arrival_Time</td><td>Departure_Time</td><td>Distance</td></thead>";
		echo " <tr><td>" . $sp . "</td><td>" . $st . "</td><td>" . $st . "</td><td>0</td></tr>";

		echo "<form action=\"popolaComposizionetreno2.php\" method=\"post\">";
		$temp = 1;
		while ($temp <= $ns) {
			echo " <tr><td><select id=\"stn" . $temp . "\" name=\"stn" . $temp . "\"required> ";

			$cdquery = "SELECT nome FROM SFT_Motrice";
			$cdresult = mysqli_query($conn, $cdquery);

			echo " <option value = \"\" > </option>";

			while ($cdrow = mysqli_fetch_array($cdresult)) {
				$cdTitle = $cdrow['nome'];
				echo " <option value = \"$cdTitle\" > $cdTitle </option>";
			}

			echo "
	</select></td>
	<td><input type=\"text\" name=\"st" . $temp . "\" required></td>
	<td><input type=\"text\" name=\"dt" . $temp . "\" required></td>
	<td><input type=\"text\" name=\"ds" . $temp . "\" required></td>	
	</tr>";
			$temp += 1;
		}

		echo " <tr><td>" . $dp . "</td><td>" . $dt . "</td><td>" . $dt . "</td><td>" . $ds . "</td></tr></table>";
		echo "<input type=\"submit\">";
	} else if ($ns == 0) {
		echo "
<form action=\"popolaComposizionetreno.php\" method=\"post\">
<table>
<tr><td>Train Name </td><td> <input type=\"text\" name=\"tname\" required></td></tr>
<tr><td>Starting Point </td><td> <select id=\"sp\" name=\"sp\" required>
";

		$cdquery = "SELECT nome FROM SFT_Motrice";
		$cdresult = mysqli_query($conn, $cdquery);

		while ($cdrow = mysqli_fetch_array($cdresult)) {
			$cdTitle = $cdrow['nome'];
			echo " <option value = \"$cdTitle\" > $cdTitle </option>";
		}

		echo "

</select></td></tr>

<tr><td>Starting Time </td><td> <input type=\"time\" name=\"st\" required></td></tr>

<tr><td>Destination Point </td><td> <select id=\"dp\" name=\"dp\" required>

";

		$cdquery = "SELECT nome FROM SFT_Motrice";
		$cdresult = mysqli_query($conn, $cdquery);

		while ($cdrow = mysqli_fetch_array($cdresult)) {
			$cdTitle = $cdrow['nome'];
			echo " <option value = \"$cdTitle\" > $cdTitle </option>";
		}

		echo "
</select></td></tr>

<tr><td>Destination Time </td><td> <input type=\"time\" name=\"dt\" required></td></tr>

<tr><td>Distance </td><td> <input type=\"text\" name=\"ds\" required></td></tr>

<tr><td>No Of Intermediate SFT_Motrices</td><td><input type=\"text\" name=\"ns\" required></td></tr>

<tr><td>Day of Arrival </td><td> <input type=\"text\" name=\"dd\" required></td></tr>
</table>
<input type=\"submit\" type=\"button\" class=\"btn btn-success\" value=\"Enter Train Details\">

";
	}
	?>
        </section>
		</main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> prova itinere per Base di Dati</p>
    </footer>

    
    <!--<script src="/fi.licursi/scriptjs/script.js"></script>-->
    </body>
</html>