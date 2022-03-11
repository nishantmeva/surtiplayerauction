<?php require_once('config/conn.php');
require_once('config/functions.php'); 
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo SITENAME;?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="icon" type="image/x-icon" href="../common_uploads/favicon.png" />

    <!-- CSS here -->
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    <link type="text/css" rel="stylesheet" href="assets/css/custom_style.css">
    <link type="text/css" rel="stylesheet" href="assets/css/fontawesome-all.min.css">
</head>

<body>
    
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper">
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>                                                
                                <ul id="navigation">  
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="auction.php">Auction</a></li>
                                    <li><a href="teams.php">Teams</a></li>
                                    <li><a href="unsold_players.php">Unsold Players</a></li>
                                    <li><a href="playerlist.php">Player List</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>