<?php
	session_start(); // Starting Session
	require ('connection.php');

	
	$gebruiker = $_POST['username'];
	$wachtwoord = $_POST['password'];
	
	$gebruiker = stripslashes($gebruiker);
	$wachtwoord = stripslashes($wachtwoord);
	$passencrypt = sha1($wachtwoord);
	
	$query = mysql_query("SELECT * FROM users WHERE username='$gebruiker'");
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
	if($numrows!=0){
		
		while ($row = mysql_fetch_assoc($query)){
		$dbusername = $row['username'];
		$dbpassword = $row['password'];
		echo $dbusername;
		echo $dbpassword;
	}
}
		//if ($gebruiker==$dbusername&&$wachtwoord==$dbpassword){
		//$_SESSION['gebruiker'] = mysql_fetch_assoc($result);
		//$_SESSION['gebruiker'] = $gebruiker;
		//header("location:lol.php");
		//}
		//else{
		//echo 'Incorrect username or password';
		
		//$_SESSION['gebruiker'] = mysql_fetch_assoc($result);
		//$_SESSION['gebruiker'] = $gebruiker;
		
	//} 
//}else{
		//echo 'Username not found';
		
//	}
	//*/

	
?>