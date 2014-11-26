<?php
	session_start(); // Starting Session

	$hostname = "107.189.33.148:3306";
	$database = "webdb";
	$username = "Beheerder";
	$password = "P@ssword"

	$dbcon = mysql_connect($hostname, $username, $password)/* or die (" could not connect to database")*/;
	if (!$dbcon) {
		die('Connection failed: ' . mysql_error());
	}
	else{
    	 echo "Connection to MySQL server " .$hostname . " successful!
	" . PHP_EOL;
	}
	$selectdb = mysql_select_db($database, $dbcon);
	if (!$selectdb) {
    	die ('Can\'t select database: ' . mysql_error());
	}
	else {
    	echo 'Database ' . $database . ' successfully selected!';
	}	
	
	$gebruiker = $_POST['username'];
	$wachtwoord = $_POST['password'];
	
	$gebruiker = stripslashes($gebruiker);
	$wachtwoord = stripslashes($wachtwoord);
	$passencrypt = sha1($wachtwoord);
	
	$query = "SELECT * FROM users WHERE username='$gebruiker' and password='$passencrypt'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);
	
	if($count==1){
		$_SESSION['gebruiker'] = mysql_fetch_assoc($result);
		$_SESSION['gebruiker'] = $gebruiker;
		header("location:homepage.php");
	} else{
		echo 'Incorrect Username or password';
	}
	
	
?>