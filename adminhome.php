<?php 
$errors = array(); 
 $_SESSION['success'] = "";
  // connect to database
$db = mysqli_connect('127.0.0.1:50131', 'azure', '6#vWHD_$', 'adhaar'); 
?>
<?php 
	session_start(); 

	if (!isset($_SESSION['username1'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username1']);
		header("location: login.php");
	}

	$check = null

?>
<!DOCTYPE html>
<html>
<head>
	
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>

	<title>Home</title>
<link rel="stylesheet" type="text/css" href="style1.css">
	
</head>
<body style="background-color:#c4d3f6;">
	<!--<div class="header container-fluid">-->
<!--</div>-->
	<!--<div class="content container-fluid">-->

		<!-- notification message -->
		<?php if (isset($_SESSION['success1'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success1']; 
						unset($_SESSION['success1']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username1']) && ($_SESSION['username1']=="john123")) : ?>
			
			<center><p>Welcome <strong><?php echo $_SESSION['username1']; ?></strong></p></center><br>
			 <center>
    			<h1>ADHAAR DATABASE</h1><br><br>
    			
    			<table border="1">
        			<tr>
           				<th>ID</th>
            			<th>Email Id</th>
            			<th>Age</th>
        			</tr>

<?php

$result = mysqli_query($db,"SELECT * FROM adhaardetail where Age = 18");
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['Age'] . "</td>";


echo "</tr>";
}

?>        
<?php endif ?>
</center>
    </table><br>
    <br><br>
    <?php
        $date2 = date_create("31st december");
			date_sub($date2,date_interval_create_from_date_string("1 year"));

				if (strtotime(date("j F Y")) > strtotime(date_format($date2,"Y-m-d")) and strtotime(date("j F Y")) < strtotime("30th June"))
				{ ?>
					<input type="button"  class="btn" value="Send Mail" onclick="window.location.href='sendemail.php'" />';
					<?php
	 			}
	 			else{
					 echo'<input name="Disabled" style="background-color:; border:10"  type="button" disabled="disabled" value="Submit" />';
					}
	 ?>
    <!--<input type="button"  class="btn" value="Send Mail" onclick="window.location.href='e.php'" />
    </div>-->
    <p> <center><a href="index.php?logout='1'" style="color: red;">Logout</a></center> </p>
  </div>
</body>
</html>