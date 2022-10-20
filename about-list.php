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
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">News</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="tab-content">
              
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                        <?php
            include("database\connect.php");
            $displaySql="SELECT * FROM tbl_aboutus";
            $query_run=mysqli_query($con,$displaySql);
            if(mysqli_num_rows($query_run)>0)
            {
            while($row=mysqli_fetch_assoc($query_run))
            {
          ?>
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg" alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3"> <?php echo $row['tittle'];?></h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row['name'];?></span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?php echo $row['desingnation'];?></span>
                                          </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: <?php echo $row['create_time'];?></small>
                                    </div>
                                    <form action="about-detail.php" method="post">
                                                <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $row['id']?>">
                                                <button type="submit" name="edit_btn"class="btn btn-warning">More Details</button>
                                            </form>    
                                </div>
                            </div>
                            <?php
            }
            }else{
                echo "<h1><small class='text-truncate'> No Records</small></h1>";
            }    
          ?>
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