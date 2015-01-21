<!doctype html>
<?php
require ("session.php");
	if(isset($_SESSION['gebruiker'])){
	
		header('Location:homepage.php');
		exit;
	}
	else{
?>

<title>Westcord Fashion Hotel</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<link rel='stylesheet' href='style.css' />
<link rel="stylesheet" media="(max-width: 400px)" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<body>
 

 
<table class='table'>
<tr>

<form name="form1"  action="login.php" method="POST">
	<td>
	<img src="images\logo.png" class="img-responsive" width="400">
	<table class='table'  >
	<tr>
	
	</tr>

	<tr>
	<td>Username</td>
	<td width="6">:</td>
	<td width="320"><input name="username" type="text" id="username"></td>
	</tr>
	<tr>
	<td>Password</td>
	<td>:</td>
	<td><input name="password" type="password" id="password"></td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td><button input type="submit" class="pure-button pure-button-primary">Sign in</button></td>

	</tr>
	</table>
	</td>
</form>
</tr>
</table>


 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


</body>
<div id="footer">

</div>
</html>
