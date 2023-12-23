<!DOCTYPE html>
<html>
    <head>
		<meta charset="UTF-8">
        <meta name="viewport" content="widSTazioneth=device-widSTazioneth, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>SFT</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
        <link rel="stylesheet" href="/fi.licursi/css/style.css">
    </head>
    <body>
	<h1 align=center>Società Ferroviaria Turistica</h1>
	  
        <nav>
            <ul>
                <li><a href="/fi.licursi/index.php">Home</a></li>
                <li><a href="/fi.licursi/php/backoffice_esercizio2.php">Backoffice Esercizio</a></li>
            </ul>
        </nav>
    </header>

    <main>
	<!-- inizio test-->
        <section>
		 <h2 align=center><mark>Gestisci Stazioni</h2>
		 <?php

				$servername = "mysql.57gimp.home";
                $username_db = "fi.licursi";
                $password_db = "kJ1L27dW";
                $dbname = "fi_licursi";

                $conn = new mysqli($servername, $username_db, $password_db, $dbname);

                if ($conn->connect_error) {
                    die("Connessione fallita: " . $conn->connect_error);
                }

        $cdquery = "SELECT idSTazione,nome,distanza FROM SFT_Stazione";
        $cdresult = mysqli_query($conn, $cdquery);
        echo "
<table>
<thead><td>idSTazione</td>\t\t<td>Stazione</td>\t\t<td>Distanza</td><td></td><td></td></thead>
";

        while ($cdrow = mysqli_fetch_array($cdresult)) {
            $cdidSTazione = $cdrow['idSTazione'];
            $cdTitle = $cdrow['nome'];
			$cdDistanza = $cdrow['distanza'];
            echo "
<tr><td>$cdidSTazione</td>\t\t<td>$cdTitle</td>\t\t<td>$cdDistanza</td>\t\t<td>
<a href=\"/fi.licursi/php/modificastazione.php?idSTazione=" . $cdidSTazione . "\"><button>Edit</button></a></td>\t\t<td><a href=\"/fi.licursi/php/cancellastazioni.php?idSTazione=" . $cdidSTazione . "\"><button>Delete</button></a></td></tr>
";
        }
        echo "</table>";

        ?>

        <br>
        <span>
            <form action="/fi.licursi/php/gestisciStazioni.php" method="post">
                Aggiungi Stazione : <input type="text" name="nome" placeholder=" nuova stazione" required>
                <input type="submit" type="button" class="btn btn-success" value="Add">
                <!-- <input type="submit" value="Add"> -->
        </span>
        <?php
        
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