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

        echo "
<table>
<thead><td>Treno numero | </td><td>Stazione partenza | </td><td>Stazione arrivo | </td></thead>
<tr><td>" . $_GET["idTreno"] . "</td><td>" . $_GET["sp"] . "</td><td>" . $_GET["dp"] . "</td></tr>
</table>
";

        echo "
<table>
<thead><td>Train_Class</td><td>Seats_Left</td><td>Fare_Per_Seat</td></thead>
";

        $cdquery = "SELECT SFT_classseats.class,SFT_classseats.seatsleft,SFT_classseats.fare FROM SFT_classseats WHERE SFT_classseats.idTreno='" . $_GET["idTreno"] . "' AND SFT_classseats.sp='" . $_GET["sp"] . "' AND SFT_classseats.dp='" . $_GET["dp"] . "'";
        $cdresult = mysqli_query($conn, $cdquery);

        while ($cdrow = mysqli_fetch_array($cdresult)) {
            echo "
<tr><td>" . $cdrow[0] . "</td><td>" . $cdrow[1] . "</td><td>" . $cdrow[2] . "</td></tr>
";
        }
        echo "</table>";

        echo " <br><a href=\"schedule.php?idTreno=" . $_GET['idTreno'] . "\">Go Back to Schedule!!!</a><br> ";
        echo " <br><a href=\"show_trains.php\">Go Back to Train Menu!!!</a><br> ";
        echo " <br><a href=\"admin_login.php\">Go Back to Admin Menu!!!</a> ";
        ?>
        </section>
		</main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> prova itinere per Base di Dati</p>
    </footer>

    
    <!--<script src="/fi.licursi/scriptjs/script.js"></script>-->
    </body>
</html>