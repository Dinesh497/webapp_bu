<!doctype html>
<?php
include ("session.php");
include ('connection.php');
	if( ! isset($_SESSION['gebruiker'])){
		header('Location:index.php');
		exit;
	}


?>
<title>Westcord Fashion Hotel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<link rel='stylesheet' href='teststyle.css' />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="css/navstyle.css" />
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

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
	<script>
    $(document).ready(function(){
        $("#nav-mobile").html($("#nav-main").html());
        $("#nav-trigger span").click(function(){
            if ($("nav#nav-mobile ul").hasClass("expanded")) {
                $("nav#nav-mobile ul.expanded").removeClass("expanded").slideUp(250);
                $(this).removeClass("open");
            } else {
                $("nav#nav-mobile ul").addClass("expanded").slideDown(250);
                $(this).addClass("open");
            }
        });
    });
</script>
<body>


<div id="main">
    <div class="container1">
        <div id="nav-trigger">
            <span>Menu</span>
        </div>
        <nav id="nav-main">
            <ul>
                <li><a href="homepage.php">Home</a></li>
                <li><a href="location.php">Add Task</a></li>
				<li><a href="task.php">Check task</a></li>
                <li><a href="settings.php">Settings</a></li>
                <li><a href="logout.php">Logout</a></li>
                
            </ul>
        </nav>
        <nav id="nav-mobile"></nav>

        <section>
        
        </section>
    </div>
</div><!-- #main -->

<tr>
<form name="form1"  action="logout.php" method="POST">
	<td>
	<div class='logout' >
		<tr>
		<td><?php echo $_SESSION['gebruiker']; ?> is logged in!</td>
		<tr>
	

		<br>
		
		<td><button input type="submit" class="pure-button pure-button-primary">Logout</button></td>

		</tr>
	</div>
	</td>
</form>
</tr>
<form action="task.php" method="POST">
<div class ='searchtable'>

<select name="input">
	<option value=""></option>
	<option value="Open">Open</option>
	<option value="Pending">Pending</option>
	<option value="Closed">Closed</option>
</select>
<br>
<button input type="submit" class="pure-button pure-button-primary">Search status</button>

</div>
</form>
<?php 
if ($input ==""): ?>


<table class='tasktable'>

<form>
<thead>
<tr>
<th>Ticket ID &nbsp;</th>
<th>Created by &nbsp;</th>
<th>Priority &nbsp;</th>
<th>Location &nbsp;</th>
<th>Status &nbsp;</th>
<th>Description &nbsp;</th>
<th>Handle before &nbsp;</th>
<th>Edit &nbsp;</th>
</tr>
</thead>
<?php
$input = $_POST['input'];
$result = mysql_query("SELECT * FROM tickets1 WHERE status='$input'", $dbcon);
	while($row = mysql_fetch_array($result)){
		?>
		<tbody>
		
		<tr>
		<td data-title="Ticket ID"><?php echo $row['id']; ?></td>
		<td data-title="Created by"> <?php echo $row['user']; ?> </td>
		<td data-title="Priority"> <?php echo $row['priority']; ?></td>
		<td data-title="Location"> <?php echo $row['location']; ?> </td>
		<td data-title="Status"> <?php echo $row['status']; ?></td>
		<td data-title="Description"> <?php echo $row['description']; ?></td>	
		<td data-title="Handle before"> <?php echo $row['handle_before']; ?></td>
		<td data-title="edit"> <a href='ticket.php?ticket="<?php echo $row['id']; ?>"'>More Information</a></td>
	
		</tr>
		</tbody>
		</form>
		
		<?php
	}
echo "</table>";//tabel sluiten

?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>

</html>
