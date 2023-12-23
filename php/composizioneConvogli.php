<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Convoglio e Orari</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
    <link rel="stylesheet" href="/fi.licursi/css/style.css">
    <link rel="icon" href="/fi.licursi/favicon.ico" type="image/x-icon">
</head>

<body>

    <header>
        <h1 align="center">Società Ferroviaria Turistica</h1>
        <nav>
            <ul>
                <li><a href="/fi.licursi/index.php">Home</a></li>
                <li><a href="/fi.licursi/php/backoffice_esercizio2.php"> Torna a BackOffice esercizio</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h1 align="center">Componi convoglio</h1>
        </section>
        <section>
            <?php
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            echo "componi convoglio";
            session_start();
			
            $servername = "mysql.57gimp.home";
            $username_db = "fi.licursi";
            $password_db = "kJ1L27dW";
            $dbname = "fi_licursi";

            $conn = new mysqli($servername, $username_db, $password_db, $dbname);

            if ($conn->connect_error) {
                die("Connessione fallita: " . $conn->connect_error);
            }
			$ns = 0;
			if (isset($_POST["ns"])) {
             
            } else if ($ns == 0) {
				$ns = isset($_POST["ns"]) ? $_POST["ns"] : 0;
                echo "
                <form action=\"popolaComposizionetreno.php\" method=\"post\">
                <table>
                <tr><td>Nome Treno </td><td> <select id=\"tname\" name=\"tname\" required>
                ";

                $cdquery = "select nome from SFT_Motrice";
                $cdresult = mysqli_query($conn, $cdquery);

                while ($cdrow = mysqli_fetch_array($cdresult)) {
                    $cdTitle = $cdrow['nome'];
                    echo " <option value = \"$cdTitle\" > $cdTitle </option>";
                }

                echo "
                </select></td></tr>

                <tr><td>Carrozza</td><td> <select id=\"nc\" name=\"nc\" required>
                ";

                $cdquery = "SELECT tipoCarrozza FROM SFT_Carrozza";
                $cdresult = mysqli_query($conn, $cdquery);

                while ($cdrow = mysqli_fetch_array($cdresult)) {
                    $cdTitle = $cdrow['tipoCarrozza'];
                    echo " <option value = \"$cdTitle\" > $cdTitle </option>";
                }

                echo "
                </select></td></tr>
                <tr><td>Posti disponibili </td>
				<td> 
				<input type=\"number\" name=\"maxposti\" value=\"$maxposti\" >
				</td></tr>
                <tr><td>Stazione partenza</td><td> <select id=\"sp\" name=\"sp\" required>
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

<tr><td>orario arrivo</td><td> <input type=\"time\" name=\"dt\" required></td></tr>

<tr><td>Distanza</td><td> <input type=\"text\" name=\"ds\" required></td></tr>

<tr><td>Numero stazioni intermedie </td><td><input type=\"text\" name=\"ns\" value=\"0\"required></td></tr>

<tr><td>giorno arrivo</td><td> <input type=\"text\" name=\"dd\" required></td></tr>
</table>
<input type=\"submit\" type=\"button\" class=\"btn btn-success\" value=\"immetti dettagli treno\">

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
