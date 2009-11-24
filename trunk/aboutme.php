<?php
session_start();
if((isset($_SESSION['login'])) AND (isset($_POST['about']))) {
include("config.php");
dbconnect();
$about = $_POST['about'];
$login = $_SESSION['login'];
$req = "UPDATE `gb_users` SET `about` = '".$about."' WHERE `gb_users`.`login` = '".$login."' LIMIT 1;";
mysql_query($req);
$error = mysql_error();
if(empty($error)) {
echo("OK");
}
else {
echo("Erreur");
echo($error);
}
}
elseif(isset($_SESSION['login'])) {
include("config.php");
dbconnect();
$login = $_SESSION['login'];
$req = "SELECT *  FROM `gb_users` WHERE `login` = '".$login."'";
$rep = mysql_query($req);
$data = mysql_fetch_assoc($rep); 
?>
<form action="aboutme.php" method="POST">
<p>A propos: <input type="text" name="about" value="<?php echo($data['about']); ?>" /></p>
<input type="submit" name="" value="OK" />
</form>
<?php
}
?>