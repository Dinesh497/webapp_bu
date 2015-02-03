<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
	//Title
	$this->SetFont('Arial','',18);
	$this->Cell(0,6,'PDF From mysql',0,1,'C');
	$this->Ln(10);
	//Ensure table header is output
	parent::Header();
}
}

//Connect to database
mysql_connect('localhost','Beheerder','P@ssw0rd');
mysql_select_db('webdb');
//$input = $_POST['input'];
//$result = mysql_query("SELECT `id`, `date`, `location`, `known_problems`, `handle_before`  from tickets1 where known_problems = '$input' order by `id`");

$pdf=new PDF();
$pdf->AddPage();
//First table: put all columns automatically
$pdf->Table('SELECT `id`, `date`, `location`, `known_problems`, `handle_before`  from tickets1 where known_problems = "lamp" order by `id`');
//$pdf->Table($result);
$pdf->AddPage();
//Second table: specify 3 columns
$pdf->AddCol('id',40,'','C');
$pdf->AddCol('date',40,'date','C');
$pdf->AddCol('location',40,'location','C');
$pdf->AddCol('known_problems',40,'known_problems','C');
$pdf->AddCol('handle_before',40,'handle_before','C');
$prop=array('HeaderColor'=>array(255,150,100),
			'color1'=>array(210,245,255),
			'color2'=>array(255,255,210),
			'padding'=>2);
$pdf->Table('select id,  date, location, known_problems, handle_before from tickets1 where known_problems = "lamp" order by id limit 0,20',$prop);

//$pdf->Output("C:\Users\John\Desktop/somename.pdf",'F'); 

$pdf->Output();
//$pdf->Output($downloadfilename.".pdf"); 
//header('Location: '.$downloadfilename.".pdf");
?>
