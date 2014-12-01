<!doctype html>
<?php
include ("session.php");
	if( ! isset($_SESSION['gebruiker'])){
		header('Location:index.php');
		exit;
	}


?>
<title>Westcord Fashion Hotel</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<link rel='stylesheet' media='screen and (min-width: 701px) and (max-width: 1400px)' href='style.css' />
<link rel='stylesheet' media='screen and (min-width: 480px) and (max-width: 600px)' href='mobile.css' />

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

<div class="img">
  <a target="_blank" href="settings.php">
	<img src="images\task.png" width="220" height="200">

  </a>
	<div class="desc">Add a description of the image here</div> 
</div>
<div class="img2">
  <a target="_blank" href="lol.php">
	<img src="images\gear.png" width="220" height="200">
    
  </a>
 <div class="desc">Add a description of the image here</div>
</div>




</body>
<div id="footer">
To be or not to be, that is the question
</div>
</html>
