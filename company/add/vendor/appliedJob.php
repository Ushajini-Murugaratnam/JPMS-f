<?php
 include('session.php');
include 'add/header.php';
include 'add/navbar.php';
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- TopBar include -->
    <?php include('add/topbar.php');?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">job  </h1>                      
            <!-- Button trigger modal -->
                </div>
    <!-- Content Row -->
        <div class="row"></div>
    <!-- Content Row -->
        <div class="row">
            <!-- Area Chart -->
            <div >
                <div class="card shadow mb-4">
                    <!-- User Details Table -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">application page </h6>
                         </div>

                    <!-- Card Body -->
                        <div class="card-body">                                
                                <!-- table start -->
                           
                                <div class="table-responsive">
                                    
                                    
                                <?php
                                      include("..\database\connect.php");
                                        $displaySql="SELECT * FROM  `tbl_job_application` where company_id = $loggedin_id";
                                       
                                        $query_run=mysqli_query($con,$displaySql);
                                    ?>
                                    
                                    
                                    <table class="table table-bordered" id="dataTable"  cellspacing="0">
                                        <thead>
                                            <tr>
                                            <td>seeker_id</td>
                                                <td>seeker_fname</td>
                                                <td>seeker_lname</td>
                                                <td>email</td>
                                                <td>mobile</td>
                                                <td>nic</td>
                                                <td>status</td>  
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <td>job_id
                                                <td>seeker_id</td>
                                                <td>seeker_fname</td>
                                                <td>seeker_lname</td>
                                                <td>email</td>
                                                <td>mobile</td>
                                                <td>nic</td>
                                                <td>status</td>  
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            if(mysqli_num_rows($query_run)>0)
                                            {
                                                while($row=mysqli_fetch_assoc($query_run))
                                            {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['job_id'];?></td>
                                                <td><?php echo $row['seeker_id'];?></td>
                                                <td><?php echo $row['seeker_fname'];?></td>
                                                <td><?php echo $row['seeker_lname'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['mobile'];?></td>
                                                <td><?php echo $row['nic'];?></td>
                                                <td><?php
						// Usage of if-else statement to translate the
						// tinyint status value into some common terms
						// 0-Inactive
						// 1-Active
						if($row['status']=="1")
							echo "Active";
						else
							echo "Inactive";
					?>						
				</td>
				<td>
					<?php
					if($row['status']=="1")

						// if a course is active i.e. status is 1
						// the toggle button must be able to deactivate
						// we echo the hyperlink to the page "deactivate.php"
						// in order to make it look like a button
						// we use the appropriate css
						// red-deactivate
						// green- activate
						echo
"<a href=deactivate.php?ap_id=".$row['ap_id']." class='btn btn-danger'>Deactivate</a>";
					else
						echo
"<a href=activate.php?ap_id=".$row['ap_id']." class='btn btn-success'>Activate</a>";
					?>
			</tr>
		<?php
			}
				
                                            }
    else{
        echo "no records found the database";
    }                 
    
		?>
                                   </tbody>
                                    </table>
                                </div>
                                <!-- /.table end-->
                        </div>
                </div>
               
            </div>
        </div>
    </div>
 <!-- /.container-fluid -->
</div>
<!-- End of Page Wrapper -->




<?php
include 'add/scripts.php';
include 'add/footer.php';
?>