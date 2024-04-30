<?php
session_start();

// Check if the user is authenticated
if (!isset($_SESSION["authenticated"]) || !$_SESSION["authenticated"]) {
    // Redirect the user to the sign-in page if not authenticated
    header("Location: signin_artist.php");
    exit();
}
?>
