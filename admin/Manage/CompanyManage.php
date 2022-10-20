<?php
session_start();
include'../../database/connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php';

function sendemail_verify($company_name,$email,$verify_token)
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
    $mail->setFrom('jobusha94@gmail.com', $company_name);
    $mail->addCC('jobusha94@gmail.com');
    $mail->addAddress($email);     //Add a recipient
    $mail->isHTML(true);    
    $mail->Subject = 'Register- company verification';
    $email_templete='Dear Sir/Madam<br> <p> Welcome to <strong> JPMS,</strong></br>
    you are sucessfully Register our page, now once you click on verification link. affter you can login your account.
    <br>
    Here is the Register verification link <b><a href="http://localhost/JPMS-F/company/verify_email.php?token='.$verify_token.'">click me token</a></b>
    <br></p>
    The JPMS,<br>
    http://localhost/JPMS-f/index.php';
                                  //Set email format to HTML
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
$company_name=$_POST['company_name'];
$web=$_POST['web'];
$email=$_POST['email'];
$mobile=trim($_POST['mobile']);
$mobilec='/^[0-9]{10,10}$/';
$verify_token=md5(rand());
$password=$_POST['password'];
$confirmpassword=$_POST['confirmpassword'];
$country=$_POST['country'];
$address=$_POST['address'];
$create_time=date("Y-m-d H:i:s"); 
$fileName = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];
$path = "../company_files/".$fileName; 
$result = mysqli_query($con,"SELECT * FROM tbl_company WHERE email='$email'");
$num_rows = mysqli_num_rows($result);
if ($num_rows) {
    $_SESSION['email_status']= "alredy added email, try new one";
    header("Location:../companyDetails.php"); 
}elseif($password === $confirmpassword)
    {
    if(preg_match($mobilec,$mobile))
        {
            $insertSql="INSERT INTO `tbl_company`(company_name,web, mobile,email, password,country,address,create_time,verify_token,fileName)
            VALUES('$company_name','$web','$mobile', '$email', '$password','$country','$address','$create_time','$verify_token','$fileName')";
            $query_run=mysqli_query($con,$insertSql);          
            if($query_run){  
				move_uploaded_file($fileTmpName,$path);
                sendemail_verify("$company_name","$email","$verify_token");
                header('Location:../companyDetails.php');
            }else{
                $_SESSION['status']="please check database";
                header('Location:../companyDetails.php');
            }
        }else
        {
            $_SESSION['mobile_status']="mobile wrong please check";
            header('Location:../companyDetails.php');
        }}else
        {
            $_SESSION['password_status']="password wrong please check";
            header('Location:../companyDetails.php');
        }
    
}
