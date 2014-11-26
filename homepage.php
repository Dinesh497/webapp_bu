<!doctype html>
<?php
include ("login.php");
	if( ! isset($_SESSION['gebruiker']))
{
	header('Location:index.php');
	exit;
}
?>
<title>Westcord Fashion Hotel</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<body>
 
<h1> You're logged in, please clean the rooms</h1>




</body>
<div id="footer">
To be or not to be, that is the question
</div>
</html>
