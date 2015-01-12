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
<link rel='stylesheet' href='teststyle.css' />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<style>
	
	/* 
	Max width before this PARTICULAR table gets nasty
	This query will take effect for any screen smaller than 760px
	and also iPads specifically.
	*/
	
	
		
	
	/* Smartphones (portrait and landscape) ----------- */
	@media only screen
	and (min-device-width : 320px)
	and (max-device-width : 480px) {
		body { 
			padding: 0; 
			margin: 0; 
			width: 320px; }
		}
	
	/* iPads (portrait and landscape) ----------- */
	@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
		body { 
			width: 495px; 
		}
	}
	
	</style>
<body>



 

<tr>
<form name="form1"  action="logout.php" method="POST">
	<td>
	<div class='logout' >
		<tr>
		<td><?php echo $_SESSION['gebruiker']; ?> is logged in!</td>
		<tr>
		<br>
		
		<td><button input type="submit" class="pure-button pure-button-primary">Logout</button></td>

		</tr>
	</div>
	</td>
</form>
</tr>
<form action="task.php" method="POST">
<div class ='searchtable'>
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
</div>
</form>


<table class='tasktable'>

<form>
<thead>
<tr>
<th>Ticket ID</th>
<th>Created by</th>
<th>Priority</th>
<th>Location</th>
<th>Status</th>
<th>Description</th>
<th>Handle before</th>
<th>Edit</th>
</tr>
</thead>
<?php
$input = $_POST['input'];
$result = mysql_query("SELECT * FROM tickets1 WHERE status='$input'", $dbcon);
	while($row = mysql_fetch_array($result)){
		?>
		<tbody>
		
		<tr>
		<td data-title="Ticket ID"><?php echo $row['id']; ?></td>
		<td data-title="Created by"> <?php echo $row['user']; ?> </td>
		<td data-title="Priority"> <?php echo $row['priority']; ?></td>
		<td data-title="Location"> <?php echo $row['location']; ?> </td>
		<td data-title="Status"> <?php echo $row['status']; ?></td>
		<td data-title="Description"> <?php echo $row['description']; ?></td>	
		<td data-title="Handle before"> <?php echo $row['handle_before']; ?></td>
		<td data-title="edit"> <a href='ticket.php?ticket="<?php echo $row['id']; ?>"'>More Information</a></td>
	
		</tr>
		</tbody>
		</form>
		
		<?php
	}
echo "</table>";//tabel sluiten
?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>

</html>
