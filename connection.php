<?php
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "ecs417";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}