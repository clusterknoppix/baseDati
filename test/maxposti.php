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
	<title> TEST TEST TEST </title>

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
				//imposto le variabili in uso nella pagina corrente
				$ns = isset($_POST["ns"]) ? $_POST["ns"] : 0;
				$_SESSION["tname"] = isset($_POST["tname"]) ? $_POST["tname"] : '';
				$_SESSION["maxposti"] = isset($_POST["maxposti"]) ? $_POST["maxposti"] : '';
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

  <tr>
    <td>Posti disponibili</td>
    <td>
        <?php
        // Establish database connection
        $conn = mysqli_connect("mysql.57gimp.home", "username", "password", "database");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Define SQL query
        $query = "SELECT SUM(capacita) AS maxposti FROM 
                    (SELECT capacita FROM SFT_Carrozza WHERE tipoCarrozza = ?) AS t1,  
                    (SELECT capacita FROM SFT_Motrice WHERE tipoLocomotiva = ?) AS t2";

        // Prepare statement 
        $stmt = mysqli_prepare($conn, $query);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ss", $_SESSION['nc'], $_SESSION['tname']);

        // Execute statement
        mysqli_stmt_execute($stmt);

        // Get result 
        $result = mysqli_stmt_get_result($stmt);

        // Fetch row
        $row = mysqli_fetch_assoc($result);

        // Get max seats
        $maxposti = $row['maxposti'];

        // Output max seats
        echo "<input type='number' name='maxposti' value='$maxposti' readonly>";
        ?>
    </td>
</tr>

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
