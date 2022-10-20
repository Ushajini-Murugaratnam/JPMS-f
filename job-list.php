<?php
    include 'add/header.php';
    include 'add/navbar.php';
?>
   

        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Job List</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Job List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Jobs Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                <h6 class="mt-n1 mb-0">Featured</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                                <h6 class="mt-n1 mb-0">Full Time</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                                <h6 class="mt-n1 mb-0">Part Time</h6>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
              
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                        <?php
                                    include("database\connect.php");
                                    $displaySql="SELECT tbl_job.*,tbl_job_type.job_type,tbl_company.country
                                    FROM tbl_job
                                    LEFT JOIN tbl_company
                                    ON tbl_job.company_id=tbl_company.company_id
                                    LEFT JOIN tbl_job_type
                                    ON tbl_job.type_id = tbl_job_type.type_id  where apStatus=1";
                                    $query_run=mysqli_query($con,$displaySql);
                                    if(mysqli_num_rows($query_run)>0)
                                    {
                                    while($row=mysqli_fetch_assoc($query_run))
                                    {
                                ?>
                                <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3"><strong> Job Tittle:- </strong> <?php echo $row['job_tittle'];?></h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row['country'];?></span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?php echo $row['job_type'];?></span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?php echo $row['job_salary'];?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">                                            
                                            <form action="job-detail.php" method="post">
                                                <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $row['job_id']?>">
                                                <button type="submit" name="edit_btn"class="btn btn-warning">More Details</button>
                                            </form>                                   
                                            <a class="btn btn-primary" href="seeker/index.php">Apply Now</a>    
                                        </div>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: <?php echo $row['end_date'];?></small>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                                }else{
                                    echo "<h1><small class='text-truncate'> No Records</small></h1>";
                                }    
                            ?>
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0">
                        <?php
                            include("database\connect.php");
                            $displaySql="SELECT tbl_job.*,tbl_job_type.job_type,tbl_company.country
                            FROM tbl_job
                            LEFT JOIN tbl_company
                            ON tbl_job.company_id=tbl_company.company_id
                            LEFT JOIN tbl_job_type
                            ON tbl_job.type_id = tbl_job_type.type_id 
                            WHERE tbl_job_type.job_type='fulltime' and apStatus=1";
                            $query_run=mysqli_query($con,$displaySql);
                            if(mysqli_num_rows($query_run)>0)
                            {
                            while($row=mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3"><strong> Job Tittle:- </strong> <?php echo $row['job_tittle'];?> </h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row['country'];?></span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?php echo $row['job_type'];?></span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?php echo $row['job_salary'];?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">                                            
                                            <form action="job-detail.php" method="post">
                                                <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $row['job_id']?>">
                                                <button type="submit" name="edit_btn"class="btn btn-warning">More Details</button>
                                            </form>                                   
                                            <a class="btn btn-primary" href="seeker/index.php">Apply Now</a>   
                                        </div>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line:  <?php echo $row['end_date'];?></small>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        }else{
                            echo "<h1><small class='text-truncate'> No Records</small></h1>";
                        }    
                      ?>
                            <a class="btn btn-primary py-3 px-5" href="">Browse More Jobs</a>
                        </div>
                        <div id="tab-3" class="tab-pane fade show p-0">
                        <?php
                            include("database\connect.php");
                            $displaySql="SELECT tbl_job.*,tbl_job_type.job_type,tbl_company.country
                            FROM tbl_job
                            LEFT JOIN tbl_company
                            ON tbl_job.company_id=tbl_company.company_id
                            LEFT JOIN tbl_job_type
                            ON tbl_job.type_id = tbl_job_type.type_id WHERE tbl_job_type.job_type='parttime' and apStatus=1";
                            $query_run=mysqli_query($con,$displaySql);
                            if(mysqli_num_rows($query_run)>0)
                            {
                            while($row=mysqli_fetch_assoc($query_run))
                            {
                        ?>
                                <div class="job-item p-4 mb-4">
                                    <div class="row g-4">
                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                            <div class="text-start ps-4">
                                                <h5 class="mb-3"> Job Tittle:- </strong> <?php echo $row['job_tittle'];?> </h5>
                                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row['country'];?></span>
                                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?php echo $row['job_type'];?></span>
                                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?php echo $row['job_salary'];?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                            <div class="d-flex mb-3">          
                                                <form action="job-detail.php" method="post">
                                                    <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $row['job_id']?>">
                                                    <button type="submit" name="edit_btn"class="btn btn-warning">More Details</button>
                                                </form>                                   
                                                <a class="btn btn-primary" href="seeker/index.php">Apply Now</a>                                                    
                                            </div>
                                            <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line:  <?php echo $row['end_date'];?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
           
                    
                <?php
}
}else{
echo "<h1><small class='text-truncate'> No Records</small></h1>";
}    
?>    <a class="btn btn-primary py-3 px-5" href="">Browse More Jobs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jobs End -->

        <?php
        include 'add/footer.php';
        include 'add/scripts.php';
        ?>