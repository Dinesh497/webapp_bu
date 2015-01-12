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
<form name="submitform"  action="settings.php" method="POST">
</tr>

<tr>
	<td>Location :</td>
	<td><select name="location"  type="text">
		<option value=""></option>
		<?php 
		$rooms = mysql_query("SELECT room_id FROM rooms", $dbcon) or die (mysql_error());
		while($row = mysql_fetch_array($rooms)){

			echo "<option value=" . $row['room_id'] . ">" . $row['room_id'] . "</option>";
			}
		?>
	</select>
	<button input type="submit" class="pure-button pure-button-primary">Get Map</button>
	</td>
</tr>

<tr>
	<td>status :</td>
	<td>
	<select name="status">
	<option value=""></option>
	<?php 
	$rooms = mysql_query("SELECT room_id FROM rooms", $dbcon) or die (mysql_error());
	while($row = mysql_fetch_array($rooms)){

		echo "<option value=" . $row['room_id'] . ">" . $row['room_id'] . "</option>";
		}
	?>
	</select>
	</td>
</tr>

<tr>
	<td>Room map</td>
	<td>
	<?php
	$room_id = $_POST['location'];
	$result = mysql_query("SELECT room_map FROM rooms WHERE room_id=$room_id", $dbcon) or die (mysql_error());
	$row = mysql_fetch_array($result);

	//echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['imageContent'] ) . '" />';

	echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['room_map'] ) . '" />';

	/*
	$im = imagecreatefromjpeg($row['room_map']);

	$ellipseColor = ImageColorAllocate($im, 0, 0, 255); 
	
	$start_x = 10; 
	$start_y = 20;
	$font = 'arial.ttf';
	Imagettftext($im, 12, 0, $start_x, $start_y, $black, $font, 'text to write'); 

	imagefilledellipse($im, 100, 100, 10, 10, $ellipseColor)

	header('Content-Type: image/jpeg');
	Imagejpeg($im, '', 100); 
	*/



	function upload() {
    include "file_constants.php";
    $maxsize = 10000000; //set to approx 10 MB

    //check associated error code
    if($_FILES['userfile']['error']==UPLOAD_ERR_OK) {

        //check whether file is uploaded with HTTP POST
        if(is_uploaded_file($_FILES['userfile']['tmp_name'])) {    

            //checks size of uploaded image on server side
            if( $_FILES['userfile']['size'] < $maxsize) {  
  
               //checks whether uploaded file is of image type
              //if(strpos(mime_content_type($_FILES['userfile']['tmp_name']),"image")===0) {
                 $finfo = finfo_open(FILEINFO_MIME_TYPE);
                if(strpos(finfo_file($finfo, $_FILES['userfile']['tmp_name']),"image")===0) {    

                    // prepare the image for insertion
                    $imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));

                    // put the image in the db...
                    // database connection
                    mysql_connect($host, $user, $pass) OR DIE (mysql_error());

                    // select the db
                    mysql_select_db ($db) OR DIE ("Unable to select db".mysql_error());

                    // our sql query
                    $sql = "INSERT INTO test_image
                    (image, name)
                    VALUES
                    ('{$imgData}', '{$_FILES['userfile']['name']}');";

                    // insert the image
                    mysql_query($sql) or die("Error in Query: " . mysql_error());
                    $msg='<p>Image successfully saved in database with id ='. mysql_insert_id().' </p>';
                }
                else
                    $msg="<p>Uploaded file is not an image.</p>";
            }
             else {
                // if the file is not less than the maximum allowed, print an error
                $msg='<div>File exceeds the Maximum File limit</div>
                <div>Maximum File limit is '.$maxsize.' bytes</div>
                <div>File '.$_FILES['userfile']['name'].' is '.$_FILES['userfile']['size'].
                ' bytes</div><hr />';
                }
        }
        else
            $msg="File not uploaded successfully.";

    }
    else {
        $msg= file_upload_error_message($_FILES['userfile']['error']);
    }
    return $msg;
}

// Function to return error message based on error code

function file_upload_error_message($error_code) {
    switch ($error_code) {
        case UPLOAD_ERR_INI_SIZE:
            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
        case UPLOAD_ERR_FORM_SIZE:
            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
        case UPLOAD_ERR_PARTIAL:
            return 'The uploaded file was only partially uploaded';
        case UPLOAD_ERR_NO_FILE:
            return 'No file was uploaded';
        case UPLOAD_ERR_NO_TMP_DIR:
            return 'Missing a temporary folder';
        case UPLOAD_ERR_CANT_WRITE:
            return 'Failed to write file to disk';
        case UPLOAD_ERR_EXTENSION:
            return 'File upload stopped by extension';
        default:
            return 'Unknown upload error';
    }
}
?>

<option value="Large-Double">Large-Double</option>
	<option value="XL-Double">XL-Double</option>
	<option value="SYNDICAT">Syndicat</option>
	<option value="Large-Twin">Large-Twin</option>
	<option value="Royal-Suite">Royal-Suite</option>
	<option value="INV-STE">INV-STE</option>

</tr>
	</form>

</body>

</html>