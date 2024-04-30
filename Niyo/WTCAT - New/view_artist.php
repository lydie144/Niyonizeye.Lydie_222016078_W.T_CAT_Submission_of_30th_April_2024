<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Artists</title>
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
    <a href="view_artist.php">View Artists</a>
    <!-- Add other navigation links if needed -->
</div>

<h2>Artists</h2>

<table>
    <tr>
        <th>Artist ID</th>
        <th>Stage Name</th>
        <th>Genre</th>
        <th>Platform</th>
        <th>Email</th>
    </tr>
    <?php
    // Include database connection
    include 'db_connection.php';

    // Fetch data from artist table
    $sql = "SELECT * FROM artist";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ArtistID"] . "</td>";
            echo "<td>" . $row["stageName"] . "</td>";
            echo "<td>" . $row["Genre"] . "</td>";
            echo "<td>" . $row["platform"] . "</td>";
            echo "<td>" . $row["Email"] . "</td>";
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
