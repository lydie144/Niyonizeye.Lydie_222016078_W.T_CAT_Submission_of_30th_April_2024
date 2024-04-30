<?php
// Include database connection
include 'db_connection.php';

// Check if database connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize inputs
    $ticketID = isset($_POST["ticketID"]) ? $_POST["ticketID"] : null;
    $attendeeID = isset($_POST["attendeeID"]) ? $_POST["attendeeID"] : null;
    $purchaseDate = isset($_POST["purchaseDate"]) ? $_POST["purchaseDate"] : null;
    $location = isset($_POST["location"]) ? $_POST["location"] : null;

    // Check if all required fields are provided and not empty
    if ($ticketID !== null && $attendeeID !== null && $purchaseDate !== null && $location !== null &&
        $ticketID !== "" && $attendeeID !== "" && $purchaseDate !== "" && $location !== "") {
        // Update the ticket record in the database
        $sql = "UPDATE Tickets 
                SET AttendeeID = ?, PurchaseDate = ?, Location = ?
                WHERE TicketID = ?";

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind the parameters
            $stmt->bind_param("issi", $attendeeID, $purchaseDate, $location, $ticketID);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Ticket record updated successfully";
            } else {
                echo "Error updating ticket record: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "All fields are required.";
    }
}

// Close connection
$conn->close();
?>