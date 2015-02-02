<!doctype html>
<?php
include ("session.php");
	


	if( ! isset($_SESSION['gebruiker'])){
		header('Location:index.php');
		exit;
	}
if($_SESSION['department']=="Technische Dienst"){
include ("nav.php");
}
else {
include ("hknav.php");
}

?>
<title>Westcord Fashion Hotel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<link rel='stylesheet' href='teststyle.css' />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<body>





<form name="submitform"  action="register.php" method="POST">
	<table class='submittable'  >
		<td>Username :</td>
		<td><input name="username" type="text" value=""></td>
		</tr>
		<tr>
		<td>Password :</td>
		<td><input name="password" type="password" value=""></td>
		</tr>
		<tr>
		<td>Department :</td>
		<td><select name="department">
			<option value=""></option>
			<option value="Technische Dienst">Technische Dienst</option>
			<option value="Housekeeping">Housekeeping</option>
			</select>
		</td>
		</tr>



		<td><button input type="submit" class="pure-button pure-button-primary">Apply</button></td>
	</table>
	
</form>


</body>

</html>