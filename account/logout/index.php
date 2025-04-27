<?php
session_start(); // Start the session

// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to the login page (or any other page you choose)
header("Location: /cartify/account/login-using-password/"); // Change to your login page
exit();
