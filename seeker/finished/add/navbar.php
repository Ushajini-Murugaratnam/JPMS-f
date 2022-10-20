<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon"> <div class="sidebar-brand-icon ">
             <i class="fa fa-user-secret"></i>
                    <div class="sidebar-brand-text mx-3"><span></div>
                </div>
                </div>
                
            </a>

            <!-- Divider -->

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../index.php" target="_blank">
                <i class="fa fa-heart" aria-hidden="true"></i>
                    <span>FrontEnd</span></a>
            </li>           
             <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

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
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Jobs</h6>
                        <a class="collapse-item" href="job.php">Jobs</a>
                        <a class="collapse-item" href="application.php">apply job</a>
                        <a class="collapse-item" href="appliedJob.php">Applyed Jobs</a>
                     </div>
                </div>
            </li>

            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport"
                    aria-expanded="true" aria-controls="collapseReport">
                    <i class="fa fa-filter" ></i>
                    <span>Job Reports</span>
                </a>
                <div id="collapseReport" class="collapse" aria-labelledby="headingReport" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Job Reports</h6>
                        <a class="collapse-item" href="searchJobCompany.php"><?php echo ucwords("search jobcompany");?></a>
                        <a class="collapse-item" href="searchJobDate.php"><?php echo ucwords("search Job - Date");?></a>
                        <a class="collapse-item" href="searchjobcategory.php"><?php echo ucwords("search Category");?></a>
                        <a class="collapse-item" href="searchjobtype.php"><?php echo ucwords("search job Type");?></a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseApReport"
                    aria-expanded="true" aria-controls="collapseApReport">
                    <i class="fa fa-filter" ></i>
                    <span>Applicatons </span>
                </a>
                <div id="collapseApReport" class="collapse" aria-labelledby="headingReport" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"><?php echo ucwords("Applicatons Reports");?></h6>
                        <a class="collapse-item" href="rejectJob.php">  <?php echo ucwords("Reject Appplication");?></a>
                        <a class="collapse-item" href="selectedJob.php"><?php echo ucwords("Select Application");?></a>
                        <a class="collapse-item" href="pendingJob.php"><?php echo ucwords("Pending Application");?></a>
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