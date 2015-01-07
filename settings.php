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
<tr>
	<td>Location :</td>
	<td><input name="location" type="text">
		<a href='problem.php?action=edit&id='>Get Map</a>
	</td>
</tr>
<tr>
	<td>Room map</td>
	<td><?php
$result = mysql_query("SELECT room_map FROM rooms WHERE room_id='0102'", $dbcon) or die (mysql_error());
$row = mysql_fetch_array($result);

//echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['imageContent'] ) . '" />';

echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['room_map'] ) . '" />';

?>
	</tr>

</body>

</html>