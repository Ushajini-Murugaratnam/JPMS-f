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

                            <h6 class="m-0 font-weight-bold text-primary">Reject application page </h6>
                         </div>

                    <!-- Card Body -->
                        <div class="card-body">                                
                                <!-- table start -->
                           
                                <div class="table-responsive">
                                    
                                    
                                <?php
                                      include("..\database\connect.php");
                                      $displaySql="SELECT * FROM tbl_job
                                        INNER JOIN tbl_job_application
                                        ON tbl_job.job_id = tbl_job_application.job_id WHERE tbl_job.company_id =$loggedin_id and status='0'";
                                      $query_run=mysqli_query($con,$displaySql);
                                  ?>
                                    
                                    
                                    <table class="table table-bordered" id="table"  cellspacing="0">
                                        <thead  class="table-info">
                                            <tr>
                                                <th>Application_id</th>
                                                <th>job_id</th>
                                                <th>seeker_fname</th>
                                                <th>seeker_lname</th> 
                                                <th>email</th>
                                                <th>mobile</th>
                                            </tr>
                                        </thead>
                                        <tfoot  class="table-info">
                                            <tr>
                                            <th>Application_id</th>
                                            <th>job_id</th>
                                                <th>seeker_fname</th>
                                                <th>seeker_lname</th>
                                                <th>email</th>
                                                <th>mobile</th>                                 
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
                                                <td><?php echo $row['ap_id'];?></td>
                                                <td><?php echo $row['job_id'];?></td>
                                                <td><?php echo $row['seeker_fname'];?></td>
                                                <td><?php echo $row['seeker_lname'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['mobile'];?></td>
                                                
                                               </tr>
                                                <?php 
							 			
							 		}}
                            else{
                                //echo "no records found the database";
                            }   ?>
                                                                                   
                                        
                                           
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
