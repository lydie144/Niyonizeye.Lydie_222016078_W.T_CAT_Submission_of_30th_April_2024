<?php
// Include database connection
include 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $organizerID = $_POST["organizer_id_update"];
    $name = $_POST["name_update"];
    $title = $_POST["title_update"];
    $location = $_POST["location_update"];

    // Update the organizer record
    $sql = "UPDATE Organizer SET Name='$name', Title='$title', Location='$location' WHERE OrganizerID=$organizerID";

    if ($conn->query($sql) === TRUE) {
        echo "Organizer record updated successfully";
    } else {
        echo "Error updating organizer record: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
