<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: admin.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $blogTitle = $_POST['blogTitle'];
    $blogContent = $_POST['blogContent'];
    $blogTags = $_POST['blogTags'];

    // Convert raw content to HTML tags (sanitize as needed)
    $formattedContent = nl2br(htmlspecialchars($blogContent));
    // Generate the HTML content
    $htmlContent = <<<HTML
<html>
<head>
    <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>$blogTitle</title
      <meta name="keywords" content="$blogTags">
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Place favicon.ico in the root directory -->
      <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
      <link rel="stylesheet" href="assets/css/preloader.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/slick.css">
      <link rel="stylesheet" href="assets/css/meanmenu.css">
      <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
      <link rel="stylesheet" href="assets/css/animate.min.css">
      <link rel="stylesheet" href="assets/css/backToTop.css">
      <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
      <link rel="stylesheet" href="assets/css/fontAwesome5Pro.css">
      <link rel="stylesheet" href="assets/css/elegantFont.css">
      <link rel="stylesheet" href="assets/css/default.css">
      <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header>
   <div class="header__area header__shadow-2 white-bg" id="header-sticky">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-6">
               <div class="logo">
                  <a href="https://webdev.wemakin.com/">
                  <img src="assets/img/logo/webdev.png" alt="logo">
                  </a>
               </div>
            </div>
            <div class="col-xxl-7 col-xl-7 col-lg-8 d-none d-lg-block">
               <div class="main-menu d-flex justify-content-end">
                  <nav id="mobile-menu">
                     <ul>
                        <li >
                           <a href="https://webdev.wemakin.com/">Home</a>
                        </li>
                        <li class="has-dropdown">
                           <a>Services</a>
                           <ul class="submenu">
                                    <li><a href="https://wemakin.com/#graphic_category">Logo & Graphics</a></li>
                                    <li><a href="https://wemakin.com/#video_catergory">Video & Animation</a></li>
                                    <li><a href="https://wemakin.com/#website_category">Websites & App Dev</a></li>
                                    <li><a href="https://wemakin.com/#blockchain_category">Blockchain Dev</a></li>
                           </ul>
                        </li>
                        <li><a href="support.html">Support</a></li>
                       <!-- <li>
                           <a href="blog.html">Blog</a>
                        </li>
                        -->
                        <li><a href="contact.html">Contact</a></li>
                     </ul>
                  </nav>
               </div>
            </div>
            <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-8 col-6">
               <div class="header__action d-flex align-items-center justify-content-end">
                  <div class="header__btn d-none d-xl-block">
                     <a href="https://www.wemakin.com/" class="m-btn m-btn-2">WEMAKIN</a>
                  </div>
                  <div class="sidebar__menu d-lg-none">
                     <div class="sidebar-toggle-btn" id="sidebar-toggle">
                         <span class="line"></span>
                         <span class="line"></span>
                         <span class="line"></span>
                     </div>
                 </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>
