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
            <!-- Button trigger modal -->
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
                            <h6 class="m-0 font-weight-bold text-primary">Jobs page </h6>
                           </div>

                    <!-- Card Body -->
                        <div class="card-body">      
                        <div class="table-responsive">                          
                                <!-- table start -->
                                    <?php
                                      include("..\database\connect.php");
                                        $displaySql=" SELECT tbl_job.*,tbl_job_cat.category_name,tbl_job_type.job_type,tbl_company.company_name
                                            FROM tbl_job_cat
                                            INNER JOIN tbl_job
                                            ON tbl_job_cat.cat_id = tbl_job.cat_id
                                            inner JOIN tbl_job_type on tbl_job.type_id=tbl_job_type.type_id 
                                            inner join tbl_company on tbl_job.company_id=tbl_company.company_id
                                             where tbl_job.apStatus=1";
                                        $query_run=mysqli_query($con,$displaySql);
                                    ?>
     
                                    <table class="table  table-bordered  table-hover" id="table"  cellspacing="0">
                                        <thead class="table-info">
                                            <tr>
                                                <td>job_id</td>
                                                <td>category_name</td>
                                                <td>job_type</td>
                                                <td>company_name</td>
                                                <td>job_tittle</td>
                                                <td>job_desc</td>
                                                <td>job_salary</td>
                                                <td>contact_name</td>
                                                <td>email</td>
                                                <td>mobile</td>
                                                <td>post_date</td>
                                                <td>end_date</td>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot class="table-info">
                                            <tr>
                                                <td>job_id</td>
                                                <td>category_name</td>
                                                <td>job_type</td>
                                                <td>company_name</td>
                                                <td>job_tittle</td>
                                                <td>job_desc</td>
                                                <td>job_salary</td>
                                                <td>contact_name</td>
                                                <td>email</td>
                                                <td>mobile</td>
                                                <td>post_date</td>
                                                <td>end_date</td>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            if(mysqli_num_rows($query_run)>0)
                                            {
                                                while($row=mysqli_fetch_assoc($query_run))
                                            {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['job_id'];?></td>
                                                <td><?php echo $row['category_name'];?></td>
                                                <td><?php echo $row['job_type'];?></td>
                                                <td><?php echo $row['company_name'];?></td>
                                                <td><?php echo $row['job_tittle'];?></td>
                                                <td><?php echo $row['job_desc'];?></td>
                                                <td><?php echo $row['job_salary'];?></td>
                                                <td><?php echo $row['contact_name'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['mobile'];?></td>
                                                <td><?php echo $row['post_date'];?></td>
                                                <td><?php echo $row['end_date'];?></td>
                                                
                                            
                                                </tr>
                                            <?php
                                            }
                                            }else{
                                          //      echo "no records found the database";
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
    </div>
 <!-- /.container-fluid -->

<!-- End of Page Wrapper -->

<?php
include 'add/scripts.php';
include 'add/footer.php';
?>


