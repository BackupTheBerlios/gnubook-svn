<?php
session_start();
if((isset($_SESSION['login'])) AND (isset($_POST['text']))) {
include("config.php");
dbconnect();
$id = $_SESSION['lastid'];
$text = $_POST['text'];
$login = $_SESSION['login'];
$name = $_SESSION['lastname'];
$req = "INSERT INTO `gb_".$name."_wire` (`id`, `text`, `user`) VALUES (NULL, '".$text."', '".$login."');";
mysql_query($req);
header('Location: profile.php?id='.$id);
echo(mysql_error());
}
else {
echo("Erreur");
}
?>