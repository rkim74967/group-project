<?php
$servername = "Localhost";
$username = "root";
$password = "compSci11+";

// Create connection
$conn = new mysqli($servername, $username, $password,'nj_cities');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT id, name, latitude, longitude from location';
$getTable = $conn->query($sql);

?>

