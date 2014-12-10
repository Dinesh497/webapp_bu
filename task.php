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
echo "<table class='tasktable'>";
echo "<tr>";
echo "<td>Ticket ID: <b></td>";
echo "<td>Created by: <b></td>";
echo "<td>Priority:</td>";
echo "<td>Location:</td>";
echo "<td>Known_problem</td>";
echo "<td>Description</td>";
echo "<td>Handle before</td>";
 

$result = mysql_query("SELECT * FROM tickets WHERE status='open'", $dbcon);
	while($row = mysql_fetch_array($result)){
		
	
	
	
	
			echo "<br>";
			
			echo "<tr>";
				echo "<td> " . $row['ticket_id'] . "</td>";
			
			
				echo "<td> " . $row['user'] . "</td>";
			
				echo "<td> " . $row['priority'] . "</td>";
			
				echo "<td>" . $row['location'] . "</td>";
			
			
			
				
			
				echo "<td>" . $row['known_problems'] . "</td>";
			
				echo "<td> " . $row['description'] . "</td>";
		
				echo "<td>" . $row['handle_before'] . "</td>";
			
			
		
				
			echo "</tr>";	
			
			
}
echo "</table>";//tabel sluiten
?>



 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>

</html>
