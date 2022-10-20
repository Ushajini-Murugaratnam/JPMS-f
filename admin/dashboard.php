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
                                               Admin User</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                include('..\database\connect.php');
                                                $countSql="SELECT ad_id From `tbl_admin` order by ad_id";
                                                $queryRun=mysqli_query($con,$countSql);
                                                $row=mysqli_num_rows($queryRun);
                                                echo '<h4> Total count of admin users:- '.$row.'</h4>';
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
                                                $countSql="SELECT job_id From `tbl_job` order by job_id";
                                                $queryRun=mysqli_query($con,$countSql);
                                                $row=mysqli_num_rows($queryRun);
                                                echo '<h4> Total count of vacancy:- '.$row.'</h4>';
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
                                                Company</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                include('..\database\connect.php');
                                                $countSql="SELECT company_id From `tbl_company` order by company_id";
                                                $queryRun=mysqli_query($con,$countSql);
                                                $row=mysqli_num_rows($queryRun);
                                                echo '<h4> Total count of company:- '.$row.'</h4>';
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
                                                job seeker</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                include('..\database\connect.php');
                                                $countSql="SELECT seeker_id From `tbl_seeker` order by seeker_id";
                                                $queryRun=mysqli_query($con,$countSql);
                                                $row=mysqli_num_rows($queryRun);
                                                echo '<h4> Total count of job seeker:- '.$row.'</h4>';
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
                    <div>
                        
                    </div>
                <div>
                        </div>
                </div>
            </div>
       

<?php
include 'add/scripts.php';
include 'add/footer.php';
?>


        

        
                    <!-- Content Row -->
                    
