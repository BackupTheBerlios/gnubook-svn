<?php
session_start();
include("config.php");
dbconnect();
$count = mysql_query("SELECT COUNT(*) FROM `radio_embeds`");
$count = mysql_fetch_assoc($count);
$count = $count['COUNT(*)'];
$rand=rand(1,$count);
$req = "SELECT *  FROM `radio_embeds` WHERE `id` = $rand";
$rep = mysql_query($req);
echo(mysql_error());
$data = mysql_fetch_assoc($rep);
$duration = $data['duration'];
$embed = $data['embed'];

?>

<html>
<head>
<meta HTTP-EQUIV="Refresh" content="<?php echo($duration); ?>" />
</head>
<body>
<?php echo($embed); ?>
</body></html>