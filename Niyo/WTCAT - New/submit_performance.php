<?php
// Establish database connection
$servername = "localhost";
$username = "Niyo"; // Replace with your MySQL username
$password = "222016078"; // Replace with your MySQL password
$dbname = "organizing_music_festival"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $performanceID = $_POST['performanceID'];
    $festivalID = $_POST['festivalID'];
    $artistID = $_POST['artistID'];
    $performanceDate = $_POST['performanceDate'];
    $startTime = $_POST['startTime'];
    $duration = $_POST['duration'];

    // Prepare SQL statement
    $sql = "INSERT INTO performances (performanceID, festivalID, artistID, performanceDate, startTime, duration) VALUES ('$performanceID', '$festivalID', '$artistID', '$performanceDate', '$startTime', '$duration')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Performance submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
