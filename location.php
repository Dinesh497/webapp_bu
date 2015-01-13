<!doctype html>
<?php
include ("session.php");
include ("nav.php");
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
<!--<link rel="stylesheet" media="(max-width: 400px)" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">-->




<body>

<tr>
<!--<form name="session"  action="logout.php" method="POST">
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

<form name="getroommap" action="problem.php" method="POST">
  <div class='locationtable'  >
  <tr>
  <td>Location :</td>
  <td><select name="location"  type="text">
    <option value=" "></option>
    <?php 
    $rooms = mysql_query("SELECT room_id FROM rooms", $dbcon) or die (mysql_error());
    while($row = mysql_fetch_array($rooms)){


      echo "<option value=" . $row['room_id'] . ">" . $row['room_id'] . "</option>";
      $room_id = $_POST['location'];
      }
    ?>
  
  </select>
  <button input type="submit" class="pure-button pure-button-primary">Get Map</button>
  </td>
  </tr>
  </div>
</form>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


</body>

</html>