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

// Check if performance ID is provided
if(isset($_POST['performance_id_delete']) && !empty($_POST['performance_id_delete'])) {
    // Prepare and bind parameters
    $stmt = $conn->prepare("DELETE FROM performances WHERE performanceID=?");
    $stmt->bind_param("i", $performance_id); // Corrected parameter name

    // Set performanceID parameter
    $performance_id = $_POST['performance_id_delete'];

    // Execute delete query
    $stmt->execute();

    // Check if any rows were affected
    if($stmt->affected_rows > 0) {
        echo "Record deleted successfully";
    } else {
        echo "No records deleted";
    }

    // Close statement
    $stmt->close();
} else {
    echo "Performance ID is required"; // Corrected error message
}

// Close connection
$conn->close();
?>
