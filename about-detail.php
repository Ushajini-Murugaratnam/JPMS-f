<?php
    include 'add/header.php';
    include 'add/navbar.php';
?>
   
        <!-- Navbar End -->


        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">About US  Detail</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">About US  Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- About US  Detail Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <?php
            include("database\connect.php");
            $displaySql="SELECT * FROM tbl_aboutus";
            $query_run=mysqli_query($con,$displaySql);
            if(mysqli_num_rows($query_run)>0)
            {
            while($row=mysqli_fetch_assoc($query_run))
            {
        ?>
            <div class="container">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            <div class="text-start ps-4">
                                <h3 class="mb-3">Tittle :- <?php echo $row['tittle'];?></h3>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: <?php echo $row['create_time'];?></small>
                            </div>
                        </div>

                        <div class="mb-5">
                        <?php echo '<img src="admin/upload/'.$row['uplod_image'].'" width="500px;" height="350px;"  alt="news-img">'?>                    
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h5 class="mb-3">
                            <span class="text-truncate me-3">Name : </span>
                                <br> <p> <?php echo $row['name'];?></p>
                            </h5>   
                            <h5 class="mb-3">     
                                <span class="text-truncate me-3">Desingnation :- </span>
                                <br> <p><?php echo $row['desingnation'];?></p>
                            </h5>

                            <h4 class="mb-3">description</h4>
                            <p>
                                <?php echo $row['description'];?>
                            <br>
                            <a href="<?php echo $row['link'];?>">Click Me</a> 
                            </p>     
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
        <!-- About US  Detail End -->
        <?php
        include 'add/footer.php';
        include 'add/scripts.php';
        ?>