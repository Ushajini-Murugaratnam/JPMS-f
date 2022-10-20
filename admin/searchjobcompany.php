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
                          <h6 class="m-0 font-weight-bold text-primary">company with jobs </h6>
                         </div>

                    <!-- Card Body -->
                        <div class="card-body">     
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="company_id" id="" class="form-control form-control-user">
                                    <?php
                                    include("database\connect.php");
                                    $find="SELECT DISTINCT company_id ,company_name FROM `tbl_company`";
                                    $result=mysqli_query($con,$find);
                                    while($row=mysqli_fetch_array($result))
                                    {
                                    echo "<option value='".$row['company_id']."'> ".$row['company_id']."  ".$row['company_name']." </option>";
                                    }
                                    ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="submit" name="filter">filter</button>  
                                    </div>
                                </div>
                            </div>
                        </form>                           
                                <!-- table start -->
                                <div class="table-responsive">
                                    <table class="table  table-bordered   table-hover" id="table"  cellspacing="0">
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
                                                <td>post_date</td>
                                                <td>end_date</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            include'../database/connect.php';
                                            if(isset($_POST['filter']))
                                            {
                                            $company_id=$_POST['company_id'];
                                            $sql="SELECT tbl_job.*,tbl_job_cat.category_name,tbl_job_type.job_type,tbl_company.company_name
                                            FROM tbl_job_cat
                                            INNER JOIN tbl_job
                                            ON tbl_job_cat.cat_id = tbl_job.cat_id
                                            inner JOIN tbl_job_type on tbl_job.type_id=tbl_job_type.type_id 
                                            inner join tbl_company on tbl_job.company_id=tbl_company.company_id
                                             where tbl_job.company_id=$company_id and tbl_job.apStatus=1";
                                            $query=mysqli_query($con,$sql);
                                            if(mysqli_num_rows($query)>0)
                                            {
                                            foreach($query as $row){
                                            ?>
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
                                                <td><?= $row['post_date'];?></td>
                                                <td><?= $row['end_date'];?></td>
                                            </tr>
                                            <?php
                                            }
                                            }else{
                                          //  echo'no record';
                                            }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table end-->
                        </div>
                </div>
               
            </div>
        </div>
        </div> </div>
 <!-- /.container-fluid -->

<!-- End of Page Wrapper -->

<?php
include 'add/scripts.php';
include 'add/footer.php';
?>
