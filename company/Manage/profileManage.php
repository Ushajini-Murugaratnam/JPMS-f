<?php
session_start();
include('../../database/connect.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php';


    function sendemail_update($company_name,$email,$password,$web)
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
            $mail->setFrom('jobusha94@gmail.com',$company_name);
            $mail->addAddress($email);     //Add a recipient
        
            $mail->isHTML(true);    
            $mail->Subject = 'Your Account Update Details '.$company_name;
            $email_templete='Dear Sir/Madam<br> <p> Welcome to <strong> JPMS,</strong></br>
                you are sucessfully update our page,affter you can login your account.
                <br>
                    <b> your full name is :-</b>'.$company_name.'<br>
                    <b>   your web is :-</b>'.$web.'<br>
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
     
   
if(isset($_POST['updatebtn']))

{   $id=$_POST['edit_company_id'];
      $company_name=$_POST['edit_company_name'];
	$web=$_POST['edit_web'];
	$mobile=$_POST['edit_mobile'];
	$email=$_POST['edit_email'];
	$password=$_POST['edit_password'];
	$country=$_POST['edit_country'];
	$address=$_POST['edit_address'];
	$update_time=date("Y-m-d H:i:s");   
    
    $result = mysqli_query($con,"SELECT * FROM tbl_admin WHERE email='$email'");
    $num_rows = mysqli_num_rows($result);
    if ($num_rows) {
        $_SESSION['status']= "alredy added email, try new one";
        header("location: ../profile.php"); 
    }else{
       
    $updateSql="UPDATE `tbl_company` SET `company_name`='$company_name',`web`='$web',`mobile`='$mobile',`address`='$address',`password`='$password' ,`email`='$email',`country`='$country' ,`update_time`='$update_time' WHERE company_id=$id";
    $query_run=mysqli_query($con,$updateSql);
    if($query_run)
        {    
                sendemail_update("$company_name","$email","$password","$web");
            $_SESSION['sucess']= "data Update sucesfully";
            header('Location:../profile.php');

        }    
    else
    {
        $_SESSION['status']="data not update- please check";
        header('Location:../profileUpdate.php');
    }   }
}
   //delete record SQL
   if(isset($_POST['deletebtn']))
   {   $id=$_POST['delete_id'];   
    $deleteSql=" DELETE FROM `tbl_company` WHERE company_id=$id";
       $query_run=mysqli_query($con,$deleteSql);
       if($query_run)
           {           
               header('Location:../index.php');
           }    
       else
       {
           $_SESSION['status']="data not delete";
           header('Location:../profile.php');
       }   
   }
?>
?>