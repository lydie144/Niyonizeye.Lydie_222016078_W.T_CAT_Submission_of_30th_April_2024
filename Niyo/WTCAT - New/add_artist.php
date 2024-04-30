<?php
// Database connection parameters
$servername = "localhost";
$username = "Niyo";
$password = "222016078";
$dbname = "organizing_music_festival";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $stageName = $_POST["stageName"];
    $genre = $_POST["genre"];
    $platform = $_POST["platform"];
    $email = $_POST["email"];

    // SQL query to insert record into artist table
    $sql = "INSERT INTO artist (stageName, Genre, platform, Email) VALUES ('$stageName', '$genre', '$platform', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
