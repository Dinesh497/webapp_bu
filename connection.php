<?php	
	$dbcon = mysql_connect("localhost", "Beheerder", "P@ssw0rd") or die ("could not connect to database");
	$selectdb = mysql_select_db("webdb", $dbcon);
?>