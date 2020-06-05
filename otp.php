<!--<?php
//$errors = array(); 
//$_SESSION['success'] = "";
  // connect to database
//$db = mysqli_connect('localhost', 'root', '', 'adhaar');
//$db1 = mysqli_connect('localhost', 'root', '', 'otp');
?>-->
<?php
//Added database connection
//Import the sql file given in instruction
 function sendOTP($email,$otp){
require "phpmailer/PHPMailerAutoload.php";
require('phpmailer/class.phpmailer.php');
  require('phpmailer/class.smtp.php');
//Setup   
$mail=new PHPMailer;
   $mail->isSMTP();                                            // Send using SMTP
   $mail->SMTPDebug = 0;
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'voterid921@gmail.com';                     // SMTP username
    $mail->Password   = 'voter019';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;              
//Mail adding                      
$mail->setFrom("voterid921@gmail.com");//FROM
$mail->AddAddress($email);

/*$sql="select * from adhaardetail where Age = 18";  
$res=mysqli_query($db,$sql);
if(mysqli_num_rows($res))
{
    $mail->addReplyTo("voterid921@gmail.com");
    while($x=mysqli_fetch_assoc($res))
    {
        $mail->addBCC($x['email']);
    }*/
    // Content
    $mail->isHTML(true);  // Set email format to HTML
//Added your custom subject
    $mail->Subject = 'This is file sending mail';
//Added your custom body
    $mail->Body    = 'Your OTP is '.$otp;
    $mail->AltBody = 'This is for non-html content';
    $result = $mail->send();
    return $result;
}
?>
<!--<html>
<body>
    <div class="input-group">
           <input type="button" value="Home" onclick="window.location.href='display.php'" />
        </div>
    </body>
    </html>-->
