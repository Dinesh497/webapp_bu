<?php

require ('fpdf17/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(50,10,'Hello World!');
$pdf->Output();

?>