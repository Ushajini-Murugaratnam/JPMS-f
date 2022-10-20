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
                                        $displaySql="SELECT tbl_job_application.*,tbl_job.company_id
                                         FROM `tbl_job_application`
                                         inner join `tbl_job` on tbl_job_application.job_id=tbl_job.job_id
                                         where company_id = $loggedin_id";
                                        $query_run=mysqli_query($con,$displaySql);
                                    ?>
                                    
                
                                     
                                    <table class="table  table-bordered   table-hover" id="table"  cellspacing="0">
                                        <thead class="table-info">
                                            <tr>
                                                <th>job_id</th>
                                                <th>seeker_id</th>
                                                <th>seeker first name</th>
                                                <th>seeker last name</th>
                                                <th>email</th>
                                                <th>mobile</th>    
                                                <th>Result of status</th> 
                                                <th>status</th>     
                                            </tr>
                                        </thead>
                                        <tfoot  class="table-info">
                                            <tr>
                                                <th>job_id</th>
                                                <th>seeker_id</th>
                                                <th>seeker_fname</th>
                                                <th>seeker_lname</th>
                                                <th>email</th>
                                                <th>mobile</th>
                                                <th>Result of status</th>  
                                                <th>status</th>            
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
                                                <td>Result:-
                                                <?php echo $row['status'];?>
                                                <?php  
							 			if ($row['status'] == 1) {
											echo '<p><a href="status.php?ap_id='.$row['ap_id'].'&status=0 "class="link-success">Approved</a></p>';
							 			} 
							 			else{
											echo '<p><a href="status.php?ap_id='.$row['ap_id'].'&status=1" class="link-danger">Reject</a></p>';
							 			}
							 		?>
                                    </td>
                                                <td>check it please:- 
                                               
                                                <?php  
							 			if ($row['status'] == 1) {
											echo '<p><a href="status.php?ap_id='.$row['ap_id'].'&status=0"class="link-danger">0</a></p>';
							 			} 
							 			else{
											echo '<p><a href="status.php?ap_id='.$row['ap_id'].'&status=1 "class="link-success">1</a></p>';
							 			}}
							 		}?>
                                    </td>
                                
                                </tr>
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