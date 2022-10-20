<?php 
session_start();
include("..\..\database\connect.php");  

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php';

function sendemail_message($email,$job_tittle,$company_id,$job_desc)
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
    $mail->addAddress($email);     //Add a recipient
    $mail->Subject ='job create messsgae'.$job_tittle.'';

    $email_templete='Dear Sir/Madam<br> <p> Welcome to <strong> JPMS,</strong></br>
    you are sucessfully update our page,affter you can login your account.
    <br>
        <b> your company  Nameis :-</b>Your Account Update Details '.$job_tittle.'
      
            <br>
                <b> your company  Nameis :-</b>'.$company_id.'<br>
                <b>   your job Tittle is :-</b>'.$job_tittle.'<br>
                <b>   your job Description is :-</b>'.$job_desc.'<br>
                <b>  your email is :-</b>'.$email.'<br>
            The JPMS,<br>
            http://localhost/JPMS-f/index.php';                      //Set email format to HTML
    $mail->Body= $email_templete;   
    $mail->send();

}catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}     
  //  echo 'Message has been sent';
}
function sendemail_jobUpdate($email,$job_tittle,$company_id,$job_desc)
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
    $mail->addAddress($email);     //Add a recipient
    $mail->Subject ='job update messsgae'.$job_tittle.'';

    $email_templete='Dear Sir/Madam<br> <p> Welcome to <strong> JPMS,</strong></br>
    you are sucessfully update our page,affter you can login your account.
    <br>
        <b> your company  Nameis :-</b>Your Account Update Details '.$job_tittle.'
      
            <br>
                <b> your company  Nameis :-</b>'.$company_id.'<br>
                <b>   your job Tittle is :-</b>'.$job_tittle.'<br>
                <b>   your job Description is :-</b>'.$job_desc.'<br>
                <b>  your email is :-</b>'.$email.'<br>
            The JPMS,<br>
            http://localhost/JPMS-f/index.php';                      //Set email format to HTML
    $mail->Body= $email_templete;   
    $mail->send();

}catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}     
  //  echo 'Message has been sent';
}



    //insert record SQL
    if(isset($_POST['register_btn']))
    {
        $cat_id= $_POST['cat_id'];
        $type_id= $_POST['type_id'];
        $company_id= $_POST['company_id'];
        $job_tittle= $_POST['job_tittle'];
        $job_desc= $_POST['job_desc'];
        $job_salary= $_POST['job_salary'];
        $contact_name= $_POST['contact_name'];
        $email= $_POST['email'];
        $mobile=trim($_POST['mobile']);
        $mobilec='/^[0-9]{10,10}$/';
        $post_date= $_POST['post_date'];
        $end_date= $_POST['end_date'];
            
        $insertSql="INSERT INTO `tbl_job`(`cat_id`,`type_id`,`company_id`, `job_tittle`,`job_desc`,`job_salary`,`contact_name`,`email`,`mobile`,`post_date`,`end_date`)
        values('$cat_id','$type_id','$company_id','$job_tittle','$job_desc','$job_salary','$contact_name','$email','$mobile','$post_date','$end_date')";
        $query_run=mysqli_query($con,$insertSql);   
                if($query_run){
                    if(preg_match($mobilec,$mobile))
                    {
                        sendemail_message("$email","$job_tittle","$company_id","$job_desc");
                        $_SESSION['sucess']="job sucessfully added";
                        header('Location:../jobs.php'); 
                    }else
                        { 
                            $_SESSION['mobile_status']= "check your mobile number";
                            header('Location:../jobs.php');
                        }
                }else
                { 
                    $_SESSION['status']= "job is not added ";
                    header('Location:../jobs.php');
                }
            
    }   
    


    
   
       //update record SQL
       if(isset($_POST['update_btn']))
       {   $id= $_POST['edit_job_id'];
          
          $cat_id= $_POST['edit_cat_id'];
          $type_id= $_POST['edit_type_id'];
          $job_tittle= $_POST['edit_job_tittle'];
          $job_desc= $_POST['edit_job_desc'];
          $contact_name= $_POST['edit_contact_name'];
          $email= $_POST['edit_email'];
          $mobile= $_POST['edit_mobile'];
          $post_date= $_POST['edit_post_date'];
          $end_date= $_POST['edit_end_date'];
          $job_salary= $_POST['edit_job_salary'];
    
          $updateSql="UPDATE `tbl_job` SET `cat_id`='$cat_id',`type_id`='$type_id',`job_tittle`='$job_tittle',`job_desc`='$job_desc',`job_salary`='$job_salary',`contact_name`='$contact_name', `email`='$email',`mobile`='$mobile',`post_date`='$post_date',`end_date`='$end_date'
           WHERE job_id=$id";
          $query_run=mysqli_query($con,$updateSql);
          if($query_run)
              {           
                sendemail_jobUpdate("$email","$job_tittle","$company_id","$job_desc");
                  $_SESSION['sucess']= "job is Update sucesfully";
                  header('Location:../jobs.php');}    
          else
          {
              $_SESSION['status']="job is not update- please check";
              header('Location:../jobs.php');
          }   
      }
  