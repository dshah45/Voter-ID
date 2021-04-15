<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
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
			/* amaterasu.php navbar */
.			/* amaterasu.php navbar */
.navbar {
//height : 15%;
//background-color: #456987;
}
/*.nav-item {
padding : 25px 0 0;
}*/
.image1 {
height : 75px;
width : 75px;
}

*{
	margin: 0px;
	padding: 0px;
}
	
	
}
.form-container {
	position : relative;
	top : 25%;
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
	<?php include('amaterasu.php')?><br><br>
	<div class="form-container  col-12 col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
	<div class="header">
		<h2>Change Email</h2>
	</div>
	
	<form name="frmChange" method="post" action="">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Current Email-ID</label>
			<input type="email" name="Cemailid">
		</div>
		<div class="input-group">
			<label>New Email-ID</label>
			<input type="email" name="Nemailid">
		</div>
		<!--<div class="input-group">
			<label>New Password</label>
			<input type="password" name="newPassword">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="confirmPassword">
		</div>-->
		<div class="input-group">
			<button type="submit" class="btn" name="cem_user">submit</button>
		</div>
	</form><br><br>
</div>
	<?php include('footer.php');?>

</body>
</html>