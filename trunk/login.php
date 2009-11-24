<?php
session_start();
if((isset($_POST['login'])) AND (isset($_POST['password']))) {
include("config.php");
dbconnect();
$login = $_POST['login'];
$password = md5($_POST['password']);
$req = mysql_query("SELECT *  FROM `gb_users` WHERE `login` = '$login'");
$data = mysql_fetch_assoc($req);
if($password == $data['password']) {
$_SESSION['login'] = $login;
header('Location: index.php');
}
else {
echo("Login incorrect");
}
}
else {
echo("Remplissez le formulaire");
}
?>