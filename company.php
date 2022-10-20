<?php
    include 'add/header.php';
    include 'add/navbar.php';
?>
     <!-- Navbar End -->


        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Company</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Company</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Company Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Company</h1>
           
                <div class="row g-4">     <?php
            include("database\connect.php");
            $displaySql="SELECT * FROM tbl_company";
            $query_run=mysqli_query($con,$displaySql);
            if(mysqli_num_rows($query_run)>0)
            {
            while($row=mysqli_fetch_assoc($query_run))
            {
          ?>
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item bg-muted rounded p-4" href="">
                            <i class="fa fa-3x fa-building text-primary mb-4"></i>
                            <h6 class="mb-3"><?php echo $row['company_name'];?></h6>
                            <p class="mb-0">Company Name <?php echo $row['company_name'];?>
                            <?php echo $row['email'];?><br>
                            <?php echo $row['mobile'];?><br>
                            <?php echo $row['address'];?> <br>
                            <?php echo $row['country'];?>
                            </p>
                        </a>
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
        <!-- Company End -->


        <!-- Footer Start -->
    

        <?php
        include 'add/footer.php';
        include 'add/scripts.php';
        ?>