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



<body>
 
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


<!--<div class="img">
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
-->
<div class="img">
      <a target="" href="task.php"> 
      <img src="images\task.png" class="img-responsive" alt="Cinque Terre" width="220" height="200"> 
	  </a>
	  <div class="desc">Add a description of the image here</div>
</div>
<div class="img2">
	<a target="" href="settings.php">
	<img src="images\gear.png" class="img-responsive" width="220" height="200">
    
	</a>
	<div class="desc">Add a description of the image here</div>
</div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>

</html>
