<?php
$dbhost = "localhost";
$dbuser = "gnubook";
$dbpassword = "gnubookdev";
$dbbase = "radio";

function dbconnect() {
global $dbhost, $dbuser, $dbpassword, $dbbase;
mysql_connect($dbhost,$dbuser,$dbpassword);
mysql_select_db($dbbase);
}
?>
