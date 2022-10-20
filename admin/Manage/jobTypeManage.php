jobManage.php
job.php
jobEdit.php<?php 
session_start();
include("..\..\database\connect.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php';

function sendemail_jobCatCreate($job_type)
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
        
            $mail->isHTML(true);    
            $mail->Subject = 'Your type of job create alert';
            $email_templete='Dear   admin <br>
    Welcome to JPMS,<br> you are sucessfully add type of job our page.
    <b>type of job Name is :-</b>'.$job_type.'<br>
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
    
function sendemail_jobCatupdate($job_type,$id)
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
            $mail->setFrom('jobusha94@gmail.com',$job_type);
            $mail->addAddress('jobusha94@gmail.com');     //Add a recipient
        
            $mail->isHTML(true);    
            $mail->Subject = 'Your job type of job Update Details '.$job_type;
            $email_templete='Dear Sir/Madam<br> <p> Welcome to <strong> JPMS,</strong></br>
                you are sucessfully type of job update our page.
                <br>
                    <b> your type of job Name is :-</b>'.$job_type.
                    ' <br>job is is a :- '.$id.'
                    <br> The JPMS,<br>
                http://localhost/JPMS-f/index.php';     
                        
            $mail->Body= $email_templete;
            $mail->send();
        }catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }     
        //  echo 'Message has been sent';
}

    function sendemail_jobCatdelete($id)
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
        
            $mail->isHTML(true);    
            $mail->Subject = 'Your job type of jobDelete Details ';
            $email_templete='Dear Sir/Madam<br> <p> Welcome to <strong> JPMS,</strong></br>
                you are sucessfully type of job Delete our page.
                <br>
                    <b> your type of job Name is :-</b>'.$id.'<br>
                The JPMS,<br>
                http://localhost/JPMS-f/index.php';     
                        
            $mail->Body= $email_templete;
            $mail->send();
        }catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }     
    //  echo 'Message has been sent';
}
    //insert record SQL
    if(isset($_POST['registerbtn']))
    {
        $job_type= $_POST['job_type']; 
        $result = mysqli_query($con,"SELECT * FROM tbl_job_type WHERE job_type='$job_type'");
        $num_rows = mysqli_num_rows($result);
        if ($num_rows) {
            $_SESSION['type_status']= "type of job is alredy added";
             header("location: ../jobType.php"); 
        }else{
        $job_type= $_POST['job_type']; 
        $insertSql="INSERT INTO `tbl_job_type` (`job_type`)values('$job_type')";
        $query_run=mysqli_query($con,$insertSql);   
                
                if($query_run)
                {
                    sendemail_jobCatCreate("$job_type","$type_id");
                   $_SESSION['sucess']=" job type sucessfully added";
                    header('Location:../jobType.php');
                }else
                { 
                    $_SESSION['status']= "job type is not added";
                    header('Location:../jobType.php');
                }
            
        }
    }
       //


       //update record SQL
    if(isset($_POST['updatebtn']))
    {   $id=$_POST['edit_type_id'];
        $job_type = $_POST['edit_job_type'];
    
        
        $updateSql="UPDATE `tbl_job_type` SET `job_type`='$job_type' WHERE type_id=$id";
        $query_run=mysqli_query($con,$updateSql);
        if($query_run)
            {           
                sendemail_jobCatupdate("$job_type","$id");
                $_SESSION['sucess']= "job type is Update sucesfully";
                header('Location:../jobType.php');
    
            }    
        else
        {
            $_SESSION['status']="job type is not update- please check";
            header('Location:../jobType.php');
        }   
    }
   //delete record SQL
    if(isset($_POST['deletebtn']))
    {   $id=$_POST['delete_id'];   
        $deleteSql=" SELECT  type_id,job_type FROM `tbl_job_type` WHERE type_id=$id";
        $query_run=mysqli_query($con,$deleteSql);
        if($query_run)
            {           
                sendemail_jobCatdelete("$id");
                
                $deletesSql="delete FROM `tbl_job_type` WHERE type_id=$id";
                $query_runs=mysqli_query($con,$deletesSql);
                if($query_runs)
                {           
                    $_SESSION['sucess']= "job type deleted";
                    header('Location:../jobType.php');
                }    
            else
            {
                $_SESSION['sucess']= "job type deleted";
                header('Location:../jobType.php');
            }
        }    
        else
        {
            $_SESSION['status']="job type is not here";
            header('Location:../jobType.php');
        }   
    }

