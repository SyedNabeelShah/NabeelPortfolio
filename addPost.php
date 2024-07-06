<?php
session_start();
include 'connection.php';

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    echo "<p>Welcome, $email!</p>";
    echo "<a href='logout.php'>Logout</a>"; // Add the logout link
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['email'])) {
        // Retrieve the post data from the form
        $title = $_POST['title'];
        $text = $_POST['text'];
        $date = date('y-m-d');
        $time = gmdate('H:i:s');
        
        // Insert the post into the database
        $sql = "INSERT INTO POSTS (title, text, date, time) VALUES ('$title', '$text', '$date', '$time')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Redirect to viewBlog.php
            header("Location: viewBlog.php");
            exit;
        } else {
            // Handle the error
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // If the user is not logged in, redirect them to the login page
        header("Location: blog.html");
        exit;
    }
}

$conn->close();