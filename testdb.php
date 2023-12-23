<?php
$servername = "mysql.57gimp.home";
$username = "fi.licursi";
$password = "kJ1L27dW";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>