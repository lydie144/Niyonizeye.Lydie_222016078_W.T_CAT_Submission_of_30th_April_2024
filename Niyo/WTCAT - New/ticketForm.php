<?php include 'navbar.html'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Ticket form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('image/My festival.jpg'); /* Replace 'background_image.jpg' with your actual image path */
            background-size: cover;
            background-position: center;
        }
        
        h2 {
            text-align: center;
            color: white;
        }
        
        form {
            background-color: rgba(255, 255, 255, 0.8); /* Transparent white background */
            border-radius: 10px;
            padding: 20px;
            margin: 0 auto;
            max-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Box shadow for form */
        }
        
        label {
            display: block;
            margin-bottom: 10px;
        }
        
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        
        input[type="submit"],
        input[type="reset"] {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 10px;
        }
        
        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h2>Add New Ticket</h2>
    <form action="add_Ticket.php" method="post">
        <label for="	TicketID">	TicketID:</label><br>
        <input type="text" id="	TicketID" name="TicketID" required><br>
        
        <label for="AttendeeID">AttendeeID:</label><br>
        <input type="text" id="AttendeeID" name="AttendeeID" required><br>
        
        <label for="FestivalID">FestivalID:</label><br>
        <input type="text" id="FestivalID" name="FestivalID" required><br>
        
        <label for="PurchaseDate">PurchaseDate:</label><br>
        <input type="text" id="PurchaseDate" name="PurchaseDate" required><br><br>

        
        <label for="	Price">	Price:</label><br>
        <input type="text" id="	Price" name="	Price" required><br><br>

        <label for="	Location">	Location:</label><br>
        <input type="text" id="Location" name="Location" required><br><br>

 <input type="submit" value="Submit">
        <input type="reset" value="Clear">
    </form>

    <h2>Update Ticket</h2>
    <form action="update_ticket.php" method="post">
        <!-- Include the update_ticket.php file -->
        <?php include 'update_ticket.php'; ?>
        
        <!-- Hidden input field for ticketID -->
        <input type="hidden" id="ticketID" name="ticketID" value="<?php echo isset($_GET['ticketID']) ? $_GET['ticketID'] : ''; ?>">

        <label for="stageName">festivalID:</label><br>
        <input type="text" id="festivalID" name="festivalID" required><br>
        
        <label for="PurchaseDate">PurchaseDate:</label><br>
        <input type="text" id="PurchaseDate" name="PurchaseDate" required><br>

        <label for="Price">Price:</label><br>
        <input type="text" id="Price" name="Price" required><br>
        
        <input type="submit" value="Update">
        <input type="reset" value="Clear">
    </form>
    <h2>Delete Ticket</h2>
<form action="delete_ticket.php" method="post">
    <!-- Hidden input field for ticketID -->
    <label for="deleteID">Ticket ID :</label><br>
    <input type="number" id="deleteID" name="deleteID" required><br><br>
    
    <input type="submit" value="Delete">
</form>


</body>
</html>
