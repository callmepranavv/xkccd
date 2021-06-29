<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'libs/PHPMailer.php';
require 'libs/Exception.php';
require 'libs/SMTP.php';
$mail = new PHPMailer(true);

try {       
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       ='smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = "purposetest957@gmail.com";                     //SMTP username
    $mail->Password   = "purposetest@4418291";                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
    //Recipients
    $mail->setFrom('purposetest957@gmail.com');
    $mail->addAddress($_SESSION['email']);     //Add a recipient

    //Content
    $otp=rand(1,1000);
    $_SESSION['otp1']=$otp;
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'verify your email';
    $mail->Body    = 'Verification OTP is <br>'.$otp;
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
