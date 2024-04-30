<?php
$servername = "localhost";
$username = "Niyo";
$password = "222016078";
$dbname = "organizing_music_festival";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT OrganizerID, Name FROM organizer";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["OrganizerID"] . "'>" . $row["Name"] . "</option>";
    }
}
?>
