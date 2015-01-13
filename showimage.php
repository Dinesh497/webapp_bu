<?php

include("connection.php");

if(isset($_GET['id']))
{
    
    $id = mysql_real_escape_string($_GET['id']);
	$result = mysql_query("SELECT * FROM tickets1 WHERE id=$id", $dbcon);
    while($row = mysql_fetch_assoc($query))
    {
        $imageData = $row["image"];
    }
    header("content-type: image/jpeg");
    echo $imageData;
	echo $id;
}
 else {
echo "error!";    
}
?>