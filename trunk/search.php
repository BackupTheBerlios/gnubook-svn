<?php
session_start();
if((isset($_SESSION['login'])) AND (empty($_POST['search']))) {
?>
<form action="search.php" method="POST">
<p>Nom: <input type="text" name="search" value="" /><input type="submit" name="" value="Chercher" /></p></form>
<?php
}
elseif((isset($_SESSION['login'])) AND (!empty($_POST['search']))) {
$search = $_POST['search'];
include("config.php");
dbconnect();
$req = mysql_query("SELECT *  FROM `gb_search` WHERE `name` LIKE '".$search."'");
mysql_close();
echo("<ul>");
while($data = mysql_fetch_array($req)) {
?>
<li><?php echo($data['name']); ?> <a href="profile.php?id=<?php echo($data['id']); ?>">Profil</a></li>
<?php
}
}
?>