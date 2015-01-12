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
<link rel='stylesheet' href='teststyle.css' />
<link rel="stylesheet" media="(max-width: 400px)" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="jquery.ui.datepicker.mobile.css" /> 
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="css/navstyle.css" />
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

  <script src="jQuery.ui.datepicker.js"></script>
  <script>
  //reset type=date inputs to text
  $( document ).bind( "mobileinit", function(){
    $.mobile.page.prototype.options.degradeInputs.date = true;
  });	
  </script>
  <script src="jquery.ui.datepicker.mobile.js"></script>
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
</div>
<tr>
<form name="session"  action="logout.php" method="POST">
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

<form name="getroommap" action="problem.php" method="POST">
  <table class='submittable'  >
  <tr>
  <td>Location :</td>
  <td><select name="location"  type="text">
    <option value=" "></option>
    <?php 
    $rooms = mysql_query("SELECT room_id FROM rooms", $dbcon) or die (mysql_error());
    while($row = mysql_fetch_array($rooms)){


      echo "<option value=" . $row['room_id'] . ">" . $row['room_id'] . "</option>";
      $room_id = $_POST['location'];
      }
    ?>
    <!--<option value=" <?php //echo $room_id; ?> "><?php //echo $room_id;?> </option>-->
  </select>
  <button input type="submit" class="pure-button pure-button-primary">Get Map</button>
  </td>
  </tr>
  </table>
</form>





 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


</body>

</html>