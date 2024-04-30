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

// Check if OrganizerID is provided
if(isset($_POST['organizer_id']) && !empty($_POST['organizer_id'])) {
    // Prepare and bind parameters
    $stmt = $conn->prepare("DELETE FROM organizer WHERE OrganizerID=?");
    $stmt->bind_param("i", $organizer_id);

    // Set parameter
    $organizer_id = $_POST['organizer_id'];

    // Execute delete query
    if($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    echo "Organizer ID is required";
}

// Close connection
$conn->close();
?>

