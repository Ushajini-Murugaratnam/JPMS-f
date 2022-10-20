<?php
session_start();
include'../../database/connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php';

function sendemail_message($send_email,$seeker_email,$message)
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
    $mail->addCC('jobusha94@gmail.com',$send_email);
    $mail->addAddress($seeker_email);     //Add a recipient
    $mail->Subject ='messsgae ddd';

    $email_templete='Here is the company message link </b>,';   
    $message_templete =$message;                           //Set email format to HTML
    $mail->Body= $email_templete;
    $mail->Body=  $message_templete ;       
    $mail->send();

}catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}     
  //  echo 'Message has been sent';
}

//insert
if(isset ($_POST['register_btn']))
{
    $company_id=$_POST['company_id'];
    $send_email=$_POST['send_email'];
    $seeker_id=$_POST['seeker_id'];
    $seeker_email=$_POST['seeker_email'];
    $message=$_POST['message'];
    $mobile=trim($_POST['mobile']);
    $mobilec='/^[0-9]{10,10}$/';
    $job_tittle=$_POST['job_tittle'];

    if(preg_match($mobilec,$mobile))
        {
            $insertSql="INSERT INTO message (company_id,seeker_id,send_email,seeker_email,message,mobile,job_tittle)
            VALUES('$company_id','$seeker_id','$send_email','$seeker_email','$message','$mobile','$job_tittle')";
            $query_run=mysqli_query($con,$insertSql);          
            if($query_run){  
                sendemail_message("$send_email","$seeker_email","$message");
                header('Location:../message.php');
            }else{
                $_SESSION['status']="please check database";
                header('Location:../message.php');
            }
        }else
        {
            $_SESSION['mobile_status']="mobile wrong please check";
            header('Location:../message.php');
        }    
}
