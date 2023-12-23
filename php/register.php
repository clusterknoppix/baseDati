<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SFT</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
    <link rel="stylesheet" href="/fi.licursi/css/style.css">
</head>
<body>
    <h1 align="center">Registrazione utente</h1>
    
    <nav>
        <ul>
            <li><a href="/fi.licursi/index.php">Home</a></li>
        </ul>
    </nav>

    <main>
        <section>
            <div id="content">
                <p>
                    <?php
				
                    // script per aggiungere utenti registrati alla tabella SFT_utenteRegistrato.
                    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
                        $errors = array(); // Initialize an error array.
                        // Was the first name entered?
                        if (empty($_POST['nome'])) {
                            $errors[] = 'Non hai scritto il tuo nome.';
                        } else {
                            $fn = trim($_POST['nome']);
                        }
                        // Was the last name entered?
                        if (empty($_POST['cognome'])) {
                            $errors[] = 'Non hai scritto il cognome.';
                        } else {
                            $ln = trim($_POST['cognome']);
                        }
                        // Was an email address entered?
                        if (empty($_POST['email'])) {
                            $errors[] = 'Non hai scritto la tua email.';
                        } else {
                            $e = trim($_POST['email']);
                        }
                        // Did the two passwords match?
                        if (!empty($_POST['password'])) {
                            if ($_POST['password'] != $_POST['password2']) {
                                $errors[] = 'Le password non coincidono.';
                            } else {
                                $p = trim($_POST['password']);
                            }
                        } else {
                            $errors[] = 'Non hai scritto la password.';
                        }
                        // Start of the SUCCESSFUL SECTION, i.e., all the fields were filled out.
                        if (empty($errors)) { // If no problems encountered, register the user in the database
                            //require('/fi.licursi/database.php'); // Connect to the database.
                            // Verifica delle credenziali e accesso al database
                // Connessione al database
                $servername = "mysql.57gimp.home";
                $username_db = "fi.licursi";
                $password_db = "kJ1L27dW";
                $dbname = "fi_licursi";

                $conn = new mysqli($servername, $username_db, $password_db, $dbname);

                if ($conn->connect_error) {
                    die("Connessione fallita: " . $conn->connect_error);
                }
							// Make the query
                            $q = "INSERT INTO fi_licursi.SFT_utenteRegistrato (nome, cognome, email, password, registration_date)
                                  VALUES ('$fn', '$ln', '$e', SHA1('$p'), NOW() )";
                            $result = mysqli_query($conn, $q); // Run the query.
                            if ($result) { // If it ran OK.
                                //header("location: register-thanks.php");
                                $messaggio="la registrazione è andata a buon fine";
								echo $messaggio;
								exit();
                            } else { // If the form handler or database table contained errors
                                // Display any error message
                                echo '<h2>System Error</h2>
                                      <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
                                // Debug the message:
                                echo '<p>' . mysqli_error($conn) . '<br><br>Query: ' . $q . '</p>';
                            } // End of if clause ($result)
                            mysqli_close($conn); // Close the database connection.
                            // Include the footer and quit the script:
                            // include('footer.php');
                            exit();
                        } else { // Display the errors
                            echo '<h2>Error!</h2>
                                  <p class="error">The following error(s) occurred:<br>';
                            foreach ($errors as $msg) { // Print each error.
                                echo " - $msg<br>\n";
                            }
                            echo '</p><h3>Please try again.</h3><p><br></p>';
                        } // End of if (empty($errors)) IF.
                    } // End of the main Submit conditional.
                    ?>
                </p>

                <!-- Display the form on the screen -->
                <!-- Importante modificare il puntamento al file PHP in produzione -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <p><label class="label" for="nome">First Name:</label>
                        <input id="nome" type="text" name="nome" size="30" maxlength="30"
                               value="<?php if (isset($_POST['nome'])) echo htmlspecialchars($_POST['nome']); ?>"></p>
                    <p><label class="label" for="cognome">Last Name:</label>
                        <input id="cognome" type="text" name="cognome" size="30" maxlength="40"
                               value="<?php if (isset($_POST['cognome'])) echo htmlspecialchars($_POST['cognome']); ?>"></p>
                    <p><label class="label" for="email">Email Address:</label>
                        <input id="email" type="text" name="email" size="30" maxlength="60"
                               value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>"></p>
                    <p><label class="label" for="password">Password:</label>
                        <input id="password" type="password" name="password" size="12" maxlength="12"
                               value="<?php if (isset($_POST['password'])) echo htmlspecialchars($_POST['password']); ?>">&nbsp;
                        Between 8 and 12 characters.</p>
                    <p><label class="label" for="password2">Confirm Password:</label>
                        <input id="password2" type="password" name="password2" size="12" maxlength="12"
                               value="<?php if (isset($_POST['password2'])) echo htmlspecialchars($_POST['password2']); ?>"></p>
                    <p><input id="submit" type="submit" name="submit" value="Register"></p>
                </form>
                <!-- End of the page content. -->
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> prova itinere per Base di Dati</p>
    </footer>
    <!-- <script src="/fi.licursi/scriptjs/script.js"></script> -->
</body>
</html>
