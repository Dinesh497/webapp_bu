<?php
	require ('connection.php');
	$username = stripslashes($_POST['username']);
	$password = stripslashes($_POST['password']);
	$hash = md5(sha1($password));
	
	if (isset($username) && isset($password)) {
			

			$asql = 'INSERT INTO users (username, password)
					VALUES (\'' . $username .'\', (\'' . $hash .'\'))';

			@mysql_query($asql);
				if(!mysql_error())
									{
									
										echo '<br><br><br>Account has been made, returning....';
										header("refresh:5; url=account.php");
									}
									else
									{
										die('Error: ' . mysql_error()); 
										header("refresh:5; url=location.php");
									}
	} else 
?>