<!DOCTYPE html>
<html>
    <head>
		<meta charset="UTF-8">
        <meta name="viewport" content="widSTazioneSTazioneth=device-widSTazioneSTazioneth, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>SFT</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
        <link rel="stylesheet" href="/fi.licursi/css/style.css">
    </head>
    <body>
	<h1 align=center>Società Ferroviaria Turistica</h1>
	  
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="/fi.licursi/php/backoffice_esercizio2.php">Backoffice Esercizio</a></li>
            </ul>
        </nav>
    </header>

    <main>
	<!-- inizio test-->
        <section>
		 <h2 align=center><mark> Cancella stazione </h2>
		 <?php

				$servername = "mysql.57gimp.home";
                $username_db = "fi.licursi";
                $password_db = "kJ1L27dW";
                $dbname = "fi_licursi";

                $conn = new mysqli($servername, $username_db, $password_db, $dbname);

                if ($conn->connect_error) {
                    die("Connessione fallita: " . $conn->connect_error);
                }
		error_reporting(E_ERROR);
		 $sql = "DELETE from SFT_Stazione where idSTazione= ('" . $_GET["idSTazione"] . "')";
        echo $_GET["idSTazione"];

        if ($conn->query($sql) === TRUE) {
            echo " '" . $_POST["nome"] . "': Record deleted successfully";
        } else {
            echo "Error:" . $conn->error;
        } 
		$conn->close();
        ?>
        </section>
	<!-- fine test -->
		</main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> prova itinere per Base di Dati</p>
    </footer>

    
    <!--<script src="/fi.licursi/scriptjs/script.js"></script>-->
    </body>
</html>