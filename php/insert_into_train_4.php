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
	<h1 align=center>Società Ferroviaria Turistica</h1>
	 <?php include('/fi.licursi/database.php');?> 
        <nav>
            <ul>
               <li><a href="/fi.licursi/index.php">Home</a></li>
                <li><a href="/fi.licursi/php/backoffice_esercizio2.php">Backoffice Esercizio</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
		
	 <?php
        session_start();


				$servername = "mysql.57gimp.home";
                $username_db = "fi.licursi";
                $password_db = "kJ1L27dW";
                $dbname = "fi_licursi";

                $conn = new mysqli($servername, $username_db, $password_db, $dbname);

                if ($conn->connect_error) {
                    die("Connessione fallita: " . $conn->connect_error);
                }

        $sql = "INSERT INTO SFT_composizioneTreno (tname,sp,st,dp,dt,dd,distance) VALUES ('" . $_SESSION["tname"] . "','" . $_SESSION["sp"] . "','" . $_SESSION["st"] . "','" . $_SESSION["dp"] . "','" . $_SESSION["dt"] . "','" . $_SESSION["dd"] . "','" . $_SESSION["ds"] . "')";

        if ($conn->query($sql) === TRUE) {
            echo "New Train record created successfully<br><br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $cdquery = "SELECT idTreno FROM SFT_composizioneTreno where tname='" . $_SESSION["tname"] . "' AND sp='" . $_SESSION["sp"] . "' AND dp='" . $_SESSION["dp"] . "'";
        $cdresult = mysqli_query($conn, $cdquery);
        $cdrow = mysqli_fetch_array($cdresult);
        $idTreno = $cdrow['idTreno'];

        $sql = "INSERT INTO SFT_schedule (idTreno,sname,arrival_time,departure_time,distance) VALUES ('" . $idTreno . "','" . $_SESSION["sp"] . "','" . $_SESSION["st"] . "','" . $_SESSION["st"] . "','0')";
        $flag = ($conn->query($sql));
        $temp = 1;
        while ($temp <= $_SESSION["ns"]) {
            $sql = "INSERT INTO SFT_schedule (idTreno,sname,arrival_time,departure_time,distance) VALUES ('" . $idTreno . "','" . $_POST["stn" . $temp] . "','" . $_POST["st" . $temp] . "','" . $_POST["dt" . $temp] . "','" . $_POST["ds" . $temp] . "')";
            $flag = ($conn->query($sql));
            $temp += 1;
        }
        $sql = "INSERT INTO SFT_schedule (idTreno,sname,arrival_time,departure_time,distance) VALUES ('" . $idTreno . "','" . $_SESSION["dp"] . "','" . $_SESSION["dt"] . "','" . $_SESSION["dt"] . "','" . $_SESSION["ds"] . "')";
        $flag = ($conn->query($sql));

        if ($flag === TRUE) {
            echo "New schedule added successfully<br><br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        echo "<br> <a href=\"admin_login.php\" style=\"text-decoration: none; 
        display: inline-block;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        color: #ffffff;
        background-color: rgb(0, 102, 0);
        border-radius: 50px;
        outline: whitesmoke;
        
        \">Go Back to Admin Menu!!!</a> ";

        ?>
        </section>
		</main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> prova itinere per Base di Dati</p>
    </footer>

    
    <!--<script src="/fi.licursi/scriptjs/script.js"></script>-->
    </body>
</html>