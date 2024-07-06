<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="homepage">
    <meta name="author" content="Syed Nabeel Shah">
    <link rel="reset" href="reset.css"/>
    <link rel="stylesheet" href="viewBlog.css"/>
    <link rel="stylesheet" href="mobileHomepage.css" media="screen and (max-width:768px)">
    <title>View Blog</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Kode+Mono:wght@400..700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bayon&family=Fruktur:ital@0;1&family=Goldman:wght@400;700&family=Sulphur+Point:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bayon&family=Fruktur:ital@0;1&family=Goldman:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="header-left">
            <h1>Syed Shah.</h1>
        </div>
        <div class="header-right">
            <nav>
                <ul>
                    <li><a href="homepage.html">HOME</a></li>
                    <li><a href="resume.html">EXPERIENCE</a></li>
                    <li><a href="projects.html">PROJECTS</a></li>
                    <li><a href="viewBlog.php">BLOG</a></li>
                    <li><a href="contact.html">CONTACT</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="main">

        <?php
        session_start();
        include 'connection.php';
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            echo "<p class='welcome-message'>Welcome, $email!</p>";
        }

        echo "<hr>";
        echo "<a class='add-post' href='addblog.html'>Add Post</a>";
        echo "<hr>";
        // Fetch blog posts from database
        $sql = "SELECT * FROM POSTS";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $posts = array();
            while ($row = $result->fetch_assoc()) {
                $posts[] = $row;
            }
            // Sort the posts array by the date in descending order
            usort($posts, function($a, $b) {
                $dateComparison = strtotime($b['date']) - strtotime($a['date']);
                if ($dateComparison == 0) {
                    return strtotime($b['time']) - strtotime($a['time']);
                } else {
                    return $dateComparison;
                }
            });

            foreach ($posts as $post) {
                $formattedDate = date('jS F Y, H:i T', strtotime($post['date'] . ' ' . $post['time']));
                echo "<div class='blog'>";
                echo "<p class='date-time'>{$formattedDate}</p>";
                echo "<h2 class='title'>{$post['title']}</h2>";
                echo "<p class='text'>{$post['text']}</p>";
                echo "<hr>";
                echo "</div>";
            }
        } else {
            echo "No blog posts found.";
            header("Location: blog.html");
        }
        $conn->close();
        ?>

        <p>
            <a class="logout" href='logout.php'>Logout</a>
        </P>
    </div>
</body>
</html>