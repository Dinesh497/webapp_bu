<?php
	session_start(); // Starting Session
	require ('connection.php');

	
	$gebruiker = $_POST['username'];
	$wachtwoord = $_POST['password'];
	
	$gebruiker = stripslashes($gebruiker);
	$wachtwoord = stripslashes($wachtwoord);
	$passencrypt = sha1($wachtwoord);
	
	$query = "SELECT * FROM users WHERE username='$gebruiker' and password='$passencrypt'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);
	
	
	if(!isset($gebruiker) && !isset($passencrypt))
	{
		$_SESSION['gebruiker'] = mysql_fetch_assoc($result);
		$_SESSION['gebruiker'] = $gebruiker;
		//$_SESSION['wachtwoord'] = $passencrypt;
		header("location:homepage.php");
	} else{
		echo 'Incorrect username or password';
	}
	
/*
	if(!$count==1){
		$_SESSION['gebruiker'] = mysql_fetch_assoc($result);
		$_SESSION['gebruiker'] = $gebruiker;
		header("location:homepage.php");
	} else{
		echo 'Incorrect username or password';
	}
	*/
	
?>