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
<body>
<?php include('/fi.licursi/database.php');?> 
    <header>
        <h1 align=center>Società Ferroviaria Turistica</h1>
        <nav>
            <ul>
                <li><a href="/fi.licursi/index.php">Home</a></li>
                <li><a href="/fi.licursi/php/register.php">Registrati</a></li>
                <li><a href="/fi.licursi/php/login.php">Login</a></li>
				<li><a href="/fi.licursi/php/intranet.php">intranet</a></li>
            </ul>
        </nav>
    </header>

     <main>
	 <section>
	<p> utente test già registrato io@io.com R.123456 </p>
</section>
        <section>
            <div id="content">
                <p>
                    <?php
					session_start();
                    // script per verificare e gestire l'accesso utente
                    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
                        $errors = array(); // Inizializza un array di errori.

                        // Verifica se è stata inserita un'email
                        if (empty($_POST['email'])) {
                            $errors[] = 'Inserisci il tuo indirizzo email.';
                        } else {
                            $e = trim($_POST['email']);
                        }

                        // Verifica se è stata inserita una password
                        if (empty($_POST['password'])) {
                            $errors[] = 'Inserisci la tua password.';
                        } else {
                            $p = trim($_POST['password']);
                        }

                        // Se non ci sono errori, verifica le credenziali nel database
                        if (empty($errors)) {
                            // Connessione al database
                            $servername = "mysql.57gimp.home";
                            $username_db = "fi.licursi";
                            $password_db = "kJ1L27dW";
                            $dbname = "fi_licursi";

                            $conn = new mysqli($servername, $username_db, $password_db, $dbname);

                            if ($conn->connect_error) {
                                die("Connessione fallita: " . $conn->connect_error);
                            }

                            // Query per verificare le credenziali
                            $q = "SELECT * FROM fi_licursi.SFT_utenteRegistrato WHERE email='$e' AND password=SHA1('$p')";
                            $result = mysqli_query($conn, $q);

                            if (mysqli_num_rows($result) == 1) {
                                // Accesso riuscito
								$_SESSION['session_id'] = session_id();
								$_SESSION['session_user'] = $username;
                                $messaggio = "Accesso riuscito!";
                               // Reindirizzamento a una specifica pagina dopo 2 secondi
    header("refresh:2;url=dashboard.php"); // Cambia "dashboard.php" con la tua pagina desiderata
    exit();
                            } else {
                                // Credenziali non valide
                                $errors[] = 'Credenziali non valide.';
                            }

                            mysqli_close($conn);
                        } else {
                            // Visualizza gli errori
                            echo '<h2>Error!</h2>
                                  <p class="error">The following error(s) occurred:<br>';
                            foreach ($errors as $msg) {
                                echo " - $msg<br>\n";
                            }
                            echo '</p><h3>Please try again.</h3><p><br></p>';
                        }
                    }
                    ?>
                </p>

                <!-- Form di accesso -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <p><label class="label" for="email">Email Address:</label>
                        <input id="email" type="text" name="email" size="30" maxlength="60"
                               value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>"></p>
                    <p><label class="label" for="password">Password:</label>
                        <input id="password" type="password" name="password" size="12" maxlength="12"></p>
                    <p><input id="submit" type="submit" name="submit" value="Login"></p>
                </form>
            </div>
        </section>
    </main>


    <footer>
        <p>&copy; <?php echo date("Y"); ?> prova itinere per Base di Dati</p>
    </footer>

    
    <script src="script.js"></script>
</body>
</html>
