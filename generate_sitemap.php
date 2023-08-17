<?php
$directoryPath = "blogs";
$sitemapFilePath = "sitemap.xml";

if (is_dir($directoryPath)) {
    $files = scandir($directoryPath);
    $sitemapContent = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    // Add the index.html URL at the top of the sitemap
    $indexUrl = "https://webdev.wemakin.com/index.html";
    $sitemapContent .= "
    <url>
        <loc>$indexUrl</loc>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>";

    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $filePath = "$directoryPath/$file";
            $fileInfo = pathinfo($filePath);

            // Check if the file is an HTML file
            if ($fileInfo['extension'] === 'html') {
                $url = "https://webdev.wemakin.com/$filePath";
                $lastMod = date("Y-m-d", filemtime($filePath));

                $sitemapContent .= "
    <url>
        <loc>$url</loc>
        <lastmod>$lastMod</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>";
            }
        }
    }

    $sitemapContent .= "
</urlset>";

    // Save the sitemap to the specified file
    file_put_contents($sitemapFilePath, $sitemapContent);

    echo "Sitemap generated successfully!";
} else {
    echo "The '$directoryPath' directory does not exist.";
}
?>
