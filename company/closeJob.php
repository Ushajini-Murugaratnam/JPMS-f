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
                <h1 class="h3 mb-0 text-gray-800"> Closed  job  </h1>                      
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
                            <h6 class="m-0 font-weight-bold text-primary"> Closed  job page </h6>
                         </div>

                    <!-- Card Body -->
                        <div class="card-body">                                
                         
                                <div class="table-responsive">
                                    <?php
                                      include("..\database\connect.php");
                                        $displaySql="SELECT tbl_job.*,tbl_job_cat.category_name,tbl_job_type.job_type,tbl_company.*
                                        FROM tbl_job
                                        LEFT JOIN tbl_job_cat
                                          ON tbl_job.cat_id = tbl_job_cat.cat_id
                                          LEFT JOIN tbl_job_type 
                                          on tbl_job.type_id=tbl_job_type.type_id 
                                              LEFT join tbl_company 
                                                on tbl_job.company_id=tbl_company.company_id
                                                    where tbl_company.company_id = $loggedin_id and apStatus=0";
                                        $query_run=mysqli_query($con,$displaySql);
                                    ?>

                            <table class="table  table-bordered   table-hover"" id="table"  cellspacing="0">
                                        <thead class="table-info">
                                            <tr>
                                                <th>job_id</th>
                                                <th>category_name</th>
                                                <th>job_type</th>
                                                <th>company_name</th>
                                                <th>job_tittle</th>
                                                <th>job_desc</th>
                                                <th>job_salary</th>
                                                <th>contact_name</th>
                                                <th>email</th>
                                                <th>mobile</th>
                                                <th>post_date</th>
                                                <th>end_date</th>
                                                <th>status</th>
                                            </tr>
                                        </thead>
                                        <tfoot class="table-info">
                                            <tr>
                                                <th>job_id</th>
                                                <th>category_name</th>
                                                <th>job_type</th>
                                                <th>company_name</th>
                                                <th>job_tittle</th>
                                                <th>job_desc</th>
                                                <th>job_salary</th>
                                                <th>contact_name</th>
                                                <th>email</th>
                                                <th>mobile</th>
                                                <th>post_date</th>
                                                <th>end_date</th>
                                                <th>status</th>
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
                                                <td>check it please:- 
                                               
                                               <?php  
                                        if ($row['apStatus'] == 1) {
                                           echo '<a href="apStatus.php?job_id='.$row['job_id'].'&apStatus=0" class=" link-danger">Disable</a>';
                                        } 
                                        else{
                                           echo '<a href="apStatus.php?job_id='.$row['job_id'].'&apStatus=1"class=" link-success">Apply</a>';
                                        }
                                    ?>
                                   </td                                             
                                               </tr>
                                            <?php
                                            }
                                            }else{
                                               // echo "no records found the database";
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
    </div>
 <!-- /.container-fluid -->

<!-- End of Page Wrapper -->

<?php
include 'add/scripts.php';
include 'add/footer.php';
?>


