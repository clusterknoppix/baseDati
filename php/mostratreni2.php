       <section>
		 <h2 align=center><mark> Mostra Treni </h2>
		 <?php
				error_reporting(E_ALL); ini_set('display_errors', 1);
				$servername = "mysql.57gimp.home";
                $username_db = "fi.licursi";
                $password_db = "kJ1L27dW";
                $dbname = "fi_licursi";

                $conn = new mysqli($servername, $username_db, $password_db, $dbname);

                if ($conn->connect_error) {
                    die("Connessione fallita: " . $conn->connect_error);
                }
				$cdquery = "SELECT * FROM SFT_composizioneTreno";
				$cdresult = mysqli_query($conn, $cdquery);
        echo "
		<table>
<thead><td> |idTreno| </td><td> |nome Treno| </td><td> |Stazione Partenza| </td><td> |ora di arrivo| </td><td> |stazione destinazione| </td><td> |ora partenza| </td><td> |giorno| </td><td> |Distanza| </td><td></td></thead>
";

        while ($cdrow = mysqli_fetch_array($cdresult)) {
            echo "
<tr><td>" . $cdrow['trainno'] . "</td><td>" . $cdrow['tname'] . "</td><td>" . $cdrow['sp'] . "</td><td>" . $cdrow['st'] . "</td><td>" . $cdrow['dp'] . "</td><td>" . $cdrow['dt'] . "</td><td>" . $cdrow['dd'] . "</td><td>" . $cdrow['distance'] . "</td><td><a href=\"schedule.php?trainno=" . $cdrow['trainno'] . "\"><button>Schedule</button></a></td></tr>
";
        }
        echo "</table>";

        echo " <br><a href=\"insert_into_train_3.php\" style=\"text-decoration: none; 
    display: inline-block;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    color: #ffffff;
    background-color: rgb(2, 1, 58);
    border-radius: 50px;
    outline: whitesmoke;
    
    \"> aggiungi treno </a><br> ";
      ?>
		
		
        </section>