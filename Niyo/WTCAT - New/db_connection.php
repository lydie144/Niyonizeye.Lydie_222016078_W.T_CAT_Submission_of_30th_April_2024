<?php
// Database configuration
$servername = "localhost"; // Change this to your database server hostname
$username = "Niyo"; // Change this to your database username
$password = "222016078"; // Change this to your database password
$dbname = "organizing_music_festival"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
