<?php
	session_start(); // Starting Session
	require ('connection.php');

	
	$gebruiker = $_POST['username'];
	$wachtwoord = $_POST['password'];
	
	$gebruiker = stripslashes($gebruiker);
	//$wachtwoord = stripslashes($wachtwoord);
	$passencrypt = sha1($wachtwoord);
	
	$query = mysql_query("SELECT * FROM users WHERE username='$gebruiker' AND password='$passencrypt'");
	$numrows = mysql_num_rows($query);
	
	
	/*if(isset($gebruiker) && isset($passencrypt))
	{
		$_SESSION['gebruiker'] = mysql_fetch_assoc($result);
		$_SESSION['gebruiker'] = $gebruiker;
		//$_SESSION['wachtwoord'] = $passencrypt;
		header("location:homepage.php");
	} else{
		echo 'Incorrect username or password';
	}
	*/
	
//
	if($numrows==1){
		header("location:lol.php");
		//while ($row = mysql_fetch_assoc($query)){
		//$dbusername = $row['username'];
		//$dbpassword = $row['password'];
		
	//}

		//if ($gebruiker==$dbusername&&$passencrypt==$dbpassword){
		//$_SESSION['gebruiker'] = mysql_fetch_assoc($result);
		//$_SESSION['gebruiker'] = $gebruiker;
		//header("location:lol.php");
		//}
		//else{
		//echo 'Incorrect username or password';
		
		//$_SESSION['gebruiker'] = mysql_fetch_assoc($result);
		//$_SESSION['gebruiker'] = $gebruiker;
		
	//} 
	}
else{
		echo 'Username not found';
		echo $passencrypt;
		
}
	//*/

	
?>