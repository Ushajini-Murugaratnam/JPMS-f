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
                            <h6 class="m-0 font-weight-bold text-primary">application page </h6>
                         </div>

                    <!-- Card Body -->
                        <div class="card-body">                                
                                <!-- table start -->
                           
                                <div class="table-responsive">
                                    <?php
                                if(isset($_SESSION['sucess'])&&$_SESSION['sucess']){                                    
                                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>User!</strong>'.$_SESSION['sucess'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    unset($_SESSION['sucess']);
                                }
                                ?>
                                <?php
                                      include("..\database\connect.php");
                                        $displaySql="SELECT * FROM  `tbl_job_application` where seeker_id = $loggedin_id";
                                        $query_run=mysqli_query($con,$displaySql);
                                    ?>
                                    
                                    
                                    <table class="table table-bordered" id="table"  cellspacing="0">
                                        <thead class="table-info">
                                            <tr>
                                                <th>Application_id</th>
                                                <th>job_id</th>
                                                <th>seeker_fname</th>
                                                <th>seeker_lname</th>
                                                <th>email</th>
                                                <th>mobile</th>
                                                <th>status</th>
                                            </tr>
                                        </thead>
                                        <tfoot class="table-info">
                                            <tr>
                                            <th>Application_id</th>
                                            <th>job_id</th>
                                                <th>seeker_fname</th>
                                                <th>seeker_lname</th>
                                                <th>email</th>
                                                <th>mobile</th>
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
                                                <td><?php echo $row['ap_id'];?></td>
                                                <td><?php echo $row['job_id'];?></td>
                                                <td><?php echo $row['seeker_fname'];?></td>
                                                <td><?php echo $row['seeker_lname'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['mobile'];?></td>
                                                <td>
                                                <?php 
							 			if ($row['status'] == 'pending') {
											echo "<span class='badge badge-warning'>Pending</span>";
							 			}else if($row['status'] == 1){
											echo "<span class='badge badge-success'>select</span>";
							 			}
							 			else{
											echo "<span class='badge badge-danger'>reject</span>";
							 			}
							 		}}
                            else{
                          //      echo "no records found the database";
                            }   ?>
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
