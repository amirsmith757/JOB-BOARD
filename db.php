<?php
// Connect to MariaDB
$servername = "localhost";
$username = "asmith404";
$password = "U6adxN4fT1cMjCSy";
$dbname = "asmith404";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>