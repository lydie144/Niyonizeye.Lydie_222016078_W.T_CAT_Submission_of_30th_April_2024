<?php
// Database connection parameters
require_once "db_connection.php";

// SQL query to retrieve records from the Festival table
$sql = "SELECT * FROM Festival";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Festivals</title>
    <style>
        /* Add your CSS styles here */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Festival Records</h2>
    <table>
        <tr>
            <th>FestivalID</th>
            <th>Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>OrganizerID</th>
            <th>Ticket Price</th>
        </tr>
        <?php
        // Check if there are any records in the result set
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["FestivalID"]."</td>";
                echo "<td>".$row["Name"]."</td>";
                echo "<td>".$row["StartDate"]."</td>";
                echo "<td>".$row["EndDate"]."</td>";
                echo "<td>".$row["OrganizerID"]."</td>";
                echo "<td>".$row["Ticket Price"]."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No festivals found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
