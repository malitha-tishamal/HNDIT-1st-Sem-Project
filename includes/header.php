<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Learninglk - Empowering your IT journey with professional courses in Java, Python, and Web Development.">
    <meta name="keywords" content="IT courses, Java, Python, Web Development, Learninglk, Education, Galle, ATI">
    <meta name="author" content="Malitha Tishamal">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://learninglk.com/">
    <meta property="og:title" content="Learninglk - Inspire your IT knowledge">
    <meta property="og:description" content="Join our expert-led IT courses and master the technologies of the future.">
    <meta property="og:image" content="images/icon.png">

    <link rel="icon" href="images/icon-head.png">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/banner.css">
    <link rel="stylesheet" type="text/css" href="css/log-in-out.css">
    <link rel="stylesheet" type="text/css" href="css/modern-ui.css">
    
    <title><?php echo isset($pageTitle) ? $pageTitle . " | Learninglk" : "Learninglk - Inspire your IT knowledge"; ?></title>
</head>
<body class="modern-theme">

    <header class="main-header">
        <div class="header-container">
            <div class="logo-section">
                <a href="index.php" class="logo-link">
                    <img src="images/icon.png" alt="Learninglk Logo" class="main-logo">
                </a>
            </div>

            <nav class="nav-links">
                <a href="index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">Home</a>
                <a href="Store.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'Store.php' ? 'active' : ''; ?>">Store</a>
                <a href="news.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'news.php' ? 'active' : ''; ?>">News</a>
                <div class="dropdown">
                    <button class="dropdown-btn">
                        Downloads
                    </button>
                    <div class="dropdown-contents">
                        <a href="java-download.php">Java</a>
                        <a href="python-download.php">Python</a>
                        <a href="web-download.php">Web</a>
                    </div>
                </div>
                <a href="courses.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'courses.php' ? 'active' : ''; ?>">Courses</a>
                <a href="contact.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>">Contact Us</a>
                <a href="Admin.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'Admin.php' ? 'active' : ''; ?>">Admin</a>
            </nav>

            <div class="auth-section">
                <?php if (!isset($_SESSION["user"])): ?>
                    <button class="btn btn-login" onclick="document.getElementById('id01').style.display='block'">
                        Login
                    </button>
                    <button class="btn btn-signup" onclick="document.getElementById('id02').style.display='block'">
                        Sign In
                    </button>
                <?php else: ?>
                    <span class='user-greeting' style="margin-right: 15px; font-weight: 600; color: var(--text-main);">Hi, <?php echo htmlspecialchars($_SESSION["user"]); ?></span>
                    <form method="post" action="logout.php" style="display:inline;">
                        <button type="submit" name="logout" class="btn btn-login" style="padding: 0.5rem 1.5rem; font-size: 0.9rem;">
                            Log Out
                        </button>
                    </form>
                <?php endif; ?>
            </div>
            
            <button class="mobile-menu-toggle" id="menuToggle">
                <i class="fa fa-bars"></i>
            </button>
        </div>
    </header>

    <!-- Modals (moved here for consistency) -->
    <?php include_once("modals.php"); ?>

    <main class="main-content">
