<?php
// Database connection parameters
require_once "db_connection.php";

// SQL query to retrieve records from the Organizer table
$sql = "SELECT * FROM Organizer";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Organizer</title>
    <style>
        /* CSS styles */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="navbar">
        
        <!-- Add other navigation links if needed -->
    </div>

    <h2>Organizer Records</h2>
    <table>
        <tr>
            <th>OrganizerID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Title</th>
            <th>Location</th>
        </tr>
        <?php
        // Check if there are any records in the result set
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["OrganizerID"]."</td>";
                echo "<td>".$row["Name"]."</td>";
                echo "<td>".$row["Phone"]."</td>";
                echo "<td>".$row["Email"]."</td>";
                echo "<td>".$row["Title"]."</td>";
                echo "<td>".$row["Location"]."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No organizer found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
