<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
require_once 'configure.php';
$GLOBALS['comicid']=rand(1,2478);
$sql = "SELECT * FROM users";
if ($result = $con -> query($sql)) {
  while ($row = $result -> fetch_row()) {
    $name=$row[0];
    $email=$row[1];
   
$requesturl="https://xkcd.com/$comicid/info.0.json";
$json = file_get_contents($requesturl);
$obj=json_decode($json);
//echo $obj->title;
$alt= $obj->alt;
$comicimage=$obj->img; 
$mail = new PHPMailer(true);
try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = "ykram2019@gmail.com";                     //SMTP username
    $mail->Password   = "Lalitatej9802031499";                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('ykram2019@gmail.com');
    $mail->addAddress($email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = '<h1 style="color:#f40;">Hi '.$name.'</h1><br>';
    $mail->Body .= 'Embedded Image: <img alt='.$alt.' src='.$comicimage.'> Here is an image!';
    $mail->Body.='<p class="link"><a href="http://localhost/xkcdchallenge/unsubscribe.php?email='.$email.'" target="_blank">Click to unsubscribe</a>';
    $mail->send();
    echo 'Message has been sent to ';
    echo "$email";
} catch (Exception $e) { 
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
$result -> free_result();
}
?>