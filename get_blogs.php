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

            // Check if the file is not from the "assets" folder
            if (strpos($filePath, 'assets/') === false) {
                echo "<div class='blog-item'>";
                echo "<a class='blog-link' href='$filePath'>$blogTitle</a>";
                echo "<p class='timestamp'>$timestamp</p>";
                echo "</div>";
            }
        }
    }
} else {
    echo "No blogs found.";
}
?>