<!-- sidebar area start -->
      <div class="sidebar__area">
         <div class="sidebar__wrapper">
            <div class="sidebar__close">
               <button class="sidebar__close-btn" id="sidebar__close-btn">
               <span><i class="fal fa-times"></i></span>
               <span>close</span>
               </button>
            </div>
            <div class="sidebar__content">
               <div class="logo mb-40">
                  <a href="https://wemakin.com/">
                  <img src="assets/img/logo/web.png" alt="logo">
                  </a>
               </div>
               <div class="mobile-menu"></div>
               <div class="sidebar__action mt-330">
               </div>
            </div>
         </div>
      </div>
      <!-- sidebar area end -->      
      <div class="body-overlay"></div>
      <!-- sidebar area end -->
    <h1 style="margin: 10px; padding: 10px; max-width: 100%; overflow-wrap: break-word;">$blogTitle</h1>
    <div style="margin: 10px; padding: 10px; max-width: 100%; overflow-wrap: break-word;">$formattedContent</div>
    <footer>
      <div class="footer__area footer-bg">
         <div class="footer__top pt-90 pb-50">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-4">
                     <div class="footer__widget mb-40 wow fadeInUp footer__pl"  data-wow-delay=".7s">
                        <div class="footer__widget-head">
                           <h4 class="footer__widget-title">Services</h4>
                        </div>
                        <div class="footer__widget-content">
                           <div class="footer__link">
                              <ul>
                                    <li><a href="https://wemakin.com/#graphic_category">Logo & Graphics</a></li>
                                    <li><a href="https://wemakin.com/#video_catergory">Video & Animation</a></li>
                                    <li><a href="https://wemakin.com/#website_category">Websites & App Dev</a></li>
                                    <li><a href="https://wemakin.com/#blockchain_category">Blockchain Dev</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-4">
                     <div class="footer__widget mb-40 wow fadeInUp" data-wow-delay=".9s">
                        <div class="footer__widget-head">
                           <h4 class="footer__widget-title">Pages</h4>
                        </div>
                        <div class="footer__widget-content">
                           <div class="footer__link">
                              <ul>
                                 <li><a href="https://wemakin.com/">Home</a></li>
                                 <li><a href="https://wemakin.com/about.html">About</a></li>
                                 <li><a href="https://wemakin.com/support.html">Support</a></li>
                                 <li><a href="https://webdev.wemakin.com/blog.html">Blog</a></li>
                                 <li><a href="https://wemakin.com/contact.html">Contact</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-4">
                     <div class="footer__widget mb-40 wow fadeInUp" data-wow-delay="1.2s">
                        <div class="footer__widget-head">
                           <h4 class="footer__widget-title">Emails</h4>
                        </div>
                        <div class="footer__widget-content">
                           <div class="footer__link">
                              <ul>
                                 <li><a href="mailto:support@wemakin.com">Support</a></li>
                                 <li><a href="mailto:contact@wemakin.com">Contact</a></li>
                                 <li><a href="mailto:delivery@wemakin.com">Delivery</a></li>
                                 <li><a href="mailto:info@wemakin.com">Information</a></li>
                                 <li><a href="#">Jobs Section</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="footer__bottom">
            <div class="container">
               <div class="footer__bottom-inner">
                  <div class="row">
                     <div class="col-xxl-6 col-xl-6 col-md-6">
                        <div class="footer__copyright wow fadeInUp" data-wow-delay=".5s">
                           <p>Copyright © 2023 All Rights Reserved, Design by <a href="wasif.html">WeMakin Developers</a></p>
                        </div>
                     </div>
                     <div class="col-xxl-6 col-xl-6 col-md-6">
                        <div class="footer__bottom-link wow fadeInUp text-md-end" data-wow-delay=".8s">
                           <ul>
                              <li><a href="privacy-policy.html">Privacy Policy </a></li>
                              <li><a href="sitemap.xml">Sitemap</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
      <script src="assets/js/vendor/waypoints.min.js"></script>
      <script src="assets/js/bootstrap.bundle.min.js"></script>
      <script src="assets/js/jquery.meanmenu.js"></script>
      <script src="assets/js/slick.min.js"></script>
      <script src="assets/js/jquery.fancybox.min.js"></script>
      <script src="assets/js/isotope.pkgd.min.js"></script>
      <script src="assets/js/parallax.min.js"></script>
      <script src="assets/js/owl.carousel.min.js"></script>
      <script src="assets/js/backToTop.js"></script>
      <script src="assets/js/jquery.counterup.min.js"></script>
      <script src="assets/js/ajax-form.js"></script>
      <script src="assets/js/wow.min.js"></script>
      <script src="assets/js/imagesloaded.pkgd.min.js"></script>
      <script src="assets/js/main.js"></script>
</body>
</html>
HTML;


    // Define the directory path
    $directoryPath = "blogs";
    $fileName = strtolower(str_replace(' ', '_', $blogTitle)) . '.html';
    $filePath = "$directoryPath/$fileName";

    // Attempt to write the content to the file and handle errors
   if (file_put_contents($filePath, $htmlContent) !== false) {
    header("Location: success.html");
    include 'generate_sitemap.php';
    exit();
        } else {
    echo "Error creating the blog post.";

        // Attempt to create the directory if it doesn't exist
        if (!is_dir($directoryPath)) {
            if (mkdir($directoryPath, 0777, true)) {
                echo "<br>Directory created.";
            } else {
                echo "<br>Failed to create the directory.";
            }
        }

        // Attempt to change directory permissions
        if (chmod($directoryPath, 0777)) {
            echo "<br>Directory permissions updated.";
        } else {
            echo "<br>Failed to update directory permissions.";
        }
    }
}

?>
