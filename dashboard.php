<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    // Validate the entered credentials
    $validUsername = "admin";
    $validPassword = "wemakin";

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gluten:wght@300&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <style>
        /* Dark mode styles */
body {
    font-family: 'Gluten', cursive;
    margin: 0;
    padding: 20px;
    background-color: #121212;
    color: #ffffff;
}

h1 {
    font-size: 24px;
    text-align: center;
    margin-bottom: 20px;
    font-family: 'Gluten', cursive;
    letter-spacing: 1px; 
}
h3 {
    font-size: 18px;
    text-align: center;
    margin-bottom: 20px;
    font-family: 'Gluten', cursive;
    letter-spacing: 1px; 
}
h2{
    letter-spacing: 1px; 
}
h5 {
    font-size: 14px;
    text-align: center;
    margin-bottom: 20px;
    font-family: 'Gluten', cursive;
    letter-spacing: 1px; 
}
form {
    background-color: #1f1f1f;
    border-radius: 8px;
    padding: 20px;
}

label {
    display: block;
    font-size: 18px;
    margin-bottom: 5px;
    color: #ffffff;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #555;
    border-radius: 4px;
    font-size: 16px;
    margin-bottom: 15px;
    box-sizing: border-box;
    background-color: #333;
    color: #ffffff;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    font-family: 'Gluten', cursive;
}

input[type="submit"]:hover {
    background-color: #45a049;
    font-family: 'Gluten', cursive;
}

.blog-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    grid-gap: 20px;
    margin-top: 20px;
}

.blog-item {
    background-color: #2b2b2b;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.blog-link {
    text-decoration: none;
    color: #ffffff;
    font-weight: bold;
    letter-spacing: 0.6px;
    line-height: 20px;
}

.timestamp {
    font-size: 14px;
    color: #999;
    margin-top: 5px;
}
        /* Style the image upload input */
input[type="file"] {
    display: block;
    margin-bottom: 15px;
    background-color: #333;
    border: 1px solid #ccc;
    padding: 8px 12px;
    border-radius: 5px;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s, border-color 0.3s;
}

/* Style the input on hover */
input[type="file"]:hover {
    background-color: #e0e0e0;
    border-color: #999;
}

    </style>
</head>
<body>
    
    <?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    // Validate the entered credentials
    $validUsername = "admin";
    $validPassword = "wemakin";

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
    <title>DASHBOARD | WEMAKIN BLOGGING SYSTEM</title>
</head>
<body>
    <h1>DASHBOARD | WEMAKIN</h1>
    <h3>Welcome, Umer <?php echo $_SESSION['username']; ?>!</h3>

    <h2></h2><h2>Post New Blog</h2>
    
    <form action="create_post.php" method="post" enctype="multipart/form-data">
    <label for="blogTitle">Blog Title:</label>
    <input type="text" name="blogTitle" id="blogTitle" required>
    
    <label for="blogContent">Blog Content:</label>
    <textarea name="blogContent" id="blogContent" rows="5" required></textarea>
    
    <label for="blogTags">Meta Descritpion:</label>
    <input type="text" name="blogTags" id="blogTags">
    
    <label for="blogImage">Upload Image:</label>
    <input type="file" name="blogImage" id="blogImage" accept="image/*">
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
<footer><h5>Made by Wasiff | All Rights Reserved 2023 <br> <br>wemakin.com by Sarkaar Inc.</h5></footer>

</body>
</html>


    

