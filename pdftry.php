<?php session_start(); ?>
<!--<?php //error_reporting(0); ?>-->
<?php
include('tcpdf/tcpdf.php'); 
  //$username = "";
  //$email    = "";
  //$textboxx = "";
  //$var = "";
  $errors = array(); 
  $_SESSION['success'] = "";
ob_end_clean();
  // connect to database
     $db = mysqli_connect('127.0.0.1:49489', 'azure', '6#vWHD_$', 'adhaar');
      $result1 = mysqli_query($db,"SELECT * FROM adhaardetail WHERE Adhaarno = '".$_SESSION['varr']."' "); 
	  $row=mysqli_fetch_array($result1);
	  
	  $name = $row['Name'];
	  $fname = $row['Fname'];
	  $gender = $row['Sex'];
	  $dob = $row['DOB'];
 	  $img = $row['imgname'];
    $add = $row['Address'];


//include library

//make tcpdf object
$pdf=new TCPDF('p','mm','A4',true,'UTF-8',false);

//remove default header and footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

//add page
$pdf->AddPage();

//add content
//using cell

$pdf->Rect(47, 40, 115, 165, 'D');
$pdf->SetFont('freesans','',17);
$pdf->Write(69, "भारत निर्वाचन आयोग", '', 0, 'C', true, 0, false, false, 0);
$pdf->SetXY(3, 58);
$pdf->SetFont('Helvetica','',12.5);
$pdf->Write(10,"ELECTION COMMISSION OF INDIA", '', 0, 'C', true, 0, false, false, 0);
//$pdf->Cell(30,75,"भारत निर्वाचन आयोग",0,1,'C');
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->Image('0.jpg',48,52,17,24);
$pdf->Image('nvsp.png',139,52,23,24);

$pdf->SetXY(48, 50);
$pdf->SetFont('freesans','',14);
$pdf->Write(69, "मतदाता फोटो पहचान पत्र", '', 0, 'L', true, 0, false, false, 0);

$pdf->SetXY(55, 50);
$pdf->SetFont('Helvetica','',11.5);
$pdf->Write(69, "ELECTOR PHOTO IDENTITY CARD", '', 0, 'C', true, 0, false, false, 0);

$pdf->Image($img,83,94,40,43);


$pdf->SetXY(50, 113);
$pdf->SetFont('Helvetica','',12);
$pdf->Write(69, "ELECTOR'S NAME : ".strtoupper($name), '', 0, 'L', true, 0, false, false, 0);

$pdf->SetXY(50, 123);
$pdf->SetFont('Helvetica','',12);
$pdf->Write(69, "FATHER'S NAME : ".strtoupper($fname), '', 0, 'L', true, 0, false, false, 0);

$pdf->SetXY(50, 133);
$pdf->SetFont('Helvetica','',12);
$pdf->Write(69, "GENDER NAME : ".strtoupper($gender), '', 0, 'L', true, 0, false, false, 0);

$pdf->SetXY(50, 143);
$pdf->SetFont('Helvetica','',12);
$pdf->Write(69, "DATE OF BIRTH : ".strtoupper($dob), '', 0, 'L', true, 0, false, false, 0);

$pdf->SetXY(50, 184);
$pdf->SetFont('Helvetica','',12);
//$pdf->Write(69, "ADDRESS : ".strtoupper($add), '', 0, 'L', true, 0, false, false, 0);
//$pdf->CellFitSpaceForce(0,10,"ADDRESS : ".strtoupper($add),1,1,'',1);
$pdf->MultiCell(110,20,"ADDRESS : ".strtoupper($add),0,1);




//output
$pdf->output('VoterID.pdf','D');
?>