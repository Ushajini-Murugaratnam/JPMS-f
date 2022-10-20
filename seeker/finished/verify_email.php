<?php
session_start();
include('../database/connect.php');

if(isset($_GET['token']))
{
    $token=$_GET['token'];
    $verify_token_query="SELECT verify_token,verify_status FROM tbl_seeker where verify_token='$token' LIMIT 1";
    $verify_token_query_run=mysqli_query($con,$verify_token_query);

    if(mysqli_num_rows($verify_token_query_run)>0)
    {
        $row=mysqli_fetch_array($verify_token_query_run);
        if($row['verify_status']==0){
            $clicked_token=$row['verify_token'];
            $update_query="UPDATE tbl_seeker SET verify_status='1' WHERE verify_token='$clicked_token' LIMIT 1";
            $update_query_run=mysqli_query($con,$update_query);
            if($update_query_run){
                    $_SESSION['status']="your account verification success";
                    header("Location:index.php");
                    exit(0);
                
            }else{
                    $_SESSION['status']="verification failed";
                    header("Location:index.php");
                    exit(0);
                }
            }
        
    else{
        $_SESSION['status']="Email alredy verified , please login";
        header("Location:index.php");
        exit(0);
    }}
    else{
        $_SESSION['status']="this token does exixt";
        header("Location:index.php");
        exit(0);
    }
}else{
    $_SESSION['status']="not allowed";
    header("Location:index.php");
    exit(0);
}
?>