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
<link type="text/css" media="screen" rel="stylesheet" href="responsive-tables.css" />
<script type="text/javascript" src="responsive-tables.js"></script>

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
<form action="task.php" method="POST">
<table class ='searchtable'>
<tr>
<td>
<select name="input">
	<option value=""></option>
	<option value="Open">Open</option>
	<option value="Pending">Pending</option>
	<option value="Closed">Closed</option>
</select>

<td><button input type="submit" class="pure-button pure-button-primary">Search status</button></td>
</tr>
</table>
</form>

<?php
$input = $_POST['input'];
echo "<table class='tasktable'>";
echo "<form>";
echo "<tr>";
echo "<td>Ticket ID: <b></td>";
echo "<td>Created by: <b></td>";
echo "<td>Priority:</td>";
echo "<td>Location:</td>";
echo "<td>status</td>";
echo "<td>Description</td>";
echo "<td>Handle before</td>";
echo "<td>Edit</td>";

$result = mysql_query("SELECT * FROM tickets1 WHERE status='$input'", $dbcon);
	while($row = mysql_fetch_array($result)){
		
		
		echo "<br>";
		echo "<tr>";
		echo "<td> " . $row['id'] . "</td>";
		echo "<td> " . $row['user'] . "</td>";
		echo "<td> " . $row['priority'] . "</td>";
		echo "<td>" . $row['location'] . "</td>";
		echo "<td>" . $row['status'] . "</td>";
		echo "<td> " . $row['description'] . "</td>";	
		echo "<td>" . $row['handle_before'] . "</td>";
		echo "<td>" . "<a href='ticket.php?ticket=" . $row['id'] . "'>More Information</a>" . "</td>"; 
	
		echo "</tr>";
	
		echo "</form>";
	}
echo "</table>";//tabel sluiten
?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>

</html>
