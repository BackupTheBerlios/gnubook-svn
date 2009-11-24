<?php
session_start();
?>
<html><body>
<?php
if(empty($_SESSION['login'])) {
?>
<h1>Bienvenue sur GNUShare!!!</h1>
<form action="login.php" method="POST">
<p>Login: <input type="text" name="login" value="" /></p>
<p>Mot de passe: <input type="password" name="password" value="" /></p>
<p><input type="submit" name="" value="OK" /></p>
</form>
<a href="signup.php">Créez un compte</a>
<?php
}
else {
include("config.php");
dbconnect();
$login = $_SESSION['login'];
$req = mysql_query("SELECT *  FROM `gb_users` WHERE `login` = '$login'"); 
$data = mysql_fetch_assoc($req);

$id = $data['id'];
$_SESSION['myid'] = $id;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>GnuShare</title>
</head>
<body>
<h1>Bienvenue sur GNUShare!</h1>
<h3><?php echo($data['name']); ?></h3>
<a href="profile.php?id=<?php echo($id); ?>">Profil</a>
<p><form action="search.php" method="POST">
<p>Nom: <input type="text" name="search" value="" /><input type="submit" name="" value="Chercher" /></p></form></p>
<p><a href="myfriends.php">Mes amis</a></p>
<a href="index.php?kill=1">Déconnexion</a>
</body>
</html>
<?php
}
if((isset($_GET['kill'])) AND ($_GET['kill'] == 1)) {
session_destroy();
header('Location: index.php');
}
?>