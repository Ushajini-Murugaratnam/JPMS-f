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
                        <h1 class="h3 mb-0 text-gray-800">
                             Dashboard</h1>
                    </div>


                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Applied jobs</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                include('..\database\connect.php');
                                                $countSql="SELECT * FROM tbl_job
                                                INNER JOIN tbl_job_application
                                                ON tbl_job.job_id = tbl_job_application.job_id WHERE tbl_job.company_id =$loggedin_id";
                                                
                                                $queryRun=mysqli_query($con,$countSql);
                                                $row=mysqli_num_rows($queryRun);
                                                echo '<h4> total count of Applied jobs:- '.$row.'</h4>';
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                jobs</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                include('..\database\connect.php');
                                                $countSql="SELECT job_id From `tbl_job` where company_id =$loggedin_id";;
                                                $queryRun=mysqli_query($con,$countSql);
                                                $row=mysqli_num_rows($queryRun);
                                                echo '<h4> total count of vacancy:- '.$row.'</h4>';
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    <!-- Content Row -->
                    <!-- Content Row -->
                    <div>
                   
                </div>
            </div>
        </div>
<?php
include 'add/scripts.php';
include 'add/footer.php';
?>

