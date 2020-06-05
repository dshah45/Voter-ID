<?php
$servername='127.0.0.1:49489';
$username='azure';
$password='6#vWHD_$';
$dbname='adhaar';
$conn=mysqli_connect($servername,$username,$password,$dbname);

if($conn->connect_error) {
	die("connection failed : " . $conn->connect_error);
} 	