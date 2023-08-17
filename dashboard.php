<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    // Validate the entered credentials
    $validUsername = "admin";
    $validPassword = "admin";

    if ($enteredUsername === $validUsername && $enteredPassword === $validPassword) {
        $_SESSION['username'] = $validUsername;
    } else {
        echo "Invalid credentials.";
    }
}

if (!isset($_SESSION['username'])) {
    header("Location: admin.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            background-color: #f7f7f7;
            border-radius: 8px;
            padding: 20px;
        }

        label {
            display: block;
            font-size: 18px;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        .blog-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            grid-gap: 20px;
            margin-top: 20px;
        }

        .blog-item {
            background-color: #f4f4f4;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .blog-link {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .timestamp {
            font-size: 14px;
            color: #666;
            margin-top: 5px;
        }



    </style>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1

    <h2></h2><h2>Post New Blog</h2>
    
    <form action="create_post.php" method="post">
        <label for="blogTitle">Blog Title:</label>
        <input type="text" name="blogTitle" id="blogTitle" required>
        <label for="blogContent">Blog Content:</label>
        <textarea name="blogContent" id="blogContent" rows="5" required></textarea>
        <label for="blogTags">Tags (comma-separated):</label>
        <input type="text" name="blogTags" id="blogTags">
        <input type="submit" value="Post">
    </form>
    
    <h2>Previously Posted Blogs</h2>
<div class="blog-list">
    <?php
    $directoryPath = "blogs";

    if (is_dir($directoryPath)) {
        $files = scandir($directoryPath);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $filePath = "$directoryPath/$file";
                $fileInfo = pathinfo($filePath);
                $blogTitle = str_replace('_', ' ', ucwords($fileInfo['filename']));
                $timestamp = date("F d, Y H:i:s", filemtime($filePath));

                echo "<div class='blog-item'>";
                echo "<a class='blog-link' href='$filePath'>$blogTitle</a>";
                echo "<p class='timestamp'>$timestamp</p>";
                echo "</div>";
            }
        }
    } else {
        echo "No blogs found.";
    }
    ?>
</div>
<!-- Add this button in dashboard.php -->

</body>
</html>

