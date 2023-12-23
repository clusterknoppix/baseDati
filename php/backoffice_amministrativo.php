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
                <li><a href="/fi.licursi/php/intranet.php">intranet</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Backoffice Amministrativo</h2>
            <p></p>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> prova itinere per Base di Dati</p>
    </footer>

    
    <script src="script.js"></script>
</body>
</html>
