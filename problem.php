<!doctype html>
<?php
//include 'location.php';
include ("session.php");
	if( ! isset($_SESSION['gebruiker'])){
		header('Location:index.php');
		exit;
	}
	$room_id = $_POST['location'];
?>
<title>Westcord Fashion Hotel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<link rel='stylesheet' href='style.css' />
<link rel="stylesheet" media="(max-width: 400px)" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="jquery.ui.datepicker.mobile.css" /> 
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="css/navstyle.css" />
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
  <script src="jQuery.ui.datepicker.js"></script>
  <script>
  //reset type=date inputs to text
  $( document ).bind( "mobileinit", function(){
    $.mobile.page.prototype.options.degradeInputs.date = true;
  });	
  </script>
    <script>
    $(document).ready(function(){
        $("#nav-mobile").html($("#nav-main").html());
        $("#nav-trigger span").click(function(){
            if ($("nav#nav-mobile ul").hasClass("expanded")) {
                $("nav#nav-mobile ul.expanded").removeClass("expanded").slideUp(250);
                $(this).removeClass("open");
            } else {
                $("nav#nav-mobile ul").addClass("expanded").slideDown(250);
                $(this).addClass("open");
            }
        });
    });
</script>
  <script src="jquery.ui.datepicker.mobile.js"></script>
<body>
<div id="main">
    <div class="container1">
        <div id="nav-trigger">
            <span>Menu</span>
        </div>
        <nav id="nav-main">
            <ul>
                <li><a href="homepage.php">Home</a></li>
                <li><a href="location.php">Add Task</a></li>
				<li><a href="task.php">Check task</a></li>
                <li><a href="settings.php">Settings</a></li>
                <li><a href="logout.php">Logout</a></li>
                
            </ul>
        </nav>
        <nav id="nav-mobile"></nav>

        <section>
        
        </section>
    </div>
</div>
<?php
		$room_type = mysql_query("SELECT room_type FROM rooms Where room_id=$room_id", $dbcon);
		
		$row = mysql_fetch_array($room_type);
			?>

<form name="submitform"  action="submit.php" method="POST" enctype="multipart/form-data">
	
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
	<td><input name="room" type="text" value="<?php echo $row['room_type']; ?>" readonly></td>
	</tr>
	<!--<option value="Large-Double">Large-Double</option>	
	<option value="XL-Double">XL-Double</option>
	<option value="SYNDICAT">Syndicat</option>
	<option value="Large-Twin">Large-Twin</option>
	<option value="Royal-Suite">Royal-Suite</option>
	<option value="INV-STE">INV-STE</option>-->
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
	<!--This makes the post of room_id hidden from the users, but enables the use as a standard variable.-->
	<td><input type="hidden" name="location" value="<?php echo $room_id; ?>"  /></td>
	</tr>
	<tr>
	<td>Room map</td>
	<td>
	<?php

	//$imgName = mysql_real_escape_string($_FILES["map"]["name"]);
	//$imgData = mysql_real_escape_string(file_get_contents($_FILES["map"]["tmp_name"]));
	//echo $imageData;
	//$imgType = mysql_real_escape_string($_FILES["map"]["type"]);
	
	$result = mysql_query("SELECT room_map FROM rooms WHERE room_id=$room_id", $dbcon);
	if ($row = mysql_fetch_array($result)){
		
		$imgData = base64_encode($row['room_map']);
		//echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['imageContent'] ) . '" />';

		echo'<img src="data:image/jpeg;base64,' . $imgData . '" width="100" height="100" />';
		//header("content-type: image/jpeg");
		//echo $imgData;

		//$imgData = new Imagick($imgData);
		//$map = $imgData->getImageBlob();
		
		//echo'<img src="data:image/jpeg;base64,' . $_SESSION['map'] . '" />';
		//echo "Choose a room at the category location above.";
		//$imgData =addslashes (file_get_contents($_FILES[$row]));

		}
		else{
			echo "Choose a room at the category location above.";
		}

		//$imgData =addslashes(file_get_contents($_FILES[$row['room_map']]));
		
	?>
	</td>
	</tr>
	<tr>
	<td>Upload image</td>
	<td>
	<input type="file" name="image">
	</td>
	</tr>
	

	
	<td><button input type="submit" class="pure-button pure-button-primary">Submit</button></td>
	</table>
	
</form>
</tr>


 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


</body>

</html>