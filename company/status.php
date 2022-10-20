
<?php
include("..\database\connect.php");



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

function sendemail_message($status,$id)
{
try{
    $mail = new PHPMailer(true);
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'jobusha94@gmail.com';                     //SMTP username
    $mail->Password   = 'dkczixhahzebixry';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS
    //Recipients
    $mail->setFrom('jobusha94@gmail.com');
    $mail->addAddress('jobusha94@gmail.com');     //Add a recipient
    $mail->Subject ='job Application STATUS messsgae';

    $email_templete='Dear Sir/Madam<br> <p> Welcome to <strong> JPMS,</strong></br>
    you are sucessfully update our page,affter you can login your account.
  
      "status = 1 select ,0- reject"
              application id :- '.$id.' 
                  Applicaton status is :-   '.$status.',
          
            The JPMS,<br>
            http://localhost/JPMS-f/index.php';                      //Set email format to HTML
    $mail->Body= $email_templete;   
    $mail->send();

}catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}     
  //  echo 'Message has been sent';
}
    



$id = $_GET['ap_id'];
$status=$_GET['status'];

$q="UPDATE tbl_job_application set status=$status where ap_id=$id";
mysqli_query($con,$q);
sendemail_message("$status","$id");
header('Location:appliedJob.php')
?>