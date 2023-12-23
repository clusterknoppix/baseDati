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
	<header>
	<h1 align=center>Società Ferroviaria Turistica</h1>
	 <?php include('/fi.licursi/database.php');?> 
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="/fi.licursi/php/register.php">Registrati</a></li>
                <li><a href="/fi.licursi/php/login.php">Login</a></li>
				<li><a href="/fi.licursi/php/intranet.php">intranet</a></li>
				<li><a href="/fi.licursi/gallery.php">Galleria</a></li>
				<li><a href="/fi.licursi/PaySteam/login.php" target="_blank">PAY STEAM</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>documentazione per la verifica da parte del Dott. Luca Regoli e del Dott. Lorenzo Felli</h2>
            <p>
			link al sito web: https://webstudenti.unimarconi.it/fi.licursi/ <br>
			link a MyPhpAdmin: <a href="https://webstudenti.unimarconi.it/phpMyAdmin" target="_blank">phpMyAdmin fi.licursi</a> <br>
			username: fi.licursi <br>
			password:oscurata 
			<!-- password: kJ1L27dW -->
			</p>
        </section>
		<section>
            <h2>documento progettuale SFT </h2>
            <p>
			<a href="/fi.licursi/Docs/SFT_V06102023.pdf" target="_blank">Documento progettuale SFT</a>
			</p>
			<p>
			<a href="/fi.licursi/Docs/SFT-ER_V06102023.png" target="_blank">Schema ER SFT</a>
			</p>
			<p>
			<a href="/fi.licursi/Docs/PAY STEAM.pdf" target="_blank">Documento progettuale Pay Steam</a>
			</p>
			<p>
			<a href="/fi.licursi/Docs/PaySteam ER.png" target="_blank">Schema ER PaySteam</a>
			</p>
        </section>
		<section>
            <h2> Le nostre Stazioni </h2>
            <nav>
            <ul>
                <li>Torre Spavento km 0,000 stazione in comune con Trenitalia</li>
				<li>Prato Terra Km 2,700</li>
				<li>Rocca Pietrosa Km 7,580</li>
				<li>Villa Pietrosa Km 12,680</li>
				<li>Villa Santa maria Km 16,900</li>
				<li>Pietra Santa Maria Km 23,950</li>
				<li>Castro Marino Km 31,500</li>
				<li>Porto Spigola Km 39,500</li>
				<li>Porto San Felice Km 46,000</li>
				<li>Villa San Felice Km 54,680</li>			             
            </ul>
        </nav>
        </section>
		<section>
			
			</nav>
			<nav>
			<h3>Carrozze</h3>
			<p>la velocità massima prevista in linea è di 50 km/h.</p>
			<ul>
				<li>Carrozze serie 1928:B1,B2 e B3, da 36 posti a sedere.</li>
				<li>Carrozze serie 1930: C6,C9, da 48 posti a sedere. </li>
				<li>Carrozza serie 1952: C12 da 52 posti a sedere.</li>
				<li>Bagagliai serie 1910:CD1, CD2 con comparto passeggeri da 12 posti a sedere.</li>
				<li>Automotrici a nafta: AN 56.2 e AN 56.4 da 56 posti a sedere.</li>
			</ul>
			</nav>
			<nav>
			<h3>Motrici</h3>
			<ul>
				<li>SFT.3 "Cavour"</li>
				<li>SFT.4 "Vittorio Emanuele"</li>
				<li>SFT.6 "Garibaldi"</li>
			</ul>
			</nav>
		</section>
		
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> prova itinere per Base di Dati</p>
    </footer>

    
    <!--<script src="/fi.licursi/scriptjs/script.js"></script>-->
    </body>
</html>