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
<link rel="stylesheet" media="(max-width: 400px)" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="jquery.ui.datepicker.mobile.css" /> 
  <script src="jQuery.ui.datepicker.js"></script>
  <script>
  //reset type=date inputs to text
  $( document ).bind( "mobileinit", function(){
    $.mobile.page.prototype.options.degradeInputs.date = true;
  });	
  </script>
  <script src="jquery.ui.datepicker.mobile.js"></script>
<body>

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


<form name="submitform"  action="submit.php" method="POST">
	
	<table class='submittable'  >
	<tr>
	
	</tr>
	<tr>
	<div id="formtext"><td>Ticket ID :</td></div>
	</tr>
	<tr>
	<td>Date :</td>
	<td><script>
	var tD = new Date();
	var datestr = tD.getDate() + "/" + (tD.getMonth()+ 1) + "/" + tD.getFullYear();
	document.write("<input type='text' name='date' value='"+datestr+"' readonly>");
	</script></td>
	</tr>
	<tr>
	<td>User :</td>
	<td><name="username"><?php echo $_SESSION['gebruiker']; ?></td>
	</tr>
	<tr>
	<td>status :</td>
	<td>
	<select name="status">
	<option value="Open">Open</option>
	<option value="Pending">Pending</option>
	<option value="Closed">Closed</option>
	</select>
	</td>
	</tr>
	<tr>
	<td>Priority :</td>
	<td>
	<select name="Priority">
	<option value="High">High</option>
	<option value="Medium">Medium</option>
	<option value="Low">Low</option>
	</select>
	</td>
	</tr>
	<tr>
	<td>Location :</td>
	</tr>
	<tr>
	<td>Room type :</td>
	</tr>
	<tr>
	<td>Known Problems :</td>
	<td>
	<select name="Known problems">
	<option value="Lamp">Lamp</option>
	<option value="Desk">Desk</option>
	<option value="Wall">Wall</option>
	<option value="Remote">Remote control</option>
	<option value="TV">Television</option>
	<option value="Sink">Sink</option>
	<option value="Shower">Shower</option>
	<option value="Bathtub">Bathtub</option>
	<option value="Window">Window</option>
	<option value="Chair">Chair/couch</option>
	</select>
	</tr>
	<tr>
	<td>
	<label for="comments">Description</label>
	</td>
	<td>
	<textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
	</td>
	</tr>
	<tr>
	<td>Handle before :</td>
	<td><input type="date" name="date" id="date" value=""  /></td>
	</tr>
	
	<td><button input type="submit" class="pure-button pure-button-primary">Submit</button></td>
	</table>
	
</form>
</tr>










 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


</body>

</html>