<?php
session_start();
include('../../database/connect.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php';

function sendemail_verify($fullname,$email,$verify_token,$password,$username)
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
        $mail->setFrom('jobusha94@gmail.com',$fullname);
        $mail->addAddress($email);     //Add a recipient
    
        $mail->isHTML(true);    
        $mail->Subject = 'Your JPMS verification code'.$fullname;
        $email_templete='Dear '.$fullname.'<br>
Welcome to JPMS,<br> you are sucessfully Register our page,<br> now once you click on verification link. affter you can login your account.
Here is the Register verification link<b>  <a href="http://localhost/JPMS-f/admin/verify_email.php?token='.$verify_token.'"> click me </a></b> token  <br>
<b>full name is :-</b>'.$fullname.'<br>
<b>your username is :-</b>'.$username.'<br>
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
    
    function sendemail_update($fullname,$email,$password,$username)
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
            $mail->setFrom('jobusha94@gmail.com',$fullname);
            $mail->addAddress($email);     //Add a recipient
        
            $mail->isHTML(true);    
            $mail->Subject = 'Your Account Update Details '.$fullname;
            $email_templete='Dear Sir/Madam<br> <p> Welcome to <strong> JPMS,</strong></br>
                you are sucessfully update our page,affter you can login your account.
                <br>
                    <b> your full name is :-</b>'.$fullname.'<br>
                    <b>   your username is :-</b>'.$username.'<br>
                    <b>   your password is :-</b>'.$password.'<br>
                    <b>  your email is :-</b>'.$email.'<br>
                The JPMS,<br>
                http://localhost/JPMS-f/index.php';     
                       
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
    $fullname=$_POST['fullname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $mobile=trim($_POST['mobile']);
    $mobilec='/^[0-9]{10,10}$/';
    $verify_token=md5(rand());
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];
    $create_time=date("Y-m-d H:i:s");  
    $result = mysqli_query($con,"SELECT * FROM tbl_admin WHERE email='$email'");
    $num_rows = mysqli_num_rows($result);
    if ($num_rows) {
        $_SESSION['email_status']= "alredy added email, try new one";
        header("location: ../register.php"); 
    }elseif($password === $confirmpassword)
        {
        if(preg_match($mobilec,$mobile))
            {
                $insertSql="INSERT INTO tbl_admin(fullname,username, mobile,email, password,create_time,verify_token)
                VALUES('$fullname','$username','$mobile', '$email', '$password','$create_time','$verify_token')";
                $query_run=mysqli_query($con,$insertSql);          
                if($query_run){  
                      
                    $_SESSION['sucess']="Sucessfully Register, plese conform your verification mail";
                    header('Location:../index.php');
                    sendemail_verify("$fullname","$email","$verify_token","$password","$username");    
                }else{
                    $_SESSION['status']="please check database";
                    header('Location:../register.php');
                }
            }else
            {
                $_SESSION['mobile_status']="mobile wrong format, please check";
                header('Location:../register.php');
            }}else
            {
                $_SESSION['password_status']="conform password  and password are diffrent value, please check";
                header('Location:../register.php');
            }
    
}

//update
if(isset($_POST['updatebtn']))
{   
    $id=$_POST['edit_ad_id'];
    $fullname=$_POST['edit_fullname'];
    $username=$_POST['edit_username'];
    $mobile=$_POST['edit_mobile'];
    $email=$_POST['edit_email'];
    $password=$_POST['edit_password'];
    $update_time=date("Y-m-d H:i:s");     
        $updateSql="UPDATE `tbl_admin` SET `fullname`='$fullname',`username`='$username',`mobile`='$mobile',`email`='$email',`password`='$password' ,`update_time`='$update_time' WHERE ad_id=$id";
        $query_run=mysqli_query($con,$updateSql);
        if($query_run)
            {    
                sendemail_update("$fullname","$email","$password","$username");
                $_SESSION['sucess']= "data Update sucesfully";
                header('Location:../profile.php');

            }    
        else
        {
            $_SESSION['status']="data not update- please check";
            header('Location:../accountUpdate.php');
        }   
}

       
        

 //delete record SQL
 if(isset($_POST['deletebtn']))
 {   $id=$_POST['delete_id'];  
        $deleteSql="delete FROM `tbl_Admin` WHERE ad_id=$id";
        $query_runs=mysqli_query($con,$deleteSql);
        if($query_runs)
        {
        $_SESSION['status']="data delete";
        header('Location:../index.php'); }    
        else
        {
            $_SESSION['status']="data not delete";
            header('Location:../profile.php');
        }

    }    
?>