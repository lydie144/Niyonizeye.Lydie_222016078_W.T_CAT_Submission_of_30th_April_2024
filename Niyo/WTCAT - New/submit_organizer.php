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

// Check if form data is set and not empty
if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['title']) && isset($_POST['location'])) {
    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO organizer (Name, Phone, Email, Title, Location) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $phone, $email, $title, $location);

    // Set parameters
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $location = $_POST['location'];

    // Execute insert query
    if($stmt->execute()) {
        echo "New record Submitted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    echo "All fields are required";
}

// Close connection
$conn->close();
?>
