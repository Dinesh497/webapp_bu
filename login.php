<?php
	$username = "root";
	$password = "P@ssw0rd";
	$hostname = "localhost";
	
	$dbcon = mysql_connect($hostname, $username, $password) or die (" could not connect to database");
	$selectdb = mysql_select_db("webapp", $dbcon);
	
	$gebruiker = $_POST['username'];
	$wachtwoord = $_POST['password'];
	
	$gebruiker = stripslashes($gebruiker);
	$wachtwoord = stripslashes($wachtwoord);
	$passencrypt = sha1($wachtwoord);
	
	$query = "SELECT * FROM users WHERE username='$gebruiker' and password='$passencrypt'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);
	
	if($count==1){
	header("location:homepage.php");
	} else{
		echo 'Incorrect Username or password';
	}
	
	
?>