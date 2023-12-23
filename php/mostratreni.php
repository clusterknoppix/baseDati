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
    <h1 align="center">Società Ferroviaria Turistica</h1>
    <nav>
        <ul>
            <li><a href="/fi.licursi/index.php">Home</a></li>
            <li><a href="/fi.licursi/php/backoffice_esercizio2.php">Backoffice Esercizio</a></li>
        </ul>
    </nav>

    <main>
        <!-- inizio test -->
        <section>
            <h2 align="center"><mark>Mostra Treni</mark></h2>
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

            $cdquery = "SELECT * FROM SFT_composizioneTreno";
            $cdresult = mysqli_query($conn, $cdquery);

            echo "<table>";
            echo "<thead><tr><td>|idTreno|</td><td>|nome Treno|</td><td>|Stazione Partenza|</td><td>|ora di arrivo|</td><td>|stazione destinazione|</td><td>|ora partenza|</td><td>|giorno|</td><td>|Distanza|</td><td></td></tr></thead>";

            while ($cdrow = mysqli_fetch_array($cdresult)) {
                echo "<tr><td>" . $cdrow['idTreno'] . "</td><td>" . $cdrow['tname'] . "</td><td>" . $cdrow['sp'] . "</td><td>" . $cdrow['st'] . "</td><td>" . $cdrow['dp'] . "</td><td>" . $cdrow['dt'] . "</td><td>" . $cdrow['dd'] . "</td><td>" . $cdrow['distance'] . "</td><td><a href=\"schedule.php?idTreno=" . $cdrow['idTreno'] . "\"><button>Schedule</button></a></td></tr>";
            }

            echo "</table>";

            echo '<br><a href="insert_into_train_3.php" style="text-decoration: none; display: inline-block; padding: 15px 32px; text-align: center; text-decoration: none; color: #ffffff; background-color: rgb(2, 1, 58); border-radius: 50px; outline: whitesmoke;">Aggiungi treno</a><br>';
            ?>
        </section>
        <!-- fine test -->
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> prova itinere per Base di Dati</p>
    </footer>
</body>
</html>