<?php
session_start();
include('../../database/connect.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php';

function sendemail_verify($seeker_fname,$email,$verify_token,$password,$seeker_lname)
{
try{
        $mail = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'jobusha94@gmail.com';                     //SMTP seeker_lname
        $mail->Password   = 'dkczixhahzebixry';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS
        //Recipients
        $mail->setFrom('jobusha94@gmail.com',$seeker_fname);
        $mail->addAddress($email);     //Add a recipient
    
        $mail->isHTML(true);    
        $mail->Subject = 'Your JPMS verification code'.$seeker_fname;
        $email_templete='Dear '.$seeker_fname.'<br>
Welcome to JPMS,<br> you are sucessfully Register our page,<br> now once you click on verification link. affter you can login your account.
Here is the Register verification link<b>  <a href="http://localhost/JPMS-f/seeker/verify_email.php?token='.$verify_token.'"> click me </a></b> token  <br>
<b>full name is :-</b>'.$seeker_fname.'<br>
<b>your seeker_lname is :-</b>'.$seeker_lname.'<br>
<b>your password is :-</b>'.$password.'<br>
<b>your email is :-</b>'.$email.'<br>
<br><br>
If you did not sign up for this account, or you are having trouble with your account, please contact us at jobusha94@gmail.com and we will be happy to help you
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
    
     
   
//insert
if(isset ($_POST['register_btn']))
{
    $seeker_fname=$_POST['seeker_fname'];
    $seeker_lname=$_POST['seeker_lname'];
    $email=$_POST['email'];
    $mobile=trim($_POST['mobile']);
    $mobilec='/^[0-9]{10,10}$/';
    $verify_token=md5(rand());
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];
    $create_time=date("Y-m-d H:i:s");  
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $path = "../../files/".$fileName; 
    $result = mysqli_query($con,"SELECT * FROM tbl_seeker WHERE email='$email'");
    $num_rows = mysqli_num_rows($result);
    if ($num_rows) {
        $_SESSION['email_status']= "alredy added email, try new one";
        header("location: ../seekerDetails.php"); 
    }elseif($password === $confirmpassword)
        {
        if(preg_match($mobilec,$mobile))
            {
                $insertSql="INSERT INTO tbl_seeker(seeker_fname,seeker_lname, mobile,email, password,create_time,verify_token,fileName)
                VALUES('$seeker_fname','$seeker_lname','$mobile', '$email', '$password','$create_time','$verify_token','$fileName')";
                $query_run=mysqli_query($con,$insertSql);          
                if($query_run){  
                    
				move_uploaded_file($fileTmpName,$path);
                    sendemail_verify("$seeker_fname","$email","$verify_token","$password","$seeker_lname"); 
                    header('Location:../index.php');     
                    $_SESSION['sucess']="Sucessfully Register, plese conform your verification mail";
                }else{
                    $_SESSION['status']="please check database";
                    header('Location:../seekerDetails.php');
                }
            }else
            {
                $_SESSION['mobile_status']="mobile wrong format, please check";
                header('Location:../seekerDetails.php');
            }}else
            {
                $_SESSION['password_status']="conform password  and password are diffrent value, please check";
                header('Location:../seekerDetails.php');
            }
    
}

