<?php
  
  //$username = "";
  //$email    = "";
  //$textboxx = "";
  //$var = "";
  $errors = array(); 
  $_SESSION['success'] = "";

  // connect to database
      $db = mysqli_connect('127.0.0.1:49489', 'azure', '6#vWHD_$', 'adhaar');
?>
<?php

$result2 = mysqli_query($db,"SELECT * FROM adhaardetail WHERE Mobileno = '".$_SESSION['varr']."' ");

      while($row=mysqli_fetch_array($result2)){

          ?>
          <table>
    
    <tr>
      <th>ELECTOR'S NAME : </th>
      <td><?php echo strtoupper($row["Mobileno"]); ?></td>
   
        </table>
        <?php    
    }

?>
<html >
   <head>
      <meta charset="UTF-8">
   </head>
   <body>
      <h2>Register Here </h2>
      <form action="action_otp.php" method="post">
         Phone Number:<br>
         <input type="submit" value="Submit">
      </form>
   </body>
</html>