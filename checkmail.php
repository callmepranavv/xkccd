


  <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'libs/PHPMailer.php';
require 'libs/Exception.php';
require 'libs/SMTP.php';
require'configure.php';

$GLOBALS['comicid']=rand(1,2478);

$sql = "SELECT * FROM users";
if ($result = $con -> query($sql)) {
  while ($row = $result -> fetch_row()) {
    $name=$row[0];
    $email=$row[1];
   
$requesturl="https://xkcd.com/$comicid/info.0.json";
$json = file_get_contents($requesturl);
$obj=json_decode($json);
$title=$obj->title;
$alt= $obj->alt;
$comicimage=$obj->img; 
$mail = new PHPMailer(true);
try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = "purposetest957@gmail.com";                     //SMTP username
    $mail->Password   = "purposetest@4418291";                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('purposetest957@gmail.com');
    $mail->addAddress($email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'XKCD comics';
    $mail->Body    = '<h3>Hi'.$name.',Here is a Random comic.</h3><br>';
     $message  = "<html><body>";
    $message .= "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
   
    $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
   
    $message .= "<tr><td>";
   
    $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
    
  $message .= "<thead>
  <tr height='80'>
  <th style='background-color:rgb(19, 0, 128);; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#ecf0f3; font-size:34px;' >$obj->title</th>
  </tr>
             </thead>";
    
  $message .= "<tbody>
             <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
       <td style='background-color:#00a2d1; text-align:center;'>";
       
       $message.= '<img alt='.$alt.' src='.$comicimage.'>';
       $message.=" </td>
       </tr>
    
      
              </tbody>";
    
$message .= "</table>";
   
$message .= "</td></tr>";
$message .= "</table>";
$message .='<p class="link"><a href="https://xkcdmail1.herokuapp.com/unsubscribe.php?email='.$email.'" target="_blank">Click to unsubscribe</a>';

$message .= "</body></html>";

    $mail->Body .=$message;
  
  
  
    $mail->addStringAttachment(file_get_contents("$comicimage"), "$obj->title.png");
 
   
    $mail->send();
    echo 'Message has been sent to ';
    echo "$email";
     $mail->clearAttachments();
     $mail->ClearAllRecipients();
} catch (Exception $e) { 
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
$result -> free_result();
}


?>
