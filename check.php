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
<link rel='stylesheet' href='style.css' />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<body>

<form action="overview.php" method="POST">
<div class ='searchtable'>

<select name="input">
	<option value=""></option>
	<option value="lamp">Lamp</option>
	<option value="mini-bar">Minibar</option>
	<option value="remote control">Remote control</option>
	<option value="Television">Television</option>
	<option value="sink">Sink</option>
	<option value="shower">Shower</option>
	<option value="bathtub">Bathtub</option>
	<option value="window">Window</option>
	<option value="chair/couch">Chair/couch</option>
</select>
<br>
<button input type="submit" class="pure-button pure-button-primary">Search status</button>


</div>
</form>


</body>

</html>