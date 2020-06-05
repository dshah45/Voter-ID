<?php 
 function sendOTP($email,$otp) {
  require('phpmailer/class.phpmailer.php');
  require('phpmailer/class.smtp.php');
 
  $message_body = "One Time Password for PHP login authentication is:<br/><br/>" . $otp;
  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPDebug = 0;
  $mail->SMTPAuth = TRUE;
  $mail->SMTPSecure = 'tls'; // tls or ssl
  $mail->Port     = "587";
  $mail->Username = "voterid921@gmail.com";
  $mail->Password = "voter019";
  $mail->Host     = "smtp.gmail.com";
  $mail->Mailer   = "smtp";
  $mail->SetFrom("voterid921@gmail.com", "Dhruv Shah");
  $mail->AddAddress($email);
  $mail->Subject = "OTP to Login";
  $mail->MsgHTML($message_body);
  $mail->IsHTML(true);  
  $result = $mail->Send();
  return $result;
 }
?>