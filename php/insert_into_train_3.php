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
	error_reporting(E_ALL); ini_set('display_errors', 1);
	echo "nuovo dettaglio treno";
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
		$_SESSION["tname"] = "$tname";
		$sp = $_POST["sp"];
		$_SESSION["sp"] = "$sp";
		$st = $_POST["st"];
		$_SESSION["st"] = "$st";
		$dp = $_POST["dp"];
		$_SESSION["dp"] = "$dp";
		$dt = $_POST["dt"];
		$_SESSION["dt"] = "$dt";
		$ns = $_POST["ns"];
		$_SESSION["ns"] = "$ns";
		$ds = $_POST["ds"];
		$_SESSION["ds"] = "$ds";

		echo "<table><thead><td>Train_name</td><td>Starting_point</td><td>Starting_time</td><td>Destination_point</td><td>Destination_time</td><td>Day_of_arrival</td></thead>";
		echo "<tr><td>" . $tname . "</td><td>" . $sp . "</td><td>" . $st . "</td><td>" . $dp . "</td><td>" . $dt . "</td><td>" . $ns . "</td><td>" . $ds . "</td></tr></table>";

		echo " <table><thead><td>Station</td><td>Arrival_Time</td><td>Departure_Time</td></thead>";
		echo " <tr><td>" . $sp . "</td><td>" . $st . "</td><td>" . $st . "</td><td>0</td></tr>";

		echo "<form action=\"insert_into_train_4.php\" method=\"post\">";
		$temp = 1;
		while ($temp <= $ns) {
			echo " <tr><td><select id=\"stn" . $temp . "\" name=\"stn" . $temp . "\"required> ";

			$cdquery = "SELECT nome FROM SFT_Stazione";
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
<form action=\"insert_into_train_3.php\" method=\"post\">
<table>
<tr><td>nome Treno</td><td> <select id=\"tname\" name=\"tname\" required>
";

		$cdquery = "SELECT nome FROM SFT_Motrice";
		$cdresult = mysqli_query($conn, $cdquery);

		while ($cdrow = mysqli_fetch_array($cdresult)) {
			$cdTitle = $cdrow['nome'];
			echo " <option value = \"$cdTitle\" > $cdTitle </option>";
		}

		echo "
</select></td></tr>
<tr><td>Stazione di partenza</td><td> <select id=\"sp\" name=\"sp\" required>
";

		$cdquery = "SELECT nome FROM SFT_Stazione";
		$cdresult = mysqli_query($conn, $cdquery);

		while ($cdrow = mysqli_fetch_array($cdresult)) {
			$cdTitle = $cdrow['nome'];
			echo " <option value = \"$cdTitle\" > $cdTitle </option>";
		}

		echo "

</select></td></tr>

<tr><td>orario partenza</td><td> <input type=\"time\" name=\"st\" required></td></tr>

<tr><td>stazione arrivo</td><td> <select id=\"dp\" name=\"dp\" required>

";

		$cdquery = "SELECT nome FROM SFT_Stazione";
		$cdresult = mysqli_query($conn, $cdquery);

		while ($cdrow = mysqli_fetch_array($cdresult)) {
			$cdTitle = $cdrow['nome'];
			echo " <option value = \"$cdTitle\" > $cdTitle </option>";
		}

		echo "
</select></td></tr>

<tr><td>orario di arrivo</td><td> <input type=\"time\" name=\"dt\" required></td></tr>
<tr><td>giorno di arrivo</td><td> <input type=\"text\" name=\"dd\" required></td></tr>
</table>
<input type=\"submit\" type=\"button\" class=\"btn btn-success\" value=\"nuovo dettaglio treno\">

";
	}

	

	?>
        </section>
		</main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> prova itinere per Base di Dati</p>
    </footer>
    </body>
</html>