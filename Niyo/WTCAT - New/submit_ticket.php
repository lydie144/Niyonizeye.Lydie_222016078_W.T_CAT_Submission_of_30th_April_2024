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
if(isset($_POST['ticketID']) && isset($_POST['attendeeID']) && isset($_POST['festivalID']) && isset($_POST['purchaseDate'])  && isset($_POST['price']) && isset($_POST['location'])) {
    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO tickets (ticketID, attendeeID, festivalID, purchaseDate, price, Location) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $ticketID, $attendeeID, $festivalID, $purchaseDate, $price, $location);

    // Set parameters
    $name = $_POST['ticketID'];
    $phone = $_POST['attendeeID'];
    $email = $_POST['festivalID'];
    $title = $_POST['purchaseDate'];
    $title = $_POST['price'];
    $location = $_POST['location'];

    // Execute insert query
    if($stmt->execute()) {
        echo "New record submitted successfully";
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
