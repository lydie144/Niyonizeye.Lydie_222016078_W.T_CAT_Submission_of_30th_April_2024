<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include 'db_connection.php';

    // Retrieve form data
    $attendeeID = isset($_POST["attendeeID"]) ? $_POST["attendeeID"] : null;

    // Check if the attendee ID is provided
    if ($attendeeID !== null) {
        // Prepare SQL statement to delete attendee record
        $sql = "DELETE FROM attendees WHERE AttendeeID = ?";

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind the parameters
            $stmt->bind_param("i", $attendeeID);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Attendee record deleted successfully";
            } else {
                echo "Error deleting attendee record: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "AttendeeID is required.";
    }

    // Close connection
    $conn->close();
}
?>
