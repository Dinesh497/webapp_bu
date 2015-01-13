<?php
	session_start(); // Starting Session	
	require ("connection.php");

	
	$id = $_POST['id'];
	$status = $_POST['status'];
	$priority = $_POST['priority'];
	$description = $_POST['description'];

	
	
	// room map moet er nog bij
	$sSQL ="UPDATE `tickets1` SET status='$status', priority='$priority', description='$description' WHERE id='$id'";
					
@mysql_query($sSQL);
	if(!mysql_error())
						{
						
							echo '<br><br><br>Ticket is updated.';
							header("refresh:5; url=location.php");
						
						}
						else
						{
							die('Error: ' . mysql_error()); 
							
						}

$conn->close();					
?>