<?php
// Start the session (if not already started)
session_start();

// Check if the user wants to sign out
if (isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
    // Perform sign-out actions here (e.g., clearing session, cookies, etc.)
    // For example, you can clear the session data:
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session

    // Redirect to the sign-in page after sign-out
    header("Location: signin.php");
    exit(); // Make sure to exit after redirection
}

// If the user hasn't confirmed sign-out yet, show the confirmation popup
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Out</title>
</head>
<body>
    <script>
        // Function to show the confirmation popup
        function confirmSignOut() {
            if (confirm("Are you sure you want to sign out?")) {
                // If the user confirms, redirect to sign-out page with confirmation parameter
                window.location.href = "signin_artist_form.html?confirm=true";
            }
        }

        // Call the confirmation function when the page loads
        window.onload = confirmSignOut;
    </script>
    <h1>Sign Out Confirmation</h1>
    <p>Please wait while we confirm your sign-out...</p>
</body>
</html>
