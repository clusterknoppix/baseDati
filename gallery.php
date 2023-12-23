<!DOCTYPE html>
<html>
    <head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>SFT</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
        <link rel="stylesheet" href="/fi.licursi/css/style.css">
		<style>
        #gallery {
            max-width: 600px;
            margin: auto;
            overflow: hidden;
        }

        .image {
            display: none;
			 max-width: 100%; /* Assicura che le immagini non superino la larghezza del contenitore */
            height: auto;    /* Impedisce la distorsione delle immagini */
        }
    </style>
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
            </ul>
        </nav>
    </header>

    <main>
        
		<section>
    <div id="gallery">
        <?php
            // Percorso della cartella delle immagini
            $imageFolder = "immagini/";

            // Leggi tutte le immagini dalla cartella
            $images = glob($imageFolder . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

            // Mostra le immagini nella galleria
            foreach ($images as $image) {
                echo '<img class="image" src="' . $image . '" alt="Gallery Image">';
            }
        ?>
    </div>
    <script>
        var currentIndex = 0;
        var images = document.querySelectorAll('.image');

        function showImage(index) {
            images.forEach(function(image) {
                image.style.display = 'none';
            });

            images[index].style.display = 'block';
        }

        function rotateGallery() {
            currentIndex = (currentIndex + 1) % images.length;
            showImage(currentIndex);
        }

        // Mostra la prima immagine all'avvio e avvia la rotazione
        showImage(currentIndex);
        setInterval(rotateGallery, 10000); // Cambia immagine ogni 3 secondi (3000 millisecondi)
    </script>

		</section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> prova itinere per Base di Dati</p>
    </footer>

    
    <!--<script src="/fi.licursi/scriptjs/script.js"></script>-->
    </body>
</html>