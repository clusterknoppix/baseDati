
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Accesso</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Nome Utente: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>

<?php
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

    if ($result->num_rows == 1) {
        // Autenticazione riuscita, puoi reindirizzare l'utente ad una pagina successiva
        echo "Accesso riuscito!";
    } else {
        // Autenticazione fallita
        echo "Credenziali non valide.";
    }

    $conn->close();
}
?>

</body>
</html>
