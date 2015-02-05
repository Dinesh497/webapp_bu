<!doctype html>
<?php
include ("session.php");
include ("nav.php");
	if( ! isset($_SESSION['gebruiker'])){
		header('Location:index.php');
		exit;
	}
	


?>
<head>
<title>Westcord Fashion Hotel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<link rel='stylesheet' href='style.css' />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<style>
	
	/* 
	Max width before this PARTICULAR table gets nasty
	This query will take effect for any screen smaller than 760px
	and also iPads specifically.
	*/
	@media 
	only screen and (max-width: 760px),
	(min-device-width: 768px) and (max-device-width: 1024px)  {
	
		/* Force table to not be like tables anymore */
		.tasktable, thead, tbody, th, td, tr { 
			display: block; 
		}
		
		/* Hide table headers (but not display: none;, for accessibility) */
		thead tr { 
			position: absolute;
			top: -9999px;
			left: -9999px;
		}
		
		tr { border: 1px solid #ccc; }
		
		td { 
			/* Behave  like a "row" */
			border: none;
			border-bottom: 1px solid #eee; 
			position: relative;
			padding-left: 50%; 
		}
		
		td:before { 
			/* Now like a table header */
			position: absolute;
			/* Top/left values mimic padding */
			top: 6px;
			left: 6px;
			width: 45%; 
			padding-right: 10px; 
			white-space: nowrap;
		}
		
		/*
		Label the data
		*/
		td:nth-of-type(1):before { content: "Ticket ID"; }
		td:nth-of-type(2):before { content: "Created By"; }
		td:nth-of-type(3):before { content: "Priority"; }
		td:nth-of-type(4):before { content: "Location"; }
		td:nth-of-type(5):before { content: "Status"; }
		td:nth-of-type(6):before { content: "Description"; }
		td:nth-of-type(7):before { content: "Handle before"; }
		td:nth-of-type(8):before { content: "Details"; }
		
	}
	
	/* Smartphones (portrait and landscape) ----------- */
	@media only screen
	and (min-device-width : 320px)
	and (max-device-width : 480px) {
		body { 
			padding: 0; 
			margin: 0; 
			width: 320px; }
		}
	
	/* iPads (portrait and landscape) ----------- */
	@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
		body { 
			width: ; 
		}
	}
	
	</style>
	
<script  type="text/javascript">
function updatevariable(selected) { 
        var input = selected;
}

function selectVideo(obj){
 		var urlString = "sql_table_to_pdf/generate-pdf.php?input=";
        var selectedVideo = obj.options[obj.selectedIndex];
        if (selectedVideo.value != "nothing"){
                window.location = urlString + selectedVideo.value;
        }
}
</script>
</head>
<body>

<form action="check.php" method="POST">
<div class ='searchtable'>
 
<select name="input" id="input" onchange="updatevariable(this.value)">

<?php
$input = $_POST['input'];

//selected="selected">

switch(empty ($input)){
	case 1:
	echo 	"<option value=""></option>";
	break;
	case 2:
	echo 	"<option value=" . "lamp" . "selected=" . "selected" . ">Lamp</option>";
	break;
	case 3:
	echo "<option value=" . "mini-bar" . "selected=" . "selected" . ">Minibar</option>";
	break;
	default:
	echo 	"<option value=""></option>";
	/*<option value="remote control">Remote control</option>
	<option value="Television">Television</option>
	<option value="sink">Sink</option>
	<option value="shower">Shower</option>
	<option value="bathtub">Bathtub</option>
	<option value="window">Window</option>
	<option value="chair/couch">Chair/couch</option>*/
}
?>
</select>



<br>
<button input type="submit" class="pure-button pure-button-primary">Search status</button>
</form>
<br>
<td><a onclick="selectVideo(input)">Get overview</a></td>
<!---<td><a onclick="location.href='sql_table_to_pdf/generate-pdf.php?input='+value;return false;">Get overview</a></td>-->
</br>


</div>
<!--</form>-->
<?php 
//$input = $_POST['input'];
if (empty ($input)){ ?>

<table class='tasktable'>

<form>
<thead>
<tr>
<th>Ticket ID &nbsp;</th>
<th>Created by &nbsp;</th>
<th>Priority &nbsp;</th>
<th>Location &nbsp;</th>
<th>Status &nbsp;</th>
<th>Known problems &nbsp;</th>
<th>Handle before &nbsp;</th>
<th>Edit &nbsp;</th>
</tr>
</thead>
<?php

$result = mysql_query("SELECT * FROM tickets1 WHERE status='open'", $dbcon);
	while($row = mysql_fetch_array($result)){
		?>
		<tbody>
		
		<tr>
		<td data-title="Ticket ID"><?php echo $row['id']; ?></td>
		<td data-title="Created by"> <?php echo $row['user']; ?> </td>
		<td data-title="Priority"> <?php echo $row['priority']; ?></td>
		<td data-title="Location"> <?php echo $row['location']; ?> </td>
		<td data-title="Status"> <?php echo $row['status']; ?></td>
		<td data-title="Known problems"> <?php echo $row['known_problems']; ?></td>	
		<td data-title="Handle before"> <?php echo $row['handle_before']; ?></td>
		<td data-title="edit"> <a href='sql_table_to_pdf/generate-pdf.php?input="<?php echo $row['known_problems']; ?>"'>Get overview</a></td>
	
		</tr>
		</tbody>
		</form>
		
		<?php
	}
echo "</table>";//tabel sluiten
}
else { ?>

<table class='tasktable'>

<form>
<thead>
<tr>
<th>Ticket ID &nbsp;</th>
<th>Created by &nbsp;</th>
<th>Priority &nbsp;</th>
<th>Location &nbsp;</th>
<th>Status &nbsp;</th>
<th>Known Problems &nbsp;</th>
<th>Handle before &nbsp;</th>
<th>Edit &nbsp;</th>
</tr>
</thead>
<?php

$result = mysql_query("SELECT * FROM tickets1 WHERE known_problems='$input'", $dbcon);
	while($row = mysql_fetch_array($result)){
		?>
		<tbody>
		
		<tr>
		<td data-title="Ticket ID"><?php echo $row['id']; ?></td>
		<td data-title="Created by"> <?php echo $row['user']; ?> </td>
		<td data-title="Priority"> <?php echo $row['priority']; ?></td>
		<td data-title="Location"> <?php echo $row['location']; ?> </td>
		<td data-title="Status"> <?php echo $row['status']; ?></td>
		<td data-title="Known problems"> <?php echo $row['known_problems']; ?></td>	
		<td data-title="Handle before"> <?php echo $row['handle_before']; ?></td>
		<td data-title="edit"> <a href='sql_table_to_pdf/generate-pdf.php?input="<?php echo $row['known_problems']; ?>"'>Get overview</a></td>
	
		</tr>
		</tbody>
		</form>
		
		<?php
	}
echo "</table>";//tabel sluiten
}
?>

<?php
/*
$F = fopen('myfile.txt' , 'w'); // open for write
$delim = "\t"; //set delim eg tab
$res = mysql_query("SELECT id, date, location, known_problems, handle_before FROM tickets1 WHERE known_problems='$input'");
while ($row=mysql_fetch_row($res)){
	fwrite($F, join($delim, $row). "\n");
}
fclose($F);
*/
?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


</body>

</html>