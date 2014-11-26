<?php
	session_start(); // Starting Session

	$hostname = "localhost";
	$database = "webdb";
	$username = "Beheerder";
	$password = "P@ssword"

	$dbcon = mysql_connect("107.189.33.148:3306", "Beheerder", "P@ssw0rd") or die (" could not connect to database");
	$selectdb = mysql_select_db("webdb", $dbcon);
	
	$gebruiker = $_POST['username'];
	$wachtwoord = $_POST['password'];
	
	$gebruiker = stripslashes($gebruiker);
	$wachtwoord = stripslashes($wachtwoord);
	$passencrypt = sha1($wachtwoord);
	
	$query = "SELECT * FROM users WHERE username='$gebruiker' and password='$passencrypt'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);
	
	
	if(!$count==1){
		$_SESSION['gebruiker'] = mysql_fetch_assoc($result);
		$_SESSION['gebruiker'] = $gebruiker;
		header("location:homepage.php");
	} else{
		echo 'Incorrect username or password';
	}
	
	
?>