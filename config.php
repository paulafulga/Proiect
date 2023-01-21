<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "proiect";

// creaza conexiune la baza de date
$conn = new mysqli($servername, $username, $password, $db);

// verifica conexiunea
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>