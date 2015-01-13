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
<link rel='stylesheet' href='teststyle.css' />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<style>
	
	/* 
	Max width before this PARTICULAR table gets nasty
	This query will take effect for any screen smaller than 760px
	and also iPads specifically.
	*/
	@media 
	only screen and (max-width: 760px),
	(min-device-width: 768px) and (max-device-width: 1024px)  {
	
		/* Force table to not be like tables anymore */
		.tasktable, thead, tbody, th, td, tr { 
			display: block; 
		}
		
		/* Hide table headers (but not display: none;, for accessibility) */
		thead tr { 
			position: absolute;
			top: -9999px;
			left: -9999px;
		}
		
		tr { border: 1px solid #ccc; }
		
		td { 
			/* Behave  like a "row" */
			border: none;
			border-bottom: 1px solid #eee; 
			position: relative;
			padding-left: 50%; 
		}
		
		td:before { 
			/* Now like a table header */
			position: absolute;
			/* Top/left values mimic padding */
			top: 6px;
			left: 6px;
			width: 45%; 
			padding-right: 10px; 
			white-space: nowrap;
		}
		
		/*
		Label the data
		*/
		td:nth-of-type(1):before { content: "Ticket ID"; }
		td:nth-of-type(2):before { content: "Created By"; }
		td:nth-of-type(3):before { content: "Priority"; }
		td:nth-of-type(4):before { content: "Location"; }
		td:nth-of-type(5):before { content: "Status"; }
		td:nth-of-type(6):before { content: "Description"; }
		td:nth-of-type(7):before { content: "Handle before"; }
		td:nth-of-type(8):before { content: "Details"; }
		
	}
	
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
			width: ; 
		}
	}
	
	</style>

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
		<th>Ticket ID </th>
		<td data-title="Ticket ID"><?php echo $row['id']; ?></td>
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
		</tr>
		<tr>
		<th>Created on:</th>
		<td data-title="Created on:"><?php echo $row['date']; ?></td>
		</tr>
		<tr>
		<th>Created by:</th>
		<td data-title="Created by:"><?php echo $row['user']; ?></td>
		</tr>
		<tr>
		<th>Handle before:</th>
		<td data-title="Handle before:"><?php echo $row['handle_before']; ?></td>
		</tr>
		<tr>
		<th>Status:</th>
		<td data-title="Status:">
		<select name="status">
		<option value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option>
		<option value="open">Open</option>
		<option value="pending">Pending</option>
		<option value="closed">Closed</option>
		</select>
		</td>
		</tr>
		<tr>
		<th>Priority:</th>
		<td data-title="Priority:">
		<select name="priority">
		<option value="<?php echo $row['priority']; ?>"><?php echo $row['priority']; ?></option>
		<option value="High">High</option>
		<option value="Medium">Medium</option>
		<option value="Low">Low</option>
		</select>
		</td>
		</tr>
		<tr>
		<th>Room type:</th>
		<td data-title="Room type:"><?php echo $row['room_type']; ?></td>
		</tr>
		<tr>
		<th>Known Problem:</th>
		<td data-title="Known Problem:"><?php echo $row['known_problems']; ?></td>
		</tr>
		<tr>
		<th>Description:</th>
		<td data-title="Description:"><textarea  name="description" maxlength="1000" cols="25" rows="6" style="margin: 0px; width: 100%; height: 256px;"><?php echo $row['description']; ?></textarea></td>
		</tr>
		<tr>
		<th>Image:</th>
		<td data-title="Image:">
		
		<img src="data:image/jpeg;base64,<?php echo base64_encode($row['room_map']); ?>" class="img-responsive" width="400" height="400" />
		

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
