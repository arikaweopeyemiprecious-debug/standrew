<?php
// PHP 5.2.5-compatible configuration
$db_host = 'localhost';
$db_name = 'st_andrews';
$db_user = 'root';
$db_pass = 'mysql';

$conn = @mysql_connect($db_host, $db_user, $db_pass);
if (!$conn) { die('Database connection failed. Check includes/config.php and start MySQL in XAMPP.'); }
if (!@mysql_select_db($db_name, $conn)) { die('Database "'.$db_name.'" was not found. Import database.sql first.'); }
@mysql_query("SET NAMES utf8", $conn);
?>
