<?php
$password = "140395";
if(!isset($_POST['pass'])) {
?>
<form action="admin.php" method="POST">
<p>Mot de passe: <input type="password" name="pass" value="" /></p><p><input type="submit" name="" value="OK" /></p></form>
<?php
}
elseif($_POST['pass'] == $password) {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Administration de GNURadio</title>
<?php
}
else {
echo("Erreur!");
}
?>