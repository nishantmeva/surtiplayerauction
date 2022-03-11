<?php

/* time zone */
date_default_timezone_set("Asia/Kolkata");


$hostname = 'localhost';        // Your MySQL hostname. Usualy named as 'localhost', so you're NOT necessary to change this even this script has already online on the internet.
$dbname   = 'surti_cricket_auction';       // Your database name.
$username = 'root';             // Your database username.
$password = '';                 // Your database password. If your database has no password, leave it empty.

global $conn;
// Let's connect to host
$conn = mysqli_connect($hostname, $username, $password,$dbname) or DIE('Connection to host is failed, perhaps the service is down!');
// Select the database
// mysqli_select_db($dbname) or DIE('Database name is not available!');

define('DB_HOST', $hostname);
define('DB_NAME', $dbname);
define('DB_USERNAME', $username);
define('DB_PASSWORD', $password);
define('SITENAME', 'Shree Surti Modh Vanik Athwa Panch Yuvak Mandal - Cricket Premier League');
define('YEAR', '2022');
define('FRONT_SITEURL', '/surtiplayerauction/front');

?>
