<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include 'db_connection.php';

    // Retrieve form data
    $attendeeID = $_POST["attendeeID"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    if(isset($_POST["email"])) {
        $email = $_POST["email"];
    }
    if(isset($_POST["phone"])) {
        $phone = $_POST["phone"];
    }
    // Update attendee record in the database
    $sql = "UPDATE Attendees 
            SET FirstName = ?, LastName = ?, Email = ?, Phone = ?
            WHERE AttendeeID = ?";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param("ssssi", $firstName, $lastName, $email, $phone, $attendeeID);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Attendee record updated successfully";
        } else {
            echo "Error updating attendee record: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

