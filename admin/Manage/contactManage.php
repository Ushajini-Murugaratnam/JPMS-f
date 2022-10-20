<?php 
session_start();
include('../../database/connect.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php';

function sendemail_jobCatCreate($first_name,$last_name,$phone,$email,$message,$tittle)
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
        $mail->addCC('jobusha94@gmail.com');
        $mail->addAddress($email);     //Add a recipient
    
        $mail->isHTML(true);    
        $mail->Subject = 'New contact Message from:-'.$first_name;
        $email_templete='Dear '.$first_name.'<br>
Welcome to JPMS,<br> you are sucessfully add Category our page.
<b>First Name is :-</b>'.$first_name.'<br>
<b>Last name  ID is :-</b>'.$last_name.'<br>
<b>email  ID is :-</b>'.$email.'<br>
<b>phone is :-</b>'.$phone.'<br>
<b>Message  Tittle ID is :-</b>'.$tittle.'<br>
<b>Message  ID is :-</b>'.$message.'<br>
<br><br>
 you are having trouble with your account, please contact us at jobusha94@gmail.com and we will be happy to help you
<br>Regards,
<br>The support team at JPMS
<br>Follow us on
<br>The JPMS,
<br>http://localhost/JPMS-f/index.php';
                   
        $mail->Body= $email_templete;
        $mail->send();
    }catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }     
    //  echo 'Message has been sent';
    }
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$message=$_POST['message'];
	$tittle=$_POST['tittle'];
    $insert="INSERT INTO contact_us(first_name,last_name, phone,email, message,tittle)
    VALUES('$first_name','$last_name','$phone', '$email', '$message','$tittle')";
	if(mysqli_query($con,$insert))
    { 
		$_SESSION['sucess']="message sned sucessfully";
		 header('Location:../../contact.php');
		sendemail_jobCatCreate("$first_name","$last_name","$phone","$email","$message","$tittle");
	 }else
	{
		$_SESSION['status']="try again";
		header("location: ../../index.php");
		}
	?>