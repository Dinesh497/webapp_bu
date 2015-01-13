<!doctype html>
<?php
include ("session.php");
include ("nav.php");

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
<!--<form name="form1"  action="logout.php" method="POST">
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
</tr>-->

<form name="submitform"  action="editticket.php" method="POST">
<?php
$result = mysql_query("SELECT * FROM tickets1 WHERE id=$ticket", $dbcon);
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
	
		?>
		
	
		<table class='submittable'>
		<tr>
		<td>Ticket ID :</td>
		<td><?php echo $row['id']; ?></td>
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
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
		<td>Handle before :</td>
		<td><?php echo $row['handle_before']; ?></td>
		</tr>
		<tr>
		<td>Status :</td>
		<td>
		<select name="status">
		<option value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option>
		<option value="open">Open</option>
		<option value="pending">Pending</option>
		<option value="closed">Closed</option>
		</select>
		</td>
		</tr>
		<tr>
		<td>Priority :</td>
		<td>
		<select name="priority">
		<option value="<?php echo $row['priority']; ?>"><?php echo $row['priority']; ?></option>
		<option value="High">High</option>
		<option value="Medium">Medium</option>
		<option value="Low">Low</option>
		</select>
		</td>
		</tr>
		<tr>
		<td>Room type :</td>
		<td><?php echo $row['room_type']; ?></td>
		</tr>
		<tr>
		<td>Known Problem :</td>
		<td><?php echo $row['known_problems']; ?></td>
		</tr>
		<tr>
		<td>Description :</td>
		<td><textarea  name="description" maxlength="1000" cols="25" rows="6"><?php echo $row['description']; ?></textarea></td>
		</tr>
		<tr>
		<td>Room Map :</td>
		<td>
		<?php
		$map = $row['id'];
		?>
		<img src="data:image/jpeg;base64,'<?php echo $map?>'"/>
		
			<!--	//$imgData = base64_encode($row['room_map']);
				//$imgData = $row['room_map'];

				//echo '<img src="data:image/jpeg;base64,' . $imgData . '" />';
				//echo '<img src="data:image/jpeg;base64,' . base64_encode($row['room_map']) . '" />';

				//header("content-type: image/jpeg");
				//echo $imgData;
			-->
		</td>
		</tr>

		
		
	

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
