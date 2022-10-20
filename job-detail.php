<?php
    include 'add/header.php';
    include 'add/navbar.php';
?>
   
        <!-- Navbar End -->


        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Job Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Job Detail Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <?php
            include("database\connect.php");

            if(isset($_POST['edit_btn']))
            {
                $id = $_POST['edit_id'];
                $editSql="SELECT tbl_job.*,tbl_job_type.job_type,tbl_company.country,address,company_name
                FROM tbl_job
                LEFT JOIN tbl_company
                ON tbl_job.company_id=tbl_company.company_id
                LEFT JOIN tbl_job_type
                ON tbl_job.type_id = tbl_job_type.type_id  WHERE job_id='$id'";

                $Query_run=mysqli_query($con,$editSql);
                    foreach($Query_run as $row)
                {
        ?>
            <div class="container">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            <div class="text-start ps-4">
                                <h3 class="mb-3"><?php echo $row['job_tittle'];?></h3>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row['address'];?>,<?php echo $row['country'];?></span>
                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?php echo $row['job_type'];?></span>
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?php echo $row['job_salary'];?></span>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: <?php echo $row['end_date'];?></small>

                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Job description</h4>
                            <p>
                            <?php echo $row['job_desc'];?>
                            </p>
                            <h4 class="mb-3">Qualifications</h4>
                            <p><?php echo $row['job_qualification'];?></p>
                         
                        </div>
        
                        <div class="">
                            <div class="col-12">
                                <a href="seeker/index.php"> <button class="btn btn-primary " type="submit">Apply Now</button></a>
                            </div>                            
                        </div>
                    </div>
        
                    <div class="col-lg-4">
                        <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Job Summery</h4>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Published On:  <?php echo $row['post_date'];?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: <?php echo $row['job_type'];?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: <?php echo $row['job_salary'];?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Addrsss: <?php echo $row['address'];?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Country:<?php echo $row['country'];?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Contact Name :-<?php echo $row['contact_name'];?></p>
                            <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Date Line: <?php echo $row['end_date'];?></p>
                        </div>
                        <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Company Detail</h4>                
                            <p class="m-0">Company Name :- <?php echo $row['company_name'];?></p>
                            <p class="m-0">Company Email :-<?php echo $row['email'];?></p>
                            <p class="m-0">Company Mobile :-<?php echo $row['mobile'];?></p>
                        </div>
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
        <!-- Job Detail End -->
        <?php
        include 'add/footer.php';
        include 'add/scripts.php';
        ?>