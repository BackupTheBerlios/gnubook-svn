<?php
session_start();
if((empty($_SESSION['login'])) AND (empty($_POST['ok']))) {

?>
<h1>Inscription</h1>
<form action="signup.php" method="POST">
<p>Login: <input type="text" name="login" value="" /></p>
<p>Mot de passe: <input type="password" name="password" value="" /></p>
<p>Confirmer le mot de passe: <input type="password" name="passwordverif" value="" /></p>
<p>Nom Complet: <input type="text" name="name"></p>
<p>Je suis 
<select name="type">
<option value="x">un homme</option>
<option value="y">une femme</option>
</select></p>
<p>Adresse e-mail: <input type="text" name="mail" value="" /></p> 
<p>Date de naissance: 
<select name="day">
<?php
$i = 0;
while($i!=31) {
$i = $i +1;
?>
<option value="<?php echo($i); ?>"><?php echo($i); ?></option>
<?php
}
?>
</select>
<select name="month">
<?php
$i = 0;
while($i!=12) {
$i = $i +1;
?>
<option value="<?php echo($i); ?>"><?php echo($i); ?></option>
<?php
}
?>
</select>
<select name="year">
<?php
$i = 2010;
while($i!=1920) {
$i = $i - 1;
?>
<option value="<?php echo($i); ?>"><?php echo($i); ?></option>
<?php
}
?>
</select></p>
<input type="submit" name="ok" value="OK" />
</form>
<?php
}
else {
$login = addslashes($_POST['login']);
$password = md5($_POST['password']);
$passwordverif = md5($_POST['passwordverif']);
$name = addslashes($_POST['name']);
$mail = addslashes($_POST['mail']);
$type = addslashes($_POST['type']);
$day = addslashes($_POST['day']);
$month = addslashes($_POST['month']);
$year = addslashes($_POST['year']);
}

if((!empty($_POST['ok'])) AND((empty($login)) OR (empty($password)) OR (empty($passwordverif)) OR (empty($name)) OR (empty($mail)) OR (empty($type)) OR (empty($day)) OR (empty($month)) OR (empty($year)))) {
?>
<h1>Erreur</h1>
<p>Veuillez vérifier que vous avez rempli tous les champs</p>
<?php
}
elseif((!empty($_POST['ok'])) AND ($password != $passwordverif)) {
?>
<h1>Erreur</h1>
<p>Les mots de passe ne concordent pas</p>
<?php
}
elseif((isset($password)) AND (strlen($password)<6)) {
?>
<h1>Erreur</h1>
<p>Le mot de passe n'est pas sûr</p>
<?php
}
else {
if(isset($login)) {
include("config.php");
dbconnect();
$req = mysql_query("SELECT *  FROM `gb_users` WHERE `login` = '$login'");
echo(mysql_error());
$data = mysql_fetch_assoc($req);
if(empty($data['login'])) {
$req = "INSERT INTO `gb_users` (`id`, `login`, `password`, `name`, `mail`, `type`, `day`, `month`, `year`) VALUES (NULL, '$login', '$password', '$name', '$mail', '$type', '$day', '$month', '$year');";
mysql_query($req);
$req = "CREATE TABLE `gb_".$login."_wire` (`id` INT NOT NULL AUTO_INCREMENT, `text` TEXT NOT NULL, `user` text NOT NULL, PRIMARY KEY (`id`)) ENGINE = MyISAM;";
mysql_query($req);
mysql_query("CREATE TABLE `gb_".$login."_comments` (`id` INT NOT NULL AUTO_INCREMENT, `wireid` INT NOT NULL, `date` TIMESTAMP NOT NULL, `pseudo` TEXT NOT NULL, `text` TEXT NOT NULL, PRIMARY KEY (`id`)) ENGINE = MyISAM;");
mysql_query("CREATE TABLE `gb_".$login."_friends` (`id` INT NOT NULL AUTO_INCREMENT, `friendid` INT NOT NULL, `status` INT NOT NULL, PRIMARY KEY (`id`)) ENGINE = MyISAM;");
mysql_query("INSERT INTO `gb_search` (`id`, `name`) VALUES (NULL, '".$name."');");
echo(mysql_error());
mysql_close();
echo("OK");
}
else {
echo("Login déjà pris");
}
}
}
?>