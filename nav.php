<!doctype html>
<?php 
include ("session.php");

?>


<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="css/navstyle.css" />
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<?php
		$department = "Technische Dienst";
		$userDP =$_SESSION['department']; 
		if ($userDP==$department){
		?>
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
                <li><a href="logout.php">Logout</a></li>
                
            </ul>
        </nav>
        <nav id="nav-mobile"></nav>

        <section>
        
        </section>
    </div>
</div>
</body>
<?php
}
else {
?>
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
</body>
<?
}
?>




</html>