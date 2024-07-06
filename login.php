<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted credentials
    $email = $_POST["email"];
    $logpassword = $_POST["password"];

    include 'connection.php';

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM CREDENTIALS WHERE email = '$email' AND password = '$logpassword'";
    $result = $conn->query($sql);

    // Check if the query returned any rows
    if ($result->num_rows > 0) {
        // Start a session
        session_start();
        // Store the email in a session variable
        $_SESSION["email"] = $email;
        // Login successful
        echo "<p>Welcome, $email!</p>";
        echo "<a href='logout.php'>Logout</a>"; // Add the logout link
        header("Location: addblog.html"); // Redirect to addBlog.html
        exit();
    } else {
        // Login failed
        echo "<p>Error: Invalid credentials.</p>";
    }
    $conn->close();
}