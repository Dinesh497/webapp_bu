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
    <option value=" "></option>
    <?php 
    $rooms = mysql_query("SELECT room_id FROM rooms", $dbcon) or die (mysql_error());
    while($row = mysql_fetch_array($rooms)){


      echo "<option value=" . $row['room_id'] . ">" . $row['room_id'] . "</option>";
      }
    ?>
    <!--<option value=" <?php echo $room_id; ?> "><?php echo $room_id;?> </option>-->
  </select>
  <button input type="submit" class="pure-button pure-button-primary">Get Map</button>
  </td>
  </tr>
  </table>
</form>





 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


</body>

</html>