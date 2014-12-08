<?php
	session_start(); // Starting Session	
	require ("connection.php");
	$ticket = $_POST['ticket'];
	$date = $_POST['date'];
	$user = $_POST['username'];
	$status = $_POST['status'];
	$priority = $_POST['priority'];
	$location = $_POST['location'];
	$room = $_POST['room'];
	$KP = $_POST['Known problems'];
	$description = $_POST['description'];
	$handledate = $_POST['handle date'];
	
	
	// room map moet er nog bij
	$sSQL = 'INSERT INTO tickets (ticket_id, user, status, priority, location, room_type, known_problems, description, handle_before, date) 
VALUES (\'' . $ticket .'\', \'' . $user .'\', \'' . $status .'\', \'' . $priority .'\', \'' . $location .'\', \'' . $room .'\', \'' . $KP .'\', \'' . $description .'\',\'' . $handledate .'\', \'' . $date .'\')';
						 
?>