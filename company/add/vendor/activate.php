<?php

include("..\database\connect.php");

// Check if id is set or not if true toggle,
	// else simply go back to the page
	if (isset($_GET['ap_id'])){

		// Store the value from get to a
		// local variable "course_id"
		$ap_id=$_GET['ap_id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `tbl_job_application` SET
			`status`=1 WHERE ap_id='$ap_id'";

		// Execute the query
		mysqli_query($con,$sql);
	}	// Go back to course-page.php
	header('location: appliedJob.php');
?>
