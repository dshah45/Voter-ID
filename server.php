<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('127.0.0.1:50131', 'azure', '6#vWHD_$', 'register');

	// REGISTER USER
	if (isset($_POST['reg_user'])) 
	{
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if ($password_1 != $password_2) 
		{
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) 
		{
			$uname = md5($username);
			$encryption_iv = '1234567891011121';
			$email_encryption = openssl_encrypt($email, "AES-128-CBC","param_encryption", 0, $encryption_iv);
			$password_encryption = openssl_encrypt($password_1, "AES-128-CBC","param_encryption", 0, $encryption_iv);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password) 
					  VALUES('$uname', '$email_encryption', '$password_encryption')";
			mysqli_query($db, $query);

			//$_SESSION['username'] = $username;
			//$_SESSION['success'] = "You are now logged in";
			?>
       			<script type="text/javascript">
        		alert("You are now registered!");
        		location="login.php";
        		</script>
        	<?php
		}

	}

	// LOGIN USER
	if (isset($_POST['login_user'])) 
	{
		$username3 = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username3)) 
		{
			array_push($errors, "Username is required");
		}
		if (empty($password)) 
		{
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) 
		{
			$encryption_iv = '1234567891011121';
			$pass_encryption = openssl_encrypt($password, "AES-128-CBC","param_encryption", 0, $encryption_iv);
			$username4 = md5($username3);
			$query = "SELECT * FROM users WHERE username='$username4' AND password='$pass_encryption'";
			$results = mysqli_query($db, $query);

				

			if (mysqli_num_rows($results) == 1) 
			{
				$_SESSION['username'] = $username3;
 				$_SESSION['enc_username'] = $username4;
				$_SESSION['success'] = "You are now logged in";
				header('location: index1.php');
			}
			else 
			{
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	// ADMIN USER
	if (isset($_POST['admin_user'])) {
		$username1 = mysqli_real_escape_string($db, $_POST['username']);
		$password1 = mysqli_real_escape_string($db, $_POST['password']);;

		if (empty($username1)) {
			array_push($errors, "Username is required");
		}
		if (empty($password1)) {
			array_push($errors, "Password is required");
		}

		if($username1 == "john123" && $password1 == "123456789")
		{
			$_SESSION['username1'] = $username1;
			$_SESSION['success1'] = "You are now logged in";
			header('location: adminhome.php');
		}

			else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	
	// CHANGE PASSWORD
	if (isset($_POST['cp_user']))
	{
	$username2 = mysqli_real_escape_string($db, $_POST['user_name']);
	$currpass = mysqli_real_escape_string($db, $_POST['currentPassword']);
	$newpass = mysqli_real_escape_string($db, $_POST['newPassword']);
	$confirmpass = mysqli_real_escape_string($db, $_POST['confirmPassword']);
	
	$encuname = md5($username2);

	$resultt=mysqli_query($db,"SELECT password FROM users where username='$encuname'");
	$num=mysqli_fetch_array($resultt);
	if (empty($username2)) 
	{
			array_push($errors, "Username is required");
	}

	else if (empty($currpass)) 
	{
			array_push($errors, "Password is required");
	}

	else if(empty($newpass)) 
	{
			array_push($errors, "Password is required");
	}

	else if(empty($confirmpass)) 
	{
			array_push($errors, "Password is required");
	}

	else if($num['password']!=md5($currpass)) 
	{
			array_push($errors, "Password are not same");
	}

	else if($newpass!=$confirmpass) 
	{
			array_push($errors, "Password doesnt match");
	}

	else if($num==0) 
	{
			array_push($errors, "username doesnt exists");
	}

	if (count($errors) == 0)
	{
    	$newpass1=md5($newpass);
    	if($newpass=$confirmpass)
    	{
        	$sql=mysqli_query($db,"UPDATE users SET password='$newpass1' WHERE username='$encuname'");
        	if($sql)
        	{		
        	  ?>
       			<script type="text/javascript">
        		alert("Password Changed successfully!");
        		location="login.php";
        		</script>
        	  <?php
				//$flag=1;
        	}
        	/*if($flag==1)
        	{		

				header("location: login.php");
        	}*/
    	}
	}
}

/* For Change Email ID */

if (isset($_POST['cem_user']))
{
	$db1 = mysqli_connect('127.0.0.1:50131', 'azure', '6#vWHD_$', 'adhaar');
	$emailid = mysqli_query($db1, "SELECT email FROM adhaardetail WHERE Adhaarno = '".$_SESSION['adharnumber']."'");
	$mail = mysqli_fetch_array($emailid);

	unset($_SESSION['adharnumber']);

	$curremail = mysqli_real_escape_string($db, $_POST['Cemailid']);
	$newemail = mysqli_real_escape_string($db, $_POST['Nemailid']);
	//$newpass = mysqli_real_escape_string($db, $_POST['newPassword']);
	//$confirmpass = mysqli_real_escape_string($db, $_POST['confirmPassword']);

	$cngemail = mysqli_query($db,"SELECT email FROM users WHERE username = '".$_SESSION['username']."'");
	$row = mysqli_fetch_array($cngemail);
	if (empty($curremail)) 
	{
			array_push($errors, "Email is required");
	}

	else if (empty($newemail)) 
	{
			array_push($errors, "Email is required");
	}

	else if($row['email'] != $curremail) 
	{
			array_push($errors, "Your current email id is different");
	}

	else if($newemail != $mail['email']) 
	{

			array_push($errors, "Your new email doesn't match with your adhaar's email");
	}

	if (count($errors) == 0)
	{
        	$sql1 = mysqli_query($db,"UPDATE users SET email='$newemail' WHERE username = '".$_SESSION['username']."'");
        	if($sql1)
        	{		
        		?>
       			<script type="text/javascript">
        		alert("You have successfully changed your email!");
        		location="index1.php";
        		</script>
        	  <?php
    		}	
    }
}
?>
