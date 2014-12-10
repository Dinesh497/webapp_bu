<?php
include ('connection.php');

$result = mysql_query("SELECT * FROM tickets WHERE status='open'", $dbcon);
	while($row = mysql_fetch_array($result)){
	
}
?>