<?php

	// Connect to database
    include("..\database\connect.php");

// Check if id is set or not if true toggle,
	// else simply go back to the page
	if (isset($_GET['ap_id'])){

		// Store the value from get to
		// a local variable "ap_id"
		$ap_id=$_GET['ap_id'];

		// SQL query that sets the status to
		// 0 to indicate deactivation.
		$sql="UPDATE `tbl_job_application` SET
			`status`=0 WHERE ap_id='$ap_id'";

		// Execute the query
		mysqli_query($con,$sql);
	}

	// Go back to course-page.php
	header('location: appliedJob.php');
?>
