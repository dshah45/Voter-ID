<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
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
	font-size: 19px;
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
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: #007bff;
  color: white;
  cursor: pointer;
  padding: 0px;
  border-radius: 50%;
  height: 50px;
  width: 50px;


}

#myBtn:hover {
    background-color: #000000;
     opacity:1;
     transition: 0.5s;
  -moz-transition: 0.5s;
  -webkit-transition: 0.5s;
  -o-transition: 0.5s; 
}

/* amaterasu.php style ends */
		</style>
		
</head>
<body>
	
	<?php include('amaterasu.php')?><br><br>
<div class="form-container  col-12 col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
	
	<div class="header">
		<h2>Register</h2>
	</div>

	<form method="post" action="register.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p style="font-size:19px;">
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form><br><br>
</div>
<button onclick="topFunction()" id="myBtn"><i class="fas fa-arrow-up"></i></button>
<?php include('footer.php');?>
<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}

//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}



</script>
</body>
</html>