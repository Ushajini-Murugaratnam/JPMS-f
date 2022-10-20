<?php
session_start();
if(isset($_POST['login_btn']))
{
    extract($_POST);
    include '../database/connect.php';
    $sql=mysqli_query($con,"SELECT * FROM tbl_admin where email='$email' and password='$password'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {     
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$password=mysqli_real_escape_string($con,$_POST['password']);
		$sql="SELECT ad_id FROM tbl_admin WHERE email='$email' and password='$password'and verify_status=1";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
		$active=$row['active'];
		$count=mysqli_num_rows($result);

		$notsql="SELECT ad_id FROM tbl_admin WHERE email='$email' and password='$password'and verify_status=0";
		$noresult=mysqli_query($con,$notsql);
		$nrow=mysqli_fetch_array($result);
		$deactive=$row['deactive'];
		$nocount=mysqli_num_rows($noresult);
		if($count==1) {
		//	sendemail_verify("$fullname","$email");
			$_SESSION['login_user']=$email;
			header("location: dashboard.php");
		}elseif($nocount){
			$_SESSION['status']="Failed Email Verifcation, please Check it";
			header("location: index.php");
		}
    }else{
    {  $esql=mysqli_query($con,"SELECT * FROM tbl_admin where email='$email'and password!='$password'");
		$row  = mysqli_fetch_array($esql);
	 if(is_array($row)) {  
        $_SESSION['status']="Check Your passowerd Account Details";
		header("location: index.php");
    }else{
		$_SESSION['status']="Register Your Account";
		header("location: register.php");
	}}
}}
?>