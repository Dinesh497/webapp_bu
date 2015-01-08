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

<form name="submitform"  action="test.php" method="POST">
<?php
$result = mysql_query("SELECT * FROM tickets WHERE id=$ticket", $dbcon);
	while($row = mysql_fetch_array($result)){
		?>
		
	
		<table class='submittable'>
		<tr>
		<td>Ticket ID :</td>
		<td><?php echo $row['id']; ?></td>
		</tr>
		<tr>
		<td>Created on :</td>
		<td><?php echo $row['date']; ?></td>
		</tr>
		<tr>
		<td>Created by :</td>
		<td><?php echo $row['user']; ?></td>
		</tr>
		<tr>
		<td>status :</td>
		<td>
		<select name="status">
		<option value="<?php echo $row['user']; ?>"><?php echo $row['user']; ?></option>
		<option value="open">Open</option>
		<option value="pending">Pending</option>
		<option value="closed">Closed</option>
		</select>
		</tr>

		
		<td><?php echo $row['id']; ?> </td>
	

		<?php
		
		
	}
?>
<td><button input type="submit" class="pure-button pure-button-primary">Submit</button></td>
</table>
</form>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>

</html>
