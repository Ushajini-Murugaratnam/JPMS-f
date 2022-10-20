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
<?php
include('add/topbar.php');
?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Report </h1>                      
                            </div>                
    <!-- Content Row -->
    <div class="row"></div>
    <!-- Content Row -->
        <div class="row">
            <!-- Area Chart -->
            <div >
                <div class="card shadow mb-4">
                    <!-- User Details Table -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">category with jobs </h6>
                         </div>

                    <!-- Card Body -->
                        <div class="card-body">     
                        <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                        <select name="cat_id" id="" class="form-control form-control-user">
                                            <?php
                                            
                                                $find="SELECT DISTINCT cat_id ,category_name FROM `tbl_job_cat`";
                                                $result=mysqli_query($con,$find);
                                                while($row=mysqli_fetch_array($result))
                                            {
                                                echo "<option value='".$row['cat_id']."'> ".$row['cat_id']."  ".$row['category_name']." </option>";
                                            }
                                            ?>
                                        </select>
                                </div>
                            </div>     
                            <div class="col-md-6">
                                <button type="submit" name="filter">filter</button>  
                            </div>
                        </div>
                        </form>                           
                                <!-- table start -->
                                <div class="table-responsive">
                                    <table class="table  table-bordered table-hover" id="table"  cellspacing="0">
                                        <thead class="table-info">
                                            <tr>
                                            <th>job_id</th>
                                                <th>category_name</th>
                                                <th>type_id</th>
                                                <th>company_name</th>
                                                <th>job_tittle</th>
                                                <th>job_desc</th>
                                                <th>job_salary</th>
                                                <th>contact_name</th>
                                                <th>email</th>
                                                <th>mobile</th>
                                                <th>post_date</th>
                                                <th>end_date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            include'../database/connect.php';
                                            if(isset($_POST['filter']))
                                            {
                                              $cat_id=$_POST['cat_id'];
                                            
                                              $sql="SELECT tbl_job.*,tbl_job_cat.category_name,tbl_job_type.job_type,tbl_company.*
                                              FROM tbl_job
                                              LEFT JOIN tbl_job_cat
                                                ON tbl_job.cat_id = tbl_job_cat.cat_id
                                                LEFT JOIN tbl_job_type 
                                                on tbl_job.type_id=tbl_job_type.type_id 
                                                    LEFT join tbl_company 
                                                        on tbl_job.company_id=tbl_company.company_id
                                                            where tbl_job.cat_id=$cat_id 
                                                                and tbl_company.company_id = $loggedin_id and tbl_job.apStatus=1";
                                              $query=mysqli_query($con,$sql);
                                            
                                              if(mysqli_num_rows($query)>0)
                                                {
                                                  foreach($query as $row){
                                                    ?>
                                            <tr>
                                                <td><?= $row['job_id'];?></td>
                                                <td><?= $row['category_name'];?></td>
                                                <td><?= $row['type_id'];?>
                                                <td><?= $row['company_name'];?></td>
                                                <td><?= $row['job_tittle'];?></td>
                                                <td><?= $row['job_desc'];?></td>
                                                <td><?= $row['job_salary'];?></td>
                                                <td><?= $row['contact_name'];?></td>
                                                <td><?= $row['email'];?></td>
                                                <td><?= $row['mobile'];?></td>
                                                <td><?= $row['post_date'];?></td>
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
                                <!-- /.table end-->
                        </div>
                </div>
                </div>
            </div>
        </div>
 <!-- /.container-fluid -->

<!-- End of Page Wrapper -->

<?php
include 'add/scripts.php';
include 'add/footer.php';
?>
