<?php session_start(); ?>
<!--<?php //error_reporting(0); ?>-->
<?php
  
  //$username = "";
  //$email    = "";
  //$textboxx = "";
  //$var = "";
  $errors = array(); 
  $_SESSION['success'] = "";

  // connect to database
      $db = mysqli_connect('127.0.0.1:50131', 'azure', '6#vWHD_$', 'adhaar');
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <style>
.img2 {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 150px;
  float: right;
  margin-bottom: 20px;
}
img.imag3{
  width: 15%;
}

h5{
  text-align: center;
  margin-top: 11px;
}
.t1{
  text-align: center;
  border:0px;
}
.t2{
  text-align: center;
  border:0px;
  margin-top: -54px;
}
.t3{
   text-align: center;
  border:0px;
  margin-left: 51px;
}
.t4{
  text-align: center;
  border:0px;
  margin-left: 32px;
}
</style>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <form action="" method="POST" enctype="multipart/form-data" style="position: absolute; left:40%; margin-left: -50px;">
    <!--<button type="submit" class="btn" name="hello">Show</button>-->
    <?php include('errors.php'); ?>
  
       <div class="container" style="padding-top: 45px;">
        <div class="card" style="width:600px">
         <h5>भारत निर्वाचन आयोग</h5>
         <center>
         <p><img src="0.jpg" alt="logo" align="left" class="image1" style="width:12%";> <b>ELECTION COMMISSION</b> &nbsp;&nbsp;<img src="nvsp.jpg" alt="logo1" align="right" class="imag3"></p>
         </center>
         <p style="text-align: center; font-size: 14px; margin-bottom: 3px;"><b>फोटो पहचान पत्र</b>&nbsp;&nbsp;<b>PHOTO IDENTITY CARD&nbsp;&nbsp;</b></p>
        
          <div class="card-body">
            
              
            
          <!--<img src="download.png" alt="logo1" class="center"></p>-->

    <?php
          if(isset($_POST["insert"]))  
          { 
            $filename = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $folder = "uploads/".$filename;
            $fileext = explode('.', $filename);
            $filecheck = strtolower(end($fileext));
            $fileextstored = array('png', 'jpg', 'jpeg');

            if(in_array($filecheck, $fileextstored))
            {
                //$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
                move_uploaded_file($tempname, $folder);
    
                $que = "UPDATE adhaardetail SET imgname='$folder' WHERE Adhaarno = '".$_SESSION['varr']."'";  
                $query= mysqli_query($db,$que);

              /*$result2 = mysqli_query($db,"SELECT imgname FROM adhaardetail WHERE Adhaarno = '".$_SESSION['varr']."' "); 
                while($row = mysqli_fetch_array($result2))  
                {  
                  //echo "hello";
                     ?>  
                          <tr>  
                               <td>  
                                    <center><img src=" <?php echo $row['imgname']; ?>" height="200" width="200" class="img-thumnail" />  </center>
                               </td>  
                          </tr>  
                     <?php             
                }*/ 
            }
           }
          $result1 = mysqli_query($db,"SELECT imgname FROM adhaardetail WHERE Adhaarno = '".$_SESSION['varr']."' "); 
          while($row = mysqli_fetch_array($result1))  
          {  
              if($row[0]!="")
              {
                ?>  
                  <tr>  
                      <td>  
                          <center><img src=" <?php echo $row['imgname']; ?>" height="200" width="200" class="img-thumnail" />  </center>
                      </td>  
                  </tr>  
                <?php 
              }
              else
              {
                ?>  
                  <tr>  
                      <td>  
                          <center><img src=" <?php echo 'download.png'; ?>" height="200" width="200" class="img-thumnail" />  </center>
                      </td>  
                  </tr>  
                <?php 
              }
          }
?>

         <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="image" id="image"/>  </center>
            <br />  
          <center><input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" onclick="save()" /> </center> 

         <!--<script type="text/javascript">
            function disable()
            {
                 document.getElementById("image").disabled = true;
            }
          </script>-->
       <script>

 $(document).ready(function(){ 
       $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>

          <br>

          <style type="text/css">
            .center {
                      display: block;
                      margin-left: auto;
                      margin-right: auto;
                      width: 40%;
                    }
                     a{
                      margin-top: 5px;
                    }
                  
          </style>

<?php

      $result = mysqli_query($db,"SELECT Age FROM adhaardetail WHERE Adhaarno = '".$_SESSION['varr']."' ");
      $num=mysqli_fetch_array($result);

     $adharcardnumber = $num['Age'];
      if($adharcardnumber < 18)
      {
          echo "You are still not eligible for voting";
      }

      $result2 = mysqli_query($db,"SELECT id,Name,Fname,Adhaarno,Mobileno,DOB,Sex,Age,Address FROM adhaardetail WHERE Adhaarno = '".$_SESSION['varr']."' ");

      while($row=mysqli_fetch_array($result2)){

          ?>
          <table>
    
    <tr>
      <th width="30%">ELECTOR'S NAME : </th>
      <td><?php echo strtoupper($row["Name"]); ?></td>
    </tr>
    <tr>
      <th>FATHER'S NAME : </th>
      <td><?php echo strtoupper($row["Fname"]); ?></td>
    </tr>
    <tr>
      <th>SEX : </th>
      <td><?php echo strtoupper($row['Sex']); ?></td>
    </tr>
     <tr>
      <th>DATE OF BIRTH </th>
      <td><?php echo $row['DOB']; ?></td>
    </tr>
     <tr>
        <th>ADDRESS :</th>
      <td><?php echo $row['Address']; ?></td>
    </tr>
      
        </table>
        <?php    
    }
?>

 </div>
    <p> <center><a class="d" href="pdftry.php" download style="color: red;">Download PDF</a></center> 
     <a href="index.php?logout='1'" style="color: red;text-align: center;">Logout</a></p>
    
  </div>
  </div>
 
</body>
</html>