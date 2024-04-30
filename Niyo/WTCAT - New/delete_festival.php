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

// Check if Festival ID is provided
if(isset($_POST['festival_id_delete']) && !empty($_POST['festival_id_delete'])) {
    // Set FestivalID parameter
    $festival_id = $_POST['festival_id_delete'];

    // Execute delete query
    $sql = "DELETE FROM festival WHERE FestivalID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $festival_id);
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
    echo "Festival ID is required";
}

// Close connection
$conn->close();
?>
