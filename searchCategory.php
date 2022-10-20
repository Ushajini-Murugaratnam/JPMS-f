<?php
    include 'add/header.php';
    include 'add/navbar.php';
?>
      
        <!-- Carousel Start -->
        <div class="container-fluid p-0">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Find The Perfect Job That You Deserved</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                    <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Job</a>
                                    <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A Talent</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Find The Best Startup Job That Fit You</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                    <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Job</a>
                                    <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A Talent</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
            <form action="" method="POST">
                <div class="row g-2">
                    <div class="col-md-10">
                    
                        <div class="row g-2">
                            <div class="col-md-6">
                                <select name="cat_id" id="" class="form-control form-control-user">
                                    <option selected>Category</option>
                                    <?php
                                        include("database\connect.php");
                                        $find="SELECT *FROM `tbl_job_cat`";
                                        $result=mysqli_query($con,$find);
                                        while($row=mysqli_fetch_array($result))
                                    {
                                        echo "<option value='".$row['cat_id']."'>  ".$row['category_name']." </option>"; 
                                    }
                                    ?>
                                </select>                           
                            </div>
                            <div class="col-md-4">
                                <button  class="btn btn-dark border-0 w-80" type="submit" name="filter">Search</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </form>   
        </div>
    </div>
        <!-- Search End -->

        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <table class="table table-bordered table-hover" id="table"  cellspacing="1">
                        <thead class="table-info">
                        <tr>
                        <td>job_id</td>
                        <td>category_name</td>
                        <td>job_type
                        <td>company_name</td>
                        <td>job_tittle</td>
                        <td>job_desc</td>
                        <td>job_salary</td>
                        <td>job_type</td>
                        <td>contact_name</td>
                        <td>email</td>
                        <td>mobile</td>
                        <td>end_date</td>
                        </tr>
                        </thead>
                        <tfoot class="table-info">
                        <tr>
                        <td>job_id</td>
                        <td>category_name</td>
                        <td>job_type
                        <td>company_name</td>
                        <td>job_tittle</td>
                        <td>job_desc</td>
                        <td>job_salary</td>
                        <td>job_type</td>
                        <td>contact_name</td>
                        <td>email</td>
                        <td>mobile</td>
                        <td>end_date</td>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php 
                        include'database/connect.php';
                        if(isset($_POST['filter']))
                        {
                        $cat_id=$_POST['cat_id'];
                        
                        
                        $sql="SELECT DISTINCT tbl_job.type_id, tbl_job.*, tbl_job_cat.*,tbl_job_type.*,tbl_company.*
                        FROM tbl_job
                        LEFT JOIN tbl_job_cat
                            ON tbl_job.cat_id = tbl_job_cat.cat_id
                            LEFT JOIN tbl_job_type 
                            on tbl_job.type_id=tbl_job_type.type_id 
                                LEFT join tbl_company 
                                on tbl_job.company_id=tbl_company.company_id where tbl_job.cat_id=$cat_id and tbl_job.apStatus=1";

                       
                        $query=mysqli_query($con,$sql);

                        if(mysqli_num_rows($query)>0)
                        {
                        foreach($query as $row){?>
                        <tr>
                        
                        <td><?= $row['job_id'];?></td>
                        <td><?= $row['category_name'];?></td>
                        <td><?= $row['job_type'];?>
                        <td><?= $row['company_name'];?></td>
                        <td><?= $row['job_tittle'];?></td>
                        <td><?= $row['job_desc'];?></td>
                        <td><?= $row['job_salary'];?></td>
                        <td><?= $row['job_type'];?></td>
                        <td><?= $row['contact_name'];?></td>
                        <td><?= $row['email'];?></td>
                        <td><?= $row['mobile'];?></td>
                        <td><?= $row['end_date'];?></td>
                        </tr>
                        <?php
                        }
                        }else{
                     //   echo'no record';
                        }
                        }
                        ?>
                        </tbody>
                </table>
            </div>  
        </div>
        
      

       

     

<?php
        include 'add/footer.php';
        include 'add/scripts.php';
        ?>