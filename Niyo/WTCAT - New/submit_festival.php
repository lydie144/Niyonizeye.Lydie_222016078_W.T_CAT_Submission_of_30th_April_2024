<?php
require_once "db_connection.php";
// Prepare and bind parameters
$stmt = $conn->prepare("INSERT INTO festival (Name, StartDate, EndDate, OrganizerID, `Ticket Price`) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssssi", $name, $start_date, $end_date, $organizer_id, $ticket_price);


// Set parameters and execute
$name = $_POST['name'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$organizer_id = $_POST['organizer_id'];
$ticket_price = $_POST['ticket_price'];
$stmt->execute();

echo "New record submited successfully";

$stmt->close();
$conn->close();
?>
