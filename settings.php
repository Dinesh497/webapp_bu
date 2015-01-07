<!doctype html>
<?php
include ("session.php");
	if( ! isset($_SESSION['gebruiker'])){
		header('Location:index.php');
		exit;
	}


?>
<title>Westcord Fashion Hotel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<link rel='stylesheet' href='style.css' />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<body>

<tr>
<form name="form1"  action="logout.php" method="POST">
	<td>
	<table class='logout' >
		<tr>
		<td><?php echo $_SESSION['gebruiker']; ?> is logged in!</td>
		<tr>
		
		<td><button input type="submit" class="pure-button pure-button-primary">Logout</button></td>

		</tr>
	</table>
	</td>
</form>
</tr>

<img src="image.php?id=<?php echo $result; ?>" />
<?php
$id = (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
$image = getImageFromDatabase($result); // your code to fetch the image

header('Content-Type: image/jpeg');
echo $image;
?>

<?php
echo "<table class='tasktable'>";

echo "<tr>";
echo "<td>Room map</td>";

$result = mysql_query("SELECT room_map FROM rooms WHERE room_id='0101'", $dbcon);
while($row = mysql_fetch_array($result)){
		echo "<br>";
		echo "<tr>";
		echo "<td> " . $row['room_map'] . "</td>";
		
	}
echo "</table>";//tabel sluiten
?>
</body>

</html>