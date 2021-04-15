<?php
$errors = array(); 
$_SESSION['success'] = "";
  // connect to database
$db = mysqli_connect('localhost', 'root', '', 'adhaar');
?>
<?php
//Added database connection
//Import the sql file given in instruction

require "phpmailer/PHPMailerAutoload.php";
//Setup   
$mail=new PHPMailer;
   $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'voterid921@gmail.com';                     // SMTP username
    $mail->Password   = 'voter019';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;              
//Mail adding                      
$mail->setFrom("voterid921@gmail.com");//FROM

$sql="select * from adhaardetail where Age = 18";
$res=mysqli_query($db,$sql);
if(mysqli_num_rows($res))
{
    $mail->addReplyTo("voterid921@gmail.com");
    while($x=mysqli_fetch_assoc($res))
    {
        $mail->addBCC($x['email']);
    }
    // Content
    $mail->isHTML(true);  // Set email format to HTML
//Added your custom subject
    $mail->Subject = 'Voter-Id';
//Added your custom body
    $mail->Body    = '<h1>Congratulations! You are now Eligible for applying Voter-Id. Visit our portal https://voter-id.azurewebsites.net/ for your Voter-Id.</h1>';
    $mail->AltBody = 'This is for non-html content';
    if($mail->send())
    {   ?>
        <script type="text/javascript">
        alert("Email Sent");
        location="adminhome.php";
        </script>
        <?php
    }
    else
    echo "Failure";
}
else
{
    echo "No data found";
}
?>
<!--<html>
<body>
    <div class="input-group">
           <input type="button" value="Home" onclick="window.location.href='display.php'" />
        </div>
    </body>
    </html>-->
