<?php
session_start();
if((isset($_SESSION['login'])) AND (isset($_POST['comment']))) {
include("config.php");
dbconnect();
$id = $_SESSION['lastid'];
$login = $_SESSION['login'];
$name = $_SESSION['lastname'];
$req = "INSERT INTO `gb_".$name."_comments` (`id`, `wireid`, `date`, `pseudo`, `text`) VALUES (NULL, '".$_POST['msgid']."', CURRENT_TIMESTAMP, '".$login."', '".$_POST['comment']."');"; 
mysql_query($req);
header('Location: profile.php?id='.$id);
}
else {
echo("Erreur");
}
?>