<?php
	//include 'problem.php';
	session_start(); // Starting Session	
	require ("connection.php");
	

	
	$ticket = $_POST['ticket'];
	$date = $_POST['date'];
	$user = $_SESSION['gebruiker'];
	$status = $_POST['status'];
	$priority = $_POST['priority'];
	$location = $_POST['location'];
	$room = $_POST['room'];
	$KP = $_POST['known'];
	$description = $_POST['description'];
	$handledate = $_POST['hdate'];
	//$map = addslashes(file_get_contents($_FILES[$row['room_map']]);
	$imgName = mysql_real_escape_string($_FILES["map"]["name"]);
	$imgData = mysql_real_escape_string(file_get_contents($_FILES["map"]["tmp_name"]));
	echo $imgData;

	
	
	// room map moet er nog bij
	$sSQL = 'INSERT INTO tickets1 (ticket_id, user, status, priority, location, room_type, known_problems, description, handle_before, date, room_map)
	VALUES (\'' . $ticket .'\', \'' . $user .'\', \'' . $status .'\', \'' . $priority .'\', \'' . $location .'\', \'' . $room .'\', \'' . $KP .'\', \'' . $description .'\',\'' . $handledate .'\', \'' . $date .'\',\'' . $map .'\')';
					
@mysql_query($sSQL);
	if(!mysql_error())
						{
						echo $imgData;
							echo '<br><br><br>You are now registerd.';
							//echo '<img src="data:image/jpeg;base64,' . base64_encode($map) . '" />';
							//echo $map;
							//$result = mysql_query("SELECT room_map FROM tickets1 WHERE id='23'", $dbcon);
							//$row = mysql_fetch_array($result);

							//$imgData = $row['room_map'];
							//echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['imageContent'] ) . '" />';

							//echo'<img src="data:image/jpeg;base64,' . $map . '" />';
						}
						else
						{
							die('Error: ' . mysql_error()); 
							
						}

$conn->close();					
?>