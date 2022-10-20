W<?php 
session_start();
include("..\..\database\connect.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php';

function sendemail_jobCatCreate($category_name)
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
            $mail->Subject = 'Your category create alert';
            $email_templete='Dear sir ,<br>
            Welcome to JPMS,<br> you are sucessfully add Category our page.
            <b>category Name is :-</b>'.$category_name.'<br>
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
    


if(isset($_POST['registerbtn']))
{
    $category_name= $_POST['category_name']; 
    $result = mysqli_query($con,"SELECT * FROM tbl_job_cat WHERE  category_name='$category_name'");
    $num_rows = mysqli_num_rows($result);
    if ($num_rows) {
        $_SESSION['cat_status']= "category is alredy added";
         header("location: ../jobCategory.php"); 
    }else{
        $category_name= $_POST['category_name']; 
        $insertSql="INSERT INTO `tbl_job_cat` (`category_name`)values('$category_name')";
        $query_run=mysqli_query($con,$insertSql);   
                
                if($query_run)
                {
                    sendemail_jobCatCreate("$category_name");
                   $_SESSION['sucess']=" job category sucessfully added";
                    header('Location:../jobCategory.php');
                }else
                { 
                    $_SESSION['status']= "job category is not added";
                    header('Location:../jobCategory.php');
                }
            
    }   }
       //



