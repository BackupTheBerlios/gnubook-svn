<?php
session_start();
if(isset($_SESSION['login'])) {
include("config.php");
dbconnect();
$id = $_GET['id'];
$_SESSION['lastid'] = $id;
$login = $_SESSION['login'];
$req = mysql_query("SELECT *  FROM `gb_users` WHERE `id` = '$id'");
mysql_close();
$data = mysql_fetch_assoc($req);
$_SESSION['lastname'] = $data['login'];
if($data['type'] == "x") {
$type = "masculin";
}
else {
$type = "féminin";
}
$birthday = $data['day']."/".$data['month']."/".$data['year'];
?>
<h1>GNUBook</h1>
<div>
<h2><?php echo($data['name']); ?></h2>
<h3>Informations</h3>
<p>Genre : <?php echo($type); ?></p>
<p>Né le : <?php echo($birthday); ?></p>
<p>Mail: <?php echo($data['mail']); ?></p>
<?php
if(!empty($data['about'])) {
?>
<p>A propos de moi: <?php echo($data['about']) ?></p>
<?php
}
?>
<?php
if($_SESSION['login'] == $data['login']) {
$me = 1;
?>
<p><a href="aboutme.php">Ajouter/Modifier à propos de moi</a></p>
<?php
}
?>
</div>
<?php
dbconnect();
$reqami = mysql_query("SELECT *  FROM `gb_hugo_friends` WHERE `friendid` = ".$id);
mysql_close();
$repami = mysql_fetch_assoc($reqami);
$isami = $repami['friendid'];
if($id == $isami) { 
?>
<div>
<form action="publish.php" method="POST">
<p>Publier: <input type="text" name="text" value="" /></p>
<input type="submit" name="" value="Envoyer" />
</form>
</div>
<div>
<ul>
<?php
dbconnect();
$req = "SELECT * FROM `gb_".$data['login']."_wire` ORDER BY 'id' DESC";
$rep = mysql_query($req);

while($message = mysql_fetch_array($rep)) {
echo("<li>De ".$message['user'].": ".$message['text']);
if((isset($me)) OR ($message['user'] == $_SESSION['login'])) {
echo('  <a href="delpub.php?id='.$message['id'].'">Supprimer</a>');
}
echo("</li>");
echo("<ul>");
$req = "SELECT *  FROM `gb_".$data['login']."_comments` WHERE `wireid` = ".$message['id'];
$reponse = mysql_query($req);
echo(mysql_error());
while($comments = mysql_fetch_array($reponse)) {
echo("<li>Commentaire de ".$comments['pseudo'].": ");
echo($comments['text']);
}
?>
<li><form action="pubcom.php" method="POST"><p>Commenter: <input type="text" name="comment" /></p><input type="hidden" name="msgid" value="<?php echo($message['id']); ?>"><p><input type="submit" name="" value="Envoi" /></p></form></li></ul>
<?php
}
?>
</ul>
</div>

<?php
}

else {
?>
<a href="friend.php?id="<?php echo($id); ?>">Devenir ami</a>
<?php
}
}
?>