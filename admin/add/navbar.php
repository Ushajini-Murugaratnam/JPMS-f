<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">  
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-1 text-white"> 
        <?php 
            $sql="SELECT * FROM tbl_admin where ad_id =$loggedin_id";
            $result=mysqli_query($con,$sql);
            while($rows=mysqli_fetch_array($result)){ 
                echo $rows['username'];
            }
        ?>
    </div>
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
                <a class="nav-link" href="../admin/dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
        
            <li class="nav-item">
            <a class="nav-link collapsed" href="aboutContent.php" >
                    <i class="fa fa-plus-square"></i>
                    <span>About</span>
                </a>
            </li><li class="nav-item">
            <a class="nav-link collapsed" href="contact.php" >
                    <i class="fa fa-plus-square"></i>
                    <span>Contact form</span>
                </a>
            </li>
       <hr class="sidebar-divider d-none d-md-block">
            <!-- Heading -->
            <div class="sidebar-heading">
                Jobs
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="companyDetails.php" >
                <i class="fa fa-building"></i>
                    <span>Company</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseJobs"
                    aria-expanded="true" aria-controls="collapseJobs">
                    <i class="fa fa-life-ring" ></i>
                    <span>Jobs</span>
                </a>
                <div id="collapseJobs" class="collapse" aria-labelledby="headingJobs" data-parent="#accordionSidebar">
                    <div class="bg-white py-1 collapse-inner rounded">
                        <h6 class="collapse-header">Jobs</h6>
                        <a class="collapse-item" href="jobCategory.php">Job Category</a>
                        <a class="collapse-item" href="jobType.php">Job Type</a>
                        <a class="collapse-item" href="jobs.php">Jobs</a>
                        <a class="collapse-item" href="appliedJob.php">Applyed Jobs</a>
                    </div>
                </div>
            </li>
            
            <li class="nav-item">
            <a class="nav-link collapsed" href="seekerDetails.php" >
                    <i class="fa fa-user-circle"></i>
                    <span>Job Seekers</span>
                </a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Heading -->
            <div class="sidebar-heading">
              Reports
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport"
                    aria-expanded="true" aria-controls="collapseReport">
                    <i class="fa fa-filter" ></i>
                    <span>Reports</span>
                </a>
                <div id="collapseReport" class="collapse" aria-labelledby="headingReport" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Reports</h6>
                        <a class="collapse-item" href="searchJobCompany.php">search Job-Company</a>
                        <a class="collapse-item" href="searchJobDate.php">search Job - Date</a>
                        <a class="collapse-item" href="searchjobcategory.php">search Category</a>
                        <a class="collapse-item" href="searchjobtype.php">search job Type</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseJReport"
                    aria-expanded="true" aria-controls="collapseJReport">
                    <i class="fa fa-filter" ></i>
                    <span>jobs Details Reports</span>
                </a>
                <div id="collapseJReport" class="collapse" aria-labelledby="headingReport" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Reports</h6>
                         <a class="collapse-item" href="closeJob.php">closed job</a>
                        <a class="collapse-item" href="currentJob.php">Current job</a>
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