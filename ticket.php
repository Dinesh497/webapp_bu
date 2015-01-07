<!doctype html>
<?php
include ("session.php");
include ('connection.php');
	if( ! isset($_SESSION['gebruiker'])){
		header('Location:index.php');
		exit;
	}


$ticket = $_GET['ticket'];
?>
<title>Westcord Fashion Hotel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<link rel='stylesheet' href='style.css' />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">


<body>



 

<tr>
<form name="form1"  action="logout.php" method="POST">
	<td>
	<table class='logout' >
		<tr>
		<td><?php echo $_SESSION['gebruiker']; ?> is logged in!</td>
		<?php echo $ticket; ?>
		<tr>
		
		<td><button input type="submit" class="pure-button pure-button-primary">Logout</button></td>

		</tr>
	</table>
	</td>
</form>
</tr>
<?php

$result = mysql_query("SELECT * FROM tickets WHERE id=$ticket", $dbcon);
	while($row = mysql_fetch_array($result)){
		
	echo "<form name="submitform"  action="submit.php" method="POST">";
	
	echo "<table class='submittable'  >";
	echo "<tr>";
	
	echo "</tr>";
	echo "<tr>";
	echo "<td>Ticket ID :</td>";
	echo "<td> " . $row['id'] . "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Created on :</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Created by :</td>";
	echo "<td> " . $row['user'] . "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>status :</td>"
	echo "<td>";

	//</td>
	//</tr>
	//<tr>
	//<td>Priority :</td>
	//<td>
	//<select name="priority">
	//<option value=""></option>
	//<option value="High">High</option>
	//<option value="Medium">Medium</option>
	//<option value="Low">Low</option>
	//</select>
	//</td>
	//</tr>
	//<tr>
	//<td>Location :</td>
	//<td><select name="location"  type="text">
	//<option value=""></option>

	//</select>
	//<input type="submit" a href='problem.php?action=edit&id='>Get Map</a>
	//</td>
	//</tr>
	//<tr>
	//<td>Room type :</td>
	//<td><input name="room" type="text"></td>
	//</tr>
	//<tr>
	//<td>Known Problems :</td>
	//<td>
	//<select name="known">
	//<option value=""></option>
	//<option value="lamp">Lamp</option>
	//<option value="mini-bar">minibar</option>
	//<option value="remote control">Remote control</option>
	//<option value="Television">Television</option>
	//<option value="sink">Sink</option>
	//<option value="shower">Shower</option>
	//<option value="bathtub">Bathtub</option>
	//<option value="window">Window</option>
	//<option value="chair/couch">Chair/couch</option>
	//</select>
	//</tr>
	//<tr>
	//<td>
	//Description:
	//</td>
	//<td>
	//<textarea  name="description" maxlength="1000" cols="25" rows="6"></textarea>
	//</td>
	//</tr>
	//<tr>
	//<td>Handle before :</td>
	//<td><input type="date" name="hdate" value=""  /></td>
	//</tr>
	//<tr>
	//<td>Room map</td>
	//<td>
	//</tr>

	
	//<td><button input type="submit" class="pure-button pure-button-primary">Submit</button></td>
	//</table>
	
</form>
		echo "<br>";
		echo "<tr>";
		echo "<td> " . $row['id'] . "</td>";
		echo "<td> " . $row['user'] . "</td>";
		echo "<td> " . $row['priority'] . "</td>";
		echo "<td>" . $row['location'] . "</td>";
		echo "<td>" . $row['known_problems'] . "</td>";
		echo "<td> " . $row['description'] . "</td>";	
		echo "<td>" . $row['handle_before'] . "</td>";
		echo "<td>" . "<a href='ticket.php?ticket=" . $row['id'] . "'>More Information</a>" . "</td>"; 
	
		echo "</tr>";
	
		
	}

?>



 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>

</html>
