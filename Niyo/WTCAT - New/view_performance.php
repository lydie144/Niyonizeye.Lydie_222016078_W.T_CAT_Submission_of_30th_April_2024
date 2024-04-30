<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Performances</title>
    <style>
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

    <h2>Performances</h2>

    <table>
        <tr>
            <th>PerformanceID</th>
            <th>FestivalID</th>
            <th>ArtistID</th>
            <th>PerformanceDate</th>
            <th>StartTime</th>
            <th>Duration</th>
        </tr>
        <?php
        // Include database connection
        include 'db_connection.php';

        // Fetch data from Performances table
        $sql = "SELECT * FROM Performances";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["PerformanceID"] . "</td>";
                echo "<td>" . $row["FestivalID"] . "</td>";
                echo "<td>" . $row["ArtistID"] . "</td>";
                echo "<td>" . $row["PerformanceDate"] . "</td>";
                echo "<td>" . $row["StartTime"] . "</td>";
                echo "<td>" . $row["Duration"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>

</body>
</html>
