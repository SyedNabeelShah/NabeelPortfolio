<?php
session_start(); // Start the session

// Reset all $_SESSION variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the homepage
header("Location: homepage.html");
exit();