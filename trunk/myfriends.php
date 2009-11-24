<?php session_start(); ?>
<p>Mes amis</p>
<ul>
<?php
$name = $_SESSION['login'];
include("config.php");
dbconnect();
$req = mysql_query("SELECT * FROM `gb_".$name."_friends`");
while($data = mysql_fetch_array($req)) {
?>

<li><?php echo($data['name']); ?>  <a href="profile.php?id=<?php echo($data['friendid']); ?>">Profil</a>
<?php
if($data['status'] == 0) {
?>
En attente de validation
<?php
}
echo("</li>");
}
?>
</ul>