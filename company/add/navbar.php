<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">
                <?php 
            $sql="SELECT * FROM tbl_company where company_id =$loggedin_id";
            $result=mysqli_query($con,$sql);
            while($rows=mysqli_fetch_array($result)){ 
                echo $rows['company_name'];
            }
        ?> </div>
            </a>
<!-- Nav Item - Dashboard -->
<li class="nav-item active">
                <a class="nav-link" href="../index.php">
                <i class="fa fa-heart" aria-hidden="true"></i>
                    <span>FrontEnd</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

     

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseJobs"
                    aria-expanded="true" aria-controls="collapseJobs">
                    <i class="fa fa-life-ring" ></i>
                    <span>Jobs</span>
                </a>
                <div id="collapseJobs" class="collapse" aria-labelledby="headingJobs" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Jobs</h6>
                        <a class="collapse-item" href="jobType.php">Job Type</a>
                        <a class="collapse-item" href="jobCategory.php">Job Category</a>
                        <a class="collapse-item" href="jobs.php">Jobs</a>
                    </div>
                </div>
            </li>
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="appliedJob.php">
                    <i class="fa fa-user-circle"></i>
                    <span>Applyed Jobs</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="seekerDetails.php" >
                    <i class="fa fa-user-circle"></i>
                    <span>Job Seekers</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="message.php" >
                    <i class="fa fa-user-circle"></i>
                    <span>Job Send Message</span>
                </a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport"
                    aria-expanded="true" aria-controls="collapseReport">
                    <i class="fa fa-life-ring" ></i>
                    <span>Common varity Reports</span>
                </a>
                <div id="collapseReport" class="collapse" aria-labelledby="headingReport" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Reports</h6>
                        <a class="collapse-item" href="searchJobDate.php">search Job - Date</a>
                        <a class="collapse-item" href="searchjobcategory.php">search Category</a>
                        <a class="collapse-item" href="searchjobtype.php">search job Type</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseJobReport"
                    aria-expanded="true" aria-controls="collapseJobReport">
                    <i class="fa fa-life-ring" ></i>
                    <span>job Reports</span>
                </a>
                <div id="collapseJobReport" class="collapse" aria-labelledby="headingReport" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Reports</h6>
                        <a class="collapse-item" href="closeJob.php">closed job</a>
                        <a class="collapse-item" href="currentJob.php">Current job</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseApReport"
                    aria-expanded="true" aria-controls="collapseApReport">
                    <i class="fa fa-life-ring" ></i>
                    <span>Application Reports</span>
                </a>
                <div id="collapseApReport" class="collapse" aria-labelledby="headingReport" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Reports</h6>
                        <a class="collapse-item" href="RejectApplication.php">Reject Appplication</a>
                        <a class="collapse-item" href="SelectApplication.php">Select Application</a>
                        <a class="collapse-item" href="pendingApplication.php">Pending Application</a>
                    </div>
                </div>
            </li>
        
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>