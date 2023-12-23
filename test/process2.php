<?php
// Connessione al database
//include('/fi.licursi/database.php'); 
// Verifica delle credenziali e accesso al database
                // Connessione al database
                $servername = "mysql.57gimp.home";
                $username_db = "fi.licursi";
                $password_db = "kJ1L27dW";
                $dbname = "fi_licursi";

                $conn = new mysqli($servername, $username_db, $password_db, $dbname);

                if ($conn->connect_error) {
                    die("Connessione fallita: " . $conn->connect_error);
                }
$query = "SELECT tipoCarrozza FROM fi_licursi.SFT_Carrozza";
$result = $conn->query($query);

if (!$result) {
    die("Errore nella query: " . $conn->error);
}

if (isset($_POST['submit'])) {
	$treno = $_POST['treno'];
	$sql = "SELECT idLocomotiva FROM fi_licursi.SFT_Motrice WHERE nome = '$treno'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$query = "insert into fi_licursi.SFT_composizioneTreno (idLocomotiva) values (idLocomotiva='$row[idLocomotiva]') ;";
	if (mysqli_query($conn, $query)) {
		$message = "composizione effettuta con successo";
	} else {
		$message = "transizione fallita";
	}
	echo "<script type='text/javascript'>alert('$message');</script>";
	//-------------------------------------------------------------------
	$carrozza = $_POST['carrozza'];
	$sql = "SELECT idCarrozza FROM fi_licursi.SFT_Carrozza WHERE tipoCarrozza = '$carrozza'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$query = "insert into fi_licursi.SFT_composizioneTreno (idCarrozza) values (idCarrozza='$row[idLocomotiva]') ;";
	if (mysqli_query($conn, $query)) {
		$message = "composizione effettuta con successo";
	} else {
		$message = "transizione fallita";
	}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<a href="/fi.licursi/test/composizioneConvogli.php">Torna alla pagina precedente</a>