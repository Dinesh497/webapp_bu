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
<form name="submitform"  action="settings.php" method="POST">
</tr>

<tr>
	<td>Location :</td>
	<td><select name="location"  type="text">
		<option value=""></option>
		<?php 
		$rooms = mysql_query("SELECT room_id FROM rooms", $dbcon) or die (mysql_error());
		while($row = mysql_fetch_array($rooms)){

			echo "<option value=" . $row['room_id'] . ">" . $row['room_id'] . "</option>";
			}
		?>
	</select>
	<button input type="submit" class="pure-button pure-button-primary">Get Map</button>
	</td>
</tr>

<tr>
	<td>status :</td>
	<td>
	<select name="status">
	<option value=""></option>
	<?php 
	$rooms = mysql_query("SELECT room_id FROM rooms", $dbcon) or die (mysql_error());
	while($row = mysql_fetch_array($rooms)){

		echo "<option value=" . $row['room_id'] . ">" . $row['room_id'] . "</option>";
		}
	?>
	</select>
	</td>
</tr>

<tr>
	<td>Room map</td>
	<td>
	<?php
	$room_id = $_POST['location'];
	$result = mysql_query("SELECT room_map FROM rooms WHERE room_id=$room_id", $dbcon) or die (mysql_error());
	$row = mysql_fetch_array($result);

	//echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['imageContent'] ) . '" />';

	echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['room_map'] ) . '" />';

	
	$im = imagecreatefromjpeg($row['room_map']);

	echo '<img src="data:image/jpeg;base64,' . base64_encode($im) . '" />';

	$black = ImageColorAllocate($im, 255, 255, 255); 
	
	$start_x = 10; 
	$start_y = 20;

	$font = 'arial.ttf';

	Imagettftext($im, 12, 0, $start_x, $start_y, $black, $font, 'text to write'); 
	header('Content-Type: image/jpeg');
	Imagejpeg($im, '', 100); 

	ImageDestroy($im)

	?>
</tr>
	</form>

</body>

</html>