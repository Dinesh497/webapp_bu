<?php
	session_start(); // Starting Session	
	require ("connection.php");

	

	$status = $_POST['status'];
	$priority = $_POST['priority'];
	$description = $_POST['description'];

	
	
	// room map moet er nog bij
	$sSQL = 'INSERT INTO tickets (status, priority, description) 
	VALUES (\'' . $status .'\', \'' . $priority .'\', \'' . $description .'\')';
					
@mysql_query($sSQL);
	if(!mysql_error())
						{
						
							echo '<br><br><br>Ticket is updated.';
							
						}
						else
						{
							die('Error: ' . mysql_error()); 
							
						}

$conn->close();					
?>