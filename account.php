<!doctype html>
<?php
include ("session.php");
session_start(); // Starting Session	
require ("connection.php");
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



<?php
	if (isset($_GET['id']) &&  isset($_GET['username']) && isset($_GET['password'])) {
			$id = $_GET['id'];
			$username = $_GET['username'];
			$Password = $_GET['password'];

			$asql = 'INSERT INTO users (id, username, password)
					VALUES (\'' . $id .'\',\'' . $username .'\', SHA1(\'' . $password .'\'))';

			@mysql_query($asql);
				if(!mysql_error())
									{
									
										echo '<br><br><br>Account has been made.';
									}
									else
									{
										die('Error: ' . mysql_error()); 
										
									}
	} else {
?>

<form name="submitform"  action="account.php" method="get">
	<table class='submittable'  >
		<tr>
		<td>ID :</td>
		<td><input name="id" type="text" value=""></td>
		</tr>
		<tr>
		<td>Username :</td>
		<td><input name="username" type="text" value=""></td>
		</tr>
		<tr>
		<td>Password :</td>
		<td><input name="password" type="text" value=""></td>
		</tr>



		<td><button input type="submit" class="pure-button pure-button-primary">Apply</button></td>
	</table>
	
</form>
<?php
}
?>

</body>

</html>