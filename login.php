<?php
	session_start(); // Starting Session

	$hostname = "107.189.33.148:3306";
	$database = "webdb";
	$username = "Beheerder";
	$password = "P@ssword"

	$dbcon = mysql_connect($hostname, $username, $password) or die (" could not connect to database");
	echo "WRDSADS ASD ";
	$selectdb = mysql_select_db($database, $dbcon);
	
	$gebruiker = $_POST['username'];
	$wachtwoord = $_POST['password'];
	
	$gebruiker = stripslashes($gebruiker);
	$wachtwoord = stripslashes($wachtwoord);
	$passencrypt = sha1($wachtwoord);
	
	$query = "SELECT * FROM users WHERE username='$gebruiker' and password='$passencrypt'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);
	
	echo "waarom doet ie het niet";
	if(!$count==1){
		echo "warom doet ie het niet";
		$_SESSION['gebruiker'] = mysql_fetch_assoc($result);
		$_SESSION['gebruiker'] = $gebruiker;
		header("location:homepage.php");
	} else{
		echo 'Incorrect username or password';
	}
	
	
?>