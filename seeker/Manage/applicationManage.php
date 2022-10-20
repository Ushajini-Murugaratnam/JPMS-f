<?php 
session_start();
include("..\..\database\connect.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php';

function sendemail_update($seeker_fname,$seeker_lname,$email,$company_email,$job_tittle)
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
            $mail->setFrom('jobusha94@gmail.com');
            $mail->addAddress($company_email);     //Add a recipient
            $mail->addAddress($email);
          //Add a recipient
        
            $mail->isHTML(true);    
            $mail->Subject = 'Your job Application Details '.$seeker_fname;
            $email_templete='Dear Sir/Madam<br> <p> Welcome to <strong> JPMS,</strong></br>
                you are sucessfully Apply for a job.
                <br>
                    <b> your full name is :-</b>'.$seeker_fname.'<br>
                    <b>   your seeker_lname is :-</b>'.$seeker_lname.'<br>
                    <b>   your job_tittle is :-</b>'.$job_tittle.'<br>
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
    //insert record SQL
    if(isset($_POST['registerbtn']))
    {
        $seeker_id= $_POST['seeker_id'];
        $job_id= $_POST['job_id'];
        $job_tittle=$_POST['job_tittle'];
        $seeker_fname= $_POST['seeker_fname'];
        $seeker_lname= $_POST['seeker_lname'];
        $email= $_POST['email'];
        $mobile= $_POST['mobile'];
        $company_email=$_POST['company_email'];

            
        $insertSql="INSERT INTO `tbl_job_application`(`seeker_id`,`job_id`,`job_tittle`,`seeker_fname`, `seeker_lname`,`email`,`company_email`,`mobile`)
        values('$seeker_id','$job_id','$job_tittle','$seeker_fname','$seeker_lname','$email','$company_email','$mobile')";
        $query_run=mysqli_query($con,$insertSql);   
                
                if($query_run)
                {sendemail_update("$seeker_fname","$seeker_lname","$email","$company_email","$job_tittle");
                   $_SESSION['sucess']="sucessfully added";
                   header("Location:../appliedJob.php");
                }}               
   

        ?>