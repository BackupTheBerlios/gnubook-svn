<?php
session_start();
include("config.php");
dbconnect();
$req = "SELECT *  FROM `gb_".$_SESSION['lastname']."_wire` WHERE `id` = ".$_GET['id'];
$rep = mysql_query($req);
$data = mysql_fetch_assoc($rep);
echo(mysql_error());
if(($_SESSION['login'] == $_SESSION['lastname']) OR ($data['user'] == $_SESSION['login'])) {
$req = "DELETE FROM `gb_".$_SESSION['lastname']."_wire` WHERE `id` = ".$_GET['id'];

mysql_query($req);
echo(mysql_error());
mysql_close();
header("Location: ".$_SERVER['HTTP_REFERER']);
}
?>
