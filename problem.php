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
<link rel="stylesheet" media="(max-width: 400px)" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="jquery.ui.datepicker.mobile.css" /> 
  <script src="jQuery.ui.datepicker.js"></script>
  <script>
  //reset type=date inputs to text
  $( document ).bind( "mobileinit", function(){
    $.mobile.page.prototype.options.degradeInputs.date = true;
  });	
  </script>
  <script src="jquery.ui.datepicker.mobile.js"></script>
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

<form name="getroommap" action="problem.php" method="POST">
	<table class='submittable'  >
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
	</table>
</form>


<form name="submitform"  action="submit.php" method="POST">
	
	<table class='submittable'  >
	<tr>
	
	</tr>
	<tr>
	<td>Date :</td>
	<td><script>
	var tD = new Date();
	var datestr = tD.getDate() + "/" + (tD.getMonth()+ 1) + "/" + tD.getFullYear();
	document.write("<input type='text' name='date' value='"+datestr+"'>");
	</script></td>
	</tr>
	<tr>
	<td>User :</td>
	<td><?php echo $_SESSION['gebruiker']; ?></td>
	</tr>
	<tr>
	<td>status :</td>
	<td>
	<select name="status">
	<option value=""></option>
	<option value="Open">Open</option>
	<option value="Pending">Pending</option>
	<option value="Closed">Closed</option>
	</select>
	</td>
	</tr>
	<tr>
	<td>Priority :</td>
	<td>
	<select name="priority">
	<option value=""></option>
	<option value="High">High</option>
	<option value="Medium">Medium</option>
	<option value="Low">Low</option>
	</select>
	</td>
	</tr>
	<tr>
	<td>Room type :</td>
	<td><select name="room" type="text">
		
	<option value="<?php $row['room_type']; ?>"><?php $row['room_type']; ?></option>
		<?php

		$room_id = $_POST['location'];
		$room_type = mysql_query("SELECT room_type FROM rooms Where room_id=$room_id", $dbcon) or die (mysql_error());
		
		if($row = mysql_fetch_array($room_type)){
			echo "<option value=" . $row['room_type'] . ">" . $row['room_type'] . "</option>";
		}
		else{

			echo "<option value="Large-Double">Large-Double</option>";
			echo "<option value="XL-Double">XL-Double</option>";
			echo "<option value="SYNDICAT">Syndicat</option>";
			echo "<option value="Large-Twin">Large-Twin</option>";
			echo "<option value="Royal-Suite">Royal-Suite</option>";
			echo "<option value="INV-STE">INV-STE</option>";
		}

		?>
	</select>
	</td>
	</tr>
	<tr>
	<td>Known Problems :</td>
	<td>
	<select name="known">
	<option value=""></option>
	<option value="lamp">Lamp</option>
	<option value="mini-bar">minibar</option>
	<option value="remote control">Remote control</option>
	<option value="Television">Television</option>
	<option value="sink">Sink</option>
	<option value="shower">Shower</option>
	<option value="bathtub">Bathtub</option>
	<option value="window">Window</option>
	<option value="chair/couch">Chair/couch</option>
	</select>
	</tr>
	<tr>
	<td>
	Description:
	</td>
	<td>
	<textarea  name="description" maxlength="1000" cols="25" rows="6"></textarea>
	</td>
	</tr>
	<tr>
	<td>Handle before :</td>
	<td><input type="date" name="hdate" value=""  /></td>
	</tr>
	<tr>
	<td>Room map</td>
	<td><name="map" type="file" >
	<?php
	//$room_id = $_POST['location'];
	$sessionroom = $room_id; 
	$sessionroom = $_SESSION['room_id'];

	$result = mysql_query("SELECT room_map FROM rooms WHERE room_id=$room_id", $dbcon);
	if ($row = mysql_fetch_array($result)){

		$imgData = base64_encode($row['room_map']);
		//echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['imageContent'] ) . '" />';

		echo'<img src="data:image/jpeg;base64,' . $imgData . '" />';
		

		//echo'<img src="data:image/jpeg;base64,' . $_SESSION['map'] . '" />';
		//echo "Choose a room at the category location above.";
		//$imgData =addslashes (file_get_contents($_FILES[$row]));

		}
		else{
			echo "Choose a room at the category location above.";
		}

		//$imgData =addslashes(file_get_contents($_FILES[$row['room_map']]));
		
	?></td>
	</tr>

	
	<td><button input type="submit" class="pure-button pure-button-primary">Submit</button></td>
	</table>
	
</form>
</tr>


 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


</body>

</html>