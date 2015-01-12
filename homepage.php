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
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="css/navstyle.css" />
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

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


<!--<div class="img">
  <a target="_blank" href="settings.php">
	<img src="images\task.png" width="220" height="200">

  </a>
	<div class="desc">Add a description of the image here</div> 
</div>
<div class="img2">
  <a target="_blank" href="lol.php">
	<img src="images\gear.png" width="220" height="200">
    
  </a>
 <div class="desc">Add a description of the image here</div>
</div>
-->
<div class="img">
      <a target="" href="task.php"> 
      <img src="images\task.png" class="img-responsive" alt="Cinque Terre" width="220" height="200"> 
	  </a>
	  <div class="desc">Add a description of the image here</div>
</div>
<div class="img2">
	<a target="" href="settings.php">
	<img src="images\gear.png" class="img-responsive" width="220" height="200">
    
	</a>
	<div class="desc">Add a description of the image here</div>
</div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>

</html>
