<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template SFT da Cambiare ad ogni pagina</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
    <link rel="stylesheet" href="/fi.licursi/css/style.css">
    <link rel="icon" href="/fi.licursi/favicon.ico" type="image/x-icon">
</head>
<?php session_start();
?>
<body>
    <header>
        <h1 align=center>Società Ferroviaria Turistica</h1>
        <nav>
            <ul>
                <li><a href="/fi.licursi/index.php">Home</a></li>

            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2 align=center>accesso alla intranet riservata al personale SFT interno, Esercizio e Amministrativo </h2>
            <p>
                accesso come<b> Backoffice Esercizio (gestione orari e composizione treni)</b><br>
                user:gbramieri <br>
                password:pwdbramieri<br>
                accesso come <b> Backoffice Amministrativo (calcola redditività treni)</b><br>
                user:acimarosa <br>
                password:pwdcimarosa <br>
            </p>
        </section>
        <section> <!-- form e accesso al db -->
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                Nome Utente: <input type="text" name="username"><br>
                Password: <input type="password" name="password"><br>
                <input type="submit" value="Login">
            </form>

            <?php
			error_reporting(E_ALL); ini_set('display_errors', 1);
            // Verifica delle credenziali e accesso al database
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Connessione al database
                $servername = "mysql.57gimp.home";
                $username_db = "fi.licursi";
                $password_db = "kJ1L27dW";
                $dbname = "fi_licursi";

                $conn = new mysqli($servername, $username_db, $password_db, $dbname);

                if ($conn->connect_error) {
                    die("Connessione fallita: " . $conn->connect_error);
                }

                // Dati inseriti nel modulo
                $username = $_POST["username"];
                $password = $_POST["password"];

                // Query per verificare le credenziali
                $sql = "SELECT * FROM SFT_utentiBackOffice WHERE username = '$username' AND password = '$password'";
                $result = $conn->query($sql);
                //reindirizza la pagina in base al profilo trovato
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $profile = $row['profile'];

                    // Verifica il tipo di profilo e reindirizza di conseguenza
                    if ($profile == "backoffice_amministrativo") {
                        header("Location: /fi.licursi/php/backoffice_amministrativo.php");
                    } elseif ($profile == "backoffice_esercizio") {
                        header("Location: /fi.licursi/php/backoffice_esercizio2.php");
                    } else {
                        echo "Profilo non valido";
                    }
                } else {
                    echo "Credenziali non valide";
                }

                /*  if ($result->num_rows == 1) {
        // Autenticazione riuscita, puoi reindirizzare l'utente ad una pagina successiva
        echo "Accesso riuscito!";
    } else {
        // Autenticazione fallita
        echo "Credenziali non valide.";
    } */

                $conn->close();
            }
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> prova itinere per Base di Dati</p>
    </footer>


    <!-- <script src="script.js"></script> -->
</body>

</html>