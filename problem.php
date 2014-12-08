<!doctype html>
<?php
include ("session.php");
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
<form name="session"  action="logout.php" method="POST">
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


<form name="form1"  action="submit.php" method="POST">
	
	<table class='table'  >
	<tr>
	
	</tr>

	<tr>
	<td>User</td>
	<td width="6">:</td>
	<td width="320"><?php echo $_SESSION['gebruiker']; ?></td>
	</tr>
	<tr>
	<td>status</td>
	<td>:</td>
	<select name="status">
	<option value="Open">Open</option>
	<option value="Pending">Pending</option>
	<option value="Closed">Closed</option>
	</select>
	</tr>
	<tr>
	<td>Priority</td>
	<td>:</td>
	<td>
	<select name="Priority">
	<option value="High">High</option>
	<option value="Medium">Medium</option>
	<option value="Low">Low</option>
	</select>
	</td>
	</tr>
	<tr>

	
	<td valign="top">
	<label for="comments">Description</label>
	</td>
	<td valign="top">
	<textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
	</td>
	</tr>
	<td><button input type="submit" class="pure-button pure-button-primary">Submit</button></td>
	</table>
	
</form>
</tr>










 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


</body>
<div id="footer">
To be or not to be, that is the question
</div>
</html>