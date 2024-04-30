<?php
// Include database connection
include 'db_connection.php';

// Check if database connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve ticket ID from the form
    $ticketID = isset($_POST["ticketID"]) ? $_POST["ticketID"] : null;

    // Check if ticket ID is provided
    if ($ticketID) {
        // Check if the Ticket table exists
        $tableName = "Tickets"; // Modify table name if necessary
        if ($conn->query("DESCRIBE $tableName")) {
            // Prepare the SQL statement to delete the ticket record
            $sql = "DELETE FROM $tableName WHERE TicketID = ?";

            // Prepare the SQL statement
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                // Bind the parameters
                $stmt->bind_param("i", $ticketID);

                // Execute the statement
                if ($stmt->execute()) {
                    echo "Ticket record deleted successfully";
                } else {
                    echo "Error deleting ticket record: " . $stmt->error;
                }

                // Close statement
                $stmt->close();
            } else {
                echo "Error preparing statement: " . $conn->error;
            }
        } else {
            echo "Table $tableName does not exist in the database";
        }
    } else {
        echo "TicketID is required.";
    }
}

// Close connection
$conn->close();
?>
