
<?php
include("..\database\connect.php");

$id = $_GET['job_id'];
$apStatus=$_GET['apStatus'];

$q="UPDATE tbl_job set apStatus=$apStatus where job_id=$id";
mysqli_query($con,$q);
header('Location:jobs.php');
?>