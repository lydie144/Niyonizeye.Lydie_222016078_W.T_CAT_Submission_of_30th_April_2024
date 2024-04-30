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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $artistID = isset($_POST["artistID"]) ? $_POST["artistID"] : null;
    $stageName = isset($_POST["stageName"]) ? $_POST["stageName"] : null;
    $platform = isset($_POST["platform"]) ? $_POST["platform"] : null;

    // Check if all required fields are provided
    if ($artistID && $stageName && $platform) {
        // Update the artist record in the database
        $sql = "UPDATE artists 
                SET StageName = '$stageName', Platform = '$platform'
                WHERE ArtistID = '$artistID'";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            echo "Artist record updated successfully";
        } else {
            echo "Error updating artist record: " . $conn->error;
        }
    } else {
        echo "All fields are required.";
    }
}

// Close connection
$conn->close();
?>
