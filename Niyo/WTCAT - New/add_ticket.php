<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include 'db_connection.php';

    // Retrieve form data and sanitize inputs
    $attendeeID = isset($_POST["attendeeID"]) ? $_POST["attendeeID"] : null;
    $festivalID = isset($_POST["festivalID"]) ? $_POST["festivalID"] : null;
    $purchaseDate = isset($_POST["purchaseDate"]) ? $_POST["purchaseDate"] : null;
    $price = isset($_POST["price"]) ? $_POST["price"] : null;
    $location = isset($_POST["location"]) ? $_POST["location"] : null;

    // Check if all required fields are provided
    if ($attendeeID && $festivalID && $purchaseDate && $price && $location) {
        // Insert the ticket record into the database
        $sql = "INSERT INTO Tickets (AttendeeID, FestivalID, PurchaseDate, Price, Location) 
                VALUES (?, ?, ?, ?, ?)";

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind the parameters
            $stmt->bind_param("iisds", $attendeeID, $festivalID, $purchaseDate, $price, $location);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Ticket added successfully";
            } else {
                echo "Error adding ticket: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "All fields are required.";
    }

    // Close connection
    $conn->close();
}
?>
