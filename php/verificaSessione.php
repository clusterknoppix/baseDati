<?php
session_start();
$username = $_POST["username"]; 
if (isset($_SESSION['username'])) {
    echo "Benvenuto, " . $_SESSION['username'];
} else {
    echo "Non sei autenticato.";
}
?>
