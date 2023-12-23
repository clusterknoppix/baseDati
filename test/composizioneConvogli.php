<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>convoglio e orari</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
    <link rel="stylesheet" href="/fi.licursi/css/style.css">
    <link rel="icon" href="/fi.licursi/favicon.ico" type="image/x-icon">
    <!-- script js  -->
    <script type="text/javascript">
        function validate() {
            vartreno = document.getElementById("treno");
            if (treno.selectedIndex == 0) {
                alert("manca una scelta!");
               treno.focus();
                return false;
            }
        }
    </script>
    <!-- fine script js -->
</head>

<body>

    <header>
        <h1 align=center>Società Ferroviaria Turistica</h1>
        <nav>
            <ul>
                <li><a href="/fi.licursi/index.php">Home</a></li>
                <li><a href="/fi.licursi/php/backoffice_esercizio2.php"> Torna a BackOffice esercizio</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h1 align=center> Componi treno </h1>
            
        <form method="post" name="sceltamotrice" action="/fi.licursi/test/process2.php">
				<label for="treno">selezione motrice:</label>
			<select id="treno" name="treno" required>
                <option value="AN 56.2">AN 56.2</option>
                <option value="AN 56.4">AN 56.4</option>
                <option value="SFT.3 Cavour">SFT.3 Cavour</option>
                <option value="SFT.4 Vittorio Emanuele">SFT.4 Vittorio Emanuele</option>
                <option value="SFT.6 Garibaldi">SFT.6 Garibaldi</option>
            </select>
            <br /><br />
                <label for="carrozza">selezione carrozza:</label>
                <select name="carrozza" id="carrozza">
                    <option value="Carrozze serie 1928 B1">Carrozze serie 1928 B1</option>
						<option value="Carrozze serie 1928 B2">Carrozze serie 1928 B2</option>
						<option value="Carrozze serie 1928 B3">Carrozze serie 1928 B3</option>
						<option value="Carrozze serie 1930 C6">Carrozze serie 1930 C6</option>
						<option value="Carrozze serie 1930 C9">Carrozze serie 1930 C9</option>
						<option value="Carrozza serie 1952 C12">Carrozza serie 1952 C12</option>
                </select><br><br>
                <label for="quantita">Quantità:</label>
                <input type="number" name="quantita" id="quantita" required><br><br>
                <label for="tratta">Tratta:</label>
                <option value="locomotiva">stazione partenza</option>
                <option value="automotrice">stazione di arrivo</option>
                <label for="orario_partenza">Orario di Partenza:</label>
                <input type="text" name="orario_partenza" id="orario_partenza" required><br><br>
                <label for="orario_arrivo">Orario di Arrivo:</label>
                <input type="text" name="orario_arrivo" id="orario_arrivo" required><br><br>
                <input type="submit" name="submit" id="submit" class="button" />
        </form>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> prova itinere per Base di Dati</p>
    </footer>
</body>

</html>