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
if(isset($_POST['festival_id_update']) && !empty($_POST['festival_id_update'])) {
    // Prepare and bind parameters
    $stmt = $conn->prepare("UPDATE festival SET Name=?, StartDate=?, OrganizerID=?, `Ticket Price`=? WHERE FestivalID=?");
    $stmt->bind_param("ssssi", $name, $start_date, $organizer_id, $ticket_price, $festival_id);

    // Set parameters
    $festival_id = $_POST['festival_id_update']; // Retrieve Festival ID from the hidden input field

    // Set other parameters only if they are provided in the form
    $name = isset($_POST['name_update']) ? $_POST['name_update'] : null;
    $start_date = isset($_POST['start_date_update']) ? $_POST['start_date_update'] : null;
    $organizer_id = isset($_POST['organizer_id_update']) ? $_POST['organizer_id_update'] : null;
    $ticket_price = isset($_POST['ticket_price_update']) ? $_POST['ticket_price_update'] : null;

    // Execute update query
    $stmt->execute();

    // Check if any rows were affected
    if($stmt->affected_rows > 0) {
        echo "Record updated successfully";
    } else {
        echo "No records updated";
    }

    // Close statement
    $stmt->close();
} else {
    echo "Festival ID is required";
}

// Close connection
$conn->close();
?>
