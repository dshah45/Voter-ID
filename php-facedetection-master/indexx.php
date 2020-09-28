<?php
error_reporting(0);
include "FaceDetector.php";

$detector = new svay\FaceDetector('detection.dat');
$hello = $detector->faceDetect('foto-garage-ag-AUlUpMqdLkk-unsplash.jpg');
//$hello = $detector->toJpeg();
if($hello == 1)
{
	echo "success";
}
else
{
	echo "failed";
}
