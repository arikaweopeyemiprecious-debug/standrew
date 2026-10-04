<?php
if (!isset($page_title)) $page_title = 'St. Andrew’s Anglican Church';
require_once(dirname(__FILE__) . '/auth.php');
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo htmlspecialchars($page_title); ?> | St. Andrew’s Anglican Church</title>
<link rel="stylesheet" href="style.css">
</head><body>
<header class="site-header">
  <div class="topbar"><div class="container topbar-inner"><span>St. Andrew’s Anglican Church, Sauka, Kuje-Abuja</span><span>Sunday Worship • 8:00 AM</span></div></div>
  <div class="nav-wrap"><div class="container nav">
    <a class="brand" href="index.php"><img src="church-logo.png" alt="St. Andrew's Anglican Church logo"><span><strong>ST. ANDREW’S</strong><small>ANGLICAN CHURCH • SAUKA</small></span></a>
    <button class="menu-btn" onclick="toggleMenu()">☰</button>
    <nav id="mainNav"><a href="index.php">Home</a><a href="about.php">About</a><a href="sermons.php">Sermons</a><a href="gallery.php">Gallery</a><a href="contact.php">Contact</a><?php if (is_logged_in()) { ?><span class="nav-user">Hi, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span><a class="nav-login" href="logout.php">Logout</a><?php } else { ?><a class="nav-login" href="login.php">Login</a><a class="nav-signup" href="signup.php">Sign Up</a><?php } ?></nav>
  </div></div>
</header>
<main>
