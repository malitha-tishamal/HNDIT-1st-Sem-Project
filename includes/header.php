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

            <div class="status-section">
                <?php
                if (isset($_SESSION["user"])) {
                    echo "<div class='user-greeting'>Welcome, <span class='user-name'>" . htmlspecialchars($_SESSION["user"]) . "</span>!</div>";
                }
                ?>
            </div>

            <div class="auth-section">
                <?php if (!isset($_SESSION["user"])): ?>
                    <button class="btn btn-login" onclick="document.getElementById('id01').style.display='block'">
                        <i class="fa fa-fw fa-user"></i> Login
                    </button>
                    <button class="btn btn-signup" onclick="document.getElementById('id02').style.display='block'">
                        <i class="fa fa-sign-in"></i> Sign Up
                    </button>
                <?php else: ?>
                    <form method="post" action="logout.php" style="display:inline;">
                        <button type="submit" name="logout" class="btn btn-logout">
                            <i class="fa fa-sign-out"></i> Log Out
                        </button>
                    </form>
                <?php endif; ?>
            </div>
            
            <button class="mobile-menu-toggle" id="menuToggle">
                <i class="fa fa-bars"></i>
            </button>
        </div>
    </header>

    <nav class="navbar" id="nvg">
        <div class="nav-container">
            <a href="index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                <i class="fa fa-home"></i> Home
            </a>
            <a href="Store.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'Store.php' ? 'active' : ''; ?>">
                <i class="fa fa-shopping-cart"></i> Store
            </a>
            <a href="news.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'news.php' ? 'active' : ''; ?>">
                <i class="fa fa-newspaper-o"></i> News
            </a>
            <div class="dropdown">
                <button class="dropdown-btn">
                    <i class="fa fa-download"></i> Downloads <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-contents">
                    <a href="java-download.php"><i class='fa fa-coffee'></i> Java</a>
                    <a href="python-download.php"><i class="fa fa-code"></i> Python</a>
                    <a href="web-download.php"><i class="fa fa-globe"></i> Web</a>
                </div>
            </div>
            <a href="courses.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'courses.php' ? 'active' : ''; ?>">
                <i class="fa fa-clone"></i> Courses
            </a>
            <a href="contact.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>">
                <i class="fa fa-envelope"></i> Contact
            </a>
            <a href="Admin.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'Admin.php' ? 'active' : ''; ?>">
                <i class="fa fa-user-secret"></i> Admin
            </a>
            <a href="Register.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'Register.php' ? 'active' : ''; ?>">
                <i class="fa fa-user-circle-o"></i> Register
            </a>
        </div>
    </nav>

    <!-- Modals (moved here for consistency) -->
    <?php include_once("modals.php"); ?>

    <main class="main-content">
