<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>

<?php 
	// variable declaration
	//echo $_SESSION['enc_email'];
	$username = "";
	$email    = "";
	$textboxx = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('127.0.0.1:49489', 'azure', '6#vWHD_$', 'adhaar');
	$db1 = mysqli_connect('127.0.0.1:49489', 'azure', '6#vWHD_$', 'register');
	$conn = mysqli_connect('127.0.0.1:49489', 'azure', '6#vWHD_$', 'otptable');

	$emailid = mysqli_query($db1, "SELECT email FROM users WHERE username = '".$_SESSION['enc_username']."'");
	$mail = mysqli_fetch_array($emailid);

	//echo $mail['email'];
	$decrypt = $mail['email'];
	//echo $decrypt;
			$decryption_iv = '1234567891011121';
			$decryption = openssl_decrypt($decrypt, "AES-128-CTR", "param_encr", 0, $decryption_iv);
			
	//echo $decrypt;
	/*** To Generate Year of the user and enter in database ***/
	$todaydate = date("Y-m-d");

	$query = mysqli_query($db, "SELECT * FROM adhaardetail");
	$rowcount=mysqli_num_rows($query); 

	$i=1;
	while($row = mysqli_fetch_array($query))
	{
		$interval = date_diff(date_create($row['DOB']),date_create($todaydate));
		$sql = "UPDATE adhaardetail SET Age='$interval->y' WHERE id='$i'";
			$resultt = mysqli_query($db, $sql);
			//echo "your age: ".$interval->y."<br />";
		$i++;
	}
	/*************************************************************************************/

	if (isset($_POST['adhaar']))
	{
		$new_mail = $decryption;
	$aadhar = mysqli_real_escape_string($db, $_POST['textboxx']);
	$_SESSION["adharnumber"] = $aadhar;

	$result=mysqli_query($db,"SELECT * FROM adhaardetail where Adhaarno='$aadhar'");
	$num=mysqli_fetch_array($result);

	if (empty($aadhar)) 
	{
			array_push($errors, "Aadhaar is required");
	}

	else if($num==0) 
	{
			array_push($errors, "Aadhaar doesnt exists");
	}

	else if($num['Age']<18)
	{
			array_push($errors, "Not eligible for voting");	
	}
	else if($num['Age']>18)
	{
			array_push($errors, "You are not Eligible");
	}

	else if($new_mail != $num['email'])
	{
			array_push($errors, "Your email ID is not the one in your aadhar card. Plz change your email id.");	
	}

	if (count($errors) == 0)
		{
			//$result1 = mysqli_query($db,"SELECT * FROM adhaardetail where Adhaarno='$aadhar'");
			//$num1 = mysqli_fetch_array($result1);
			$otp = rand(1000,9999);
			;
			// Send OTP
			require_once("otp.php");
			$mail_status = sendOTP($num['email'],$otp);
			//print($mail_status);
			if($mail_status == 1) {
			$insert = mysqli_query($conn,"INSERT INTO otp(otpnumber,expired) VALUES ('$otp', '0')");
			$current_id = mysqli_insert_id($conn);
			if(!empty($current_id)) 
			{
				$success=1;
			}
			}

			$ID = $num["id"];
	        $Mobile = $num["Mobileno"];
	        $Gender = $num["Sex"];
	        $number = $num["Adhaarno"];
	        
	        $x=$number;
	        $_SESSION["varr"]=$x;
	        /*if(isset($_SESSION['varr'])){
	        	//echo "session set";
	        }
	        else{
	        	echo "session not set";
	        }*/
			//header("location: structure.php");
			
			$set = 1;
		
	         //otp();
       }

	}

	if(!empty($_POST["submit_otp"])) 
	{ 	
		$number_of_otp = mysqli_real_escape_string($conn, $_POST['otp']);

		$getotp = mysqli_query($conn,"SELECT * FROM otp WHERE otpnumber='$number_of_otp' AND expired!=1");
		$check = mysqli_fetch_array($getotp);
		$count  = mysqli_num_rows($getotp);

		error_reporting(0);
		$dt = date_create(($check['created']));

		$curdate = date('Y-m-d H:i:s');
		//echo $curdate;
		$date1 = date_create($curdate);
		//date_modify($date1, "+330 MINUTE");

		DATE_ADD($dt,date_interval_create_from_date_string("40 SECOND"));
		if(date_format($date1, "Y-m-d H:i:s") > date_format($dt, "Y-m-d H:i:s"))
		{	
			array_push($errors, "OTP timed out. Plz select your aadhar number and submit again");
			$result1 = mysqli_query($conn,"DELETE FROM otp WHERE otpnumber = '$number_of_otp'");
			$truee = 1;
		}
		elseif(!empty($count)) 
		{
			//print("otp accepted");
			//$result = mysqli_query($conn,"UPDATE otp SET expired = 1 WHERE otpnumber = '$number_of_otp'");
			$result1 = mysqli_query($conn,"DELETE FROM otp WHERE otpnumber = '$number_of_otp'");
			$truee = 1;
			$success = 2;
			header("location: structure.php"); 

		} 
		else 
		{
			$success =1;
			array_push($errors, "Invalid OTP");
		} 
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<title>Registration system PHP and MySQL</title>
	<link rel="title icon" type="image/png" href="images/title-img.png"/>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>

	 <style>
			
	*{
	margin: 0px;
	padding: 0px;
}
body {

		
		background-size : cover;
		background-position : center;
		background-repeat: no-repeat;
		height : 100vh;
		width : 100vw;
		font-size: 120%;
	
}
.form-container {
	position : relative;
	top : -3%;
}
/*Style to header class in admin and index page*/
.header {
	//width: 30%;
	margin: 0 auto;
	color: white;
	background: #5F9EA0;
	text-align: center;
	border: 1px solid #B0C4DE;
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
	padding: 20px;
}

form, .content {
	//width: 30%;
	margin: 0px auto;
	padding: 20px;
	border: 1px solid #B0C4DE;
	background: white;
	border-radius: 0px 0px 10px 10px;
	
}

/*Style to input details in form*/
.input-group {
	margin: 10px 0px 10px 0px;
}

.input-group label {
	display: block;
	text-align: left;
	margin: 3px;
}
.input-group input {
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
/*END*/

/*style button*/
.btn {
	padding: 10px ;
	font-size: 15px;
	color: white;
	background: #5F9EA0;
	border: none;
	border-radius: 5px;
}
.error {
	width: 92%; 
	margin: 0px auto; 
	padding: 10px; 
	border: 1px solid #a94442; 
	color: #a94442; 
	background: #f2dede; 
	border-radius: 5px; 
	text-align: left;
}
.success {
	color: #3c763d; 
	background: #dff0d8; 
	border: 1px solid #3c763d;
	margin-bottom: 20px;
}

input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}

.ds{
	background-color: #00222f; 
	color: #b9b9b9;
}


/*Footer style*/
footer { 
  background: #00222f; 
 }

 /*Paragraph style*/
.para_col{
 	color: burlywood;
 }

/*Link Colors*/
a:link {
	font-color: black;
}

/*Color to Other Links*/
a.ack{
	color:#fff;
}
a.ack:hover{
	color:#blue;
}


/*Link of login page*/ 
a.link_col:hover{
	color:red;
}

hr.line{
	color: #fff;
	border:1px;
}

/*Color to h2*/
h2 > .detail { 
	color:#29b5ee;
	font-weight:bold;
	font-family:Calibri;
	font-size:20;
 }
h2 > .name { 
	color: #fff;
	font-weight:bold;
	font-family:Calibri;
	font-size:20;
	border-color: #fff;
}


/*End Footer style*/
span.hello {
	color:#fff;
	font-size: 55px;
}
	</style>
</head>
<body>
    <?php include('amaterasu.php')?>
	<div class="form-container  col-12 col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
	<div class="header">
		<h2>Home Page</h2>
	</div>

		<?php  if (isset($_SESSION['username'])) : ?>
			<form name="aadharr" id="idForm" method="post" action="">
				
				<?php include('errors.php'); ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p><br>
			
			<p>Do you have Aadhaar Card ?</p><br>
			
			<input type = "radio" value="Yes" name="check" id="a" onclick="idForm();">&nbsp;&nbsp;Yes

			<!--<input type = "radio" value="No" name="check" id="b" onclick="document.location.href='https://uidai.gov.in/'">&nbsp;&nbsp;No<br>-->

			<input type = "radio" value="No" name="check" id="b" onclick="idForm();">&nbsp;&nbsp;No<br>

			<div id="q" style="display:none;">
				Enter your adhaar number: <input type ="text" name="textboxx">
			</div>

			<?php
			$date2 = date_create("31st december");
			date_sub($date2,date_interval_create_from_date_string("1 year"));

				if (strtotime(date("j F Y")) > strtotime(date_format($date2,"Y-m-d")) and strtotime(date("j F Y")) < strtotime("31 may"))
				{ 
					echo'<button type="submit" class="btn" name="adhaar">Submit</button>';
	 			} 
				else{
					 echo'<input name="Disabled" type="button" disabled="disabled" value="Submit" />';
					}
			?>
			
			<!--<button type="submit" class="btn" name="adhaar">Submit</button><br>-->
			
			<?php
			error_reporting(0); 
			if($set == 1 )
			{
				echo "<p>We have sent an otp to your mail</p>";
				echo "<input type='text' name='otp' placeholder='Enter OTP'>";
				echo "<input type='submit' name='submit_otp'>";
			}
	
			//echo "</form>";
			?>
			<br>

			<a href="cngEmail.php" style="color: red;">Change Email</a>

			<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
			</form>
		<?php endif ?>

	<script>
		/*function dis() {                                                  //for yes and no
		var x = document.getElementById('a');
		if (x.checked){
			document.getElementById('q').style.display="block";
			document.getElementById('s').style.display="none";
		}
		else {

				document.getElementById('s').style.display="block";
				document.getElementById('q').style.display="none";
				//<?php// header('location: https://uidai.gov.in/'); ?>
		}
	}*/

	function idForm(){
   	var selectvalue = $('input[name=check]:checked', '#idForm').val();

		   	if(selectvalue == "Yes"){
			document.getElementById('q').style.display="block";
			document.getElementById('s').style.display="none";
			return true;
		}
		else if(selectvalue == "No"){
		//window.open('http://www.google.com','_self');
		document.location.href='https://uidai.gov.in/';
		return true;
		}

		return false;
	}

	</script>
	</div>
	<?php include('footer.php');?>
	
</body>
</html>
