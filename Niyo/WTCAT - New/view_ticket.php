<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Tickets</title>
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
    <div class="navbar">
        <a href="view_ticket.php">View Tickets</a>
        <!-- Add other navigation links if needed -->
    </div>

    <h1>Tickets</h1>
    <table>
        <thead>
            <tr>
                <th>Attendee ID</th>
                <th>Festival ID</th>
                <th>Purchase Date</th>
                <th>Price</th>
                <th>Location</th>
                <th>Ticket ID</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Include database connection
            include 'db_connection.php';

            // Fetch data from tickets table
            $sql = "SELECT * FROM tickets";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["AttendeeID"] . "</td>";
                    echo "<td>" . $row["FestivalID"] . "</td>";
                    echo "<td>" . $row["PurchaseDate"] . "</td>";
                    echo "<td>" . $row["Price"] . "</td>";
                    echo "<td>" . $row["Location"] . "</td>";
                    echo "<td>" . $row["TicketID"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No records found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
