<?php
include('../database/connect.php');
session_start();
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($con,"select email,company_id from tbl_company where email='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['email'];
$loggedin_id=$row['company_id'];
if(!isset($loggedin_session) || $loggedin_session==NULL) {
	echo "Go back";
	header("Location: index.php");
}
?>