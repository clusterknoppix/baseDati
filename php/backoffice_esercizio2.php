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
                <li><a href="/fi.licursi/php/logout.php">logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2 align=center><mark>BackOffice Esercizio</h2>
			 <section>
			<p> gestisci stazioni 
			<a href="/fi.licursi/php/gestisciStazioni.php"> Gestisci Stazioni</a>
			</p>
			</section>
			<section>
			<p> mostra treni 
			<a href="/fi.licursi/php/mostratreni.php"> mostra treni </a>
			</p>
			</section>
            <section>
			<p> composizione convoglio 
			<a href="/fi.licursi/php/composizioneConvogli.php"> Componi il Convoglio</a>
			</p>
			</section>
			<section>
			<p> verifica disponilità materiale rotabile <sub> "ricordati di mettere il link alla pagina"
			<a href="/fi.licursi/test/verificamaterialerotabile.php"> Verifica materiale </a>
			</p>
			</section>
<!--        
<?php
session_start();
echo session_id();
$username = $_POST["username"];
if (isset($_SESSION['username'])) {
    echo "Benvenuto, " . $_SESSION['username'];
} else {
    echo "Non sei autenticato.";
}
?>
 -->       
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> prova itinere per Base di Dati</p>
    </footer>

    
    <script src="script.js"></script>
</body>
</html>
