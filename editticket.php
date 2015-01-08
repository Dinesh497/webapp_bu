<?php
	session_start(); // Starting Session	
	require ("connection.php");

	
	$ticket = $_POST['ticket'];
	$date = $_POST['date'];
	$user = $_SESSION['gebruiker'];
	$status = $_POST['status'];
	$priority = $_POST['priority'];
	$location = $_SESSION['room_id'];
	$room = $_POST['room'];
	$KP = $_POST['known'];
	$description = $_POST['description'];
	$handledate = $_POST['hdate'];
	
	
	// room map moet er nog bij
	$sSQL = 'INSERT INTO tickets (ticket_id, user, status, priority, location, room_type, known_problems, description, handle_before, date) 
	VALUES (\'' . $ticket .'\', \'' . $user .'\', \'' . $status .'\', \'' . $priority .'\', \'' . $location .'\', \'' . $room .'\', \'' . $KP .'\', \'' . $description .'\',\'' . $handledate .'\', \'' . $date .'\')';
					
@mysql_query($sSQL);
	if(!mysql_error())
						{
						
							echo '<br><br><br>You are now registerd.';
							
						}
						else
						{
							die('Error: ' . mysql_error()); 
							
						}

$conn->close();					
?>