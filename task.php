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


<table class='tasktable'>
<tr>
<td>Ticket ID: <b></td>
<td>Created by: <b></td>
<td>Priority:</td>
<td>Location:</td>
<td>Known_problem</td>
<td>Description</td>
<td>Handle before</td>
<td>Handle before</td>
<?php
$result = mysql_query("SELECT * FROM tickets WHERE status='open'", $dbcon);
	while($row = mysql_fetch_array($result)){
?>		
	
	
			
	
	<br>
			
	<tr>
	<td><?php echo $row['ticket_id'];?></td>
			
			
				<td><?php echo $row['user'];?></td>
			
				<td><?php echo $row$row['priority'];?></td>
			
				<td><?php echo $row['location'];?></td>
			
			
			
				
			
				<td><?php echo $row['known_problems'];?></td>
			
				<td><?php echo $row['description'];?></td>
		
				<td><?php echo $row['handle_before'];?></td>
			
				
		
				<td align="center"><a href="update.php?id=<?php echo $rows['ticket_id']; ?>">update</a></td>
</tr>
			
			
			
}
</table>



 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>

</html>
