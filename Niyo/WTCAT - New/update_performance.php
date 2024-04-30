<?php
 
// Check if form is submitted
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
       include 'db_connection.php';
    // Extract form data
    $performance_id_update = $_POST['performance_id_update'];
    $artistID_update = $_POST['artistID_update'];
    $performanceDate_update = $_POST['performanceDate_update'];
    $startTime_update = $_POST['startTime_update'];

    // Prepare SQL statement
    $sql = "UPDATE performances SET ArtistID = '$artistID_update', PerformanceDate = '$performanceDate_update', StartTime = '$startTime_update' WHERE PerformanceID = '$performance_id_update'";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Performance record updated successfully.";
    } else {
        echo "Error updating performance record: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>