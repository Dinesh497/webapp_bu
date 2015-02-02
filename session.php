<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	include ('connection.php');
	session_start();// Starting Session
// Storing Session
	$user_check=$_SESSION['gebruiker'];
// SQL Query To Fetch Complete Information Of User
	$ses_sql=mysql_query("select * from users where username='$user_check'", $dbcon);
	$row = mysql_fetch_assoc($ses_sql);
	$login_session =$row['username'];
	$_SESSION['department']=$row['department'];
	if(!isset($login_session)){
		mysql_close($connection); // Closing Connection
		header('Location: index.php'); // Redirecting To Home Page
	}
?>