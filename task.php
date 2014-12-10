<!doctype html>
<?php
include ("session.php");
include ('connection.php');
	if( ! isset($_SESSION['gebruiker'])){
		header('Location:index.php');
		exit;
	}


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
		<tr>
		
		<td><button input type="submit" class="pure-button pure-button-primary">Logout</button></td>

		</tr>
	</table>
	</td>
</form>
</tr>
<?php

$result = mysql_query("SELECT * FROM tickets WHERE status='open'", $dbcon);
	while($row = mysql_fetch_array($result)){
		
	echo "<table border='0' bgcolor=#F2F2F2>";
	
	
	
			echo "<br>";
			echo "<tr>";	
			echo "<tr>";
				echo "<td><input name="ticket" type="text">Ticket ID: <b> " . $row['ticket_id'] . "</td>";
			echo "<tr>";
			echo "<tr>";
				echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Created by: <b> " . $row['user'] . "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Priority:<b> " . $row['priority'] . "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Location:<b> " . $row['location'] . "</td>";
			echo "</tr>";
			
			echo "<tr>";
				echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Room Type:<b> " . $row['room_type'] . "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Known problem:<b> " . $row['known_problems'] . "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Description:<b> " . $row['description'] . "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Handle Before:<b> " . $row['handle_before'] . "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Created in:<b> " . $row['date'] . "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Room map:<b> " . $row['room_map'] . "</td>";
			echo "</tr>";	
			echo "</table>";//tabel sluiten
			echo"<br>";
}
?>



 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>

</html>
