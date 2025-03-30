<?php
$servername = "localhost"; // Change this if your database is on a different server
$username = "root"; // Default username in XAMPP
$password = ""; // Default password in XAMPP is empty
$database = "pokestellar";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>




