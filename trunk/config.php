<?php
$dbhost = "localhost"; //Set the database host
$dbuser = "gnubook";
$dbpassword = "gnubookdev";
$dbbase = "gnushare";

function dbconnect() {
global $dbhost, $dbuser, $dbpassword, $dbbase;
mysql_connect($dbhost,$dbuser,$dbpassword);
mysql_select_db($dbbase);
}
?>
