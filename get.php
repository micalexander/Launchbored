<?php require_once("inc/connection.php"); ?>
<?php
$id = addslashes($_REQUEST['id']);

$id=abs($_GET['id']);
$query = mysql_query("SELECT image FROM image WHERE id=$id");
$data=mysql_fetch_array($query);

header('Content-type: image/jpeg');
echo $data['image'];


?>
<?php require("inc/footer.php"); ?>