<?php
	//include 'problem.php';
	session_start(); // Starting Session	
	require ("connection.php");
	

	
	$ticket = mysql_real_escape_string $_POST['ticket'];
	$date = mysql_real_escape_string $_POST['date'];
	$user = mysql_real_escape_string $_SESSION['gebruiker'];
	$status = mysql_real_escape_string $_POST['status'];
	$priority = mysql_real_escape_string $_POST['priority'];
	$location = mysql_real_escape_string $_POST['location'];
	$room = mysql_real_escape_string $_POST['room'];
	$KP = mysql_real_escape_string $_POST['known'];
	$description = mysql_real_escape_string $_POST['description'];
	$handledate = mysql_real_escape_string $_POST['hdate'];
	$imgName = mysql_real_escape_string($_FILES["image"]["name"]);
	$imgData = mysql_real_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
	$imgtype = mysql_real_escape_string($_FILES["image"]["type"]);

	
	
	// room map moet er nog bij
	$sSQL = 'INSERT INTO tickets1 (ticket_id, user, status, priority, location, room_type, known_problems, description, handle_before, date, room_map)
	VALUES (\'' . $ticket .'\', \'' . $user .'\', \'' . $status .'\', \'' . $priority .'\', \'' . $location .'\', \'' . $room .'\', \'' . $KP .'\', \'' . $description .'\',\'' . $handledate .'\', \'' . $date .'\',\'' . $imgData .'\')';
					
@mysql_query($sSQL);
	if(!mysql_error()){
		echo '<br><br><br>Ticket has been created. Redirecting...';
		header("refresh:5; url=location.php");
		}
	else
		{
		die('Error: ' . mysql_error()); 
		}

$conn->close();					
?>