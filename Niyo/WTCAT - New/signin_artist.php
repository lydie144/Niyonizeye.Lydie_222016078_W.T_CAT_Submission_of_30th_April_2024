<?php
session_start();

// Assuming you have verified the user's credentials and set $username variable
$username = "jolie"; // Example username

// Set session variables
$_SESSION["authenticated"] = true;
$_SESSION["username"] = $username;

// Display welcome message
echo "Welcome, $username! You are now signed in.";

// Redirect to dashboard page
header("Location: dashboard.html");
exit();
?>
