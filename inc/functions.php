<?php require_once("connection.php"); ?>
<?php

function bored_query($connection) {
		$result = (mysql_query("SELECT * FROM boreds", $connection));
       
	  if (!$result) {
	    die("Database query failed:" . mysql_error());
	    }

	return $result;
} 
?>