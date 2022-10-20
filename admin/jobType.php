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
<!-- Modal -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Job  Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
            <form action="Manage/jobTypeManage.php" method="POST" >
                <div class="modal-body">
                    <div class="form-group">
                        <label for="job_type" class="form-label">type name</label>
                        <input type="text" class="form-control form-control-user" required id=job_type name=job_type placeholder=job_type>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"name="registerbtn" >Save changes</button>
                    </div>
                </div>
            </form>
            </div>
    </div>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Job Type</h1>                      
            <!-- Button trigger modal -->
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addadminprofile">Add job  type</button>
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
                            <h6 class="m-0 font-weight-bold text-primary">job  type page </h6>
                         </div>

                    <!-- Card Body -->
                        <div class="card-body">                                
                                <!-- table start -->
                            <?php
                                if(isset($_SESSION['sucess'])&&$_SESSION['sucess']){                                    
                                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Admin!</strong>'.$_SESSION['sucess'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    unset($_SESSION['sucess']);
                                }else if(isset($_SESSION['type_status'])&&$_SESSION['type_status']){
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Admin!</strong>'.$_SESSION['type_status'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    unset($_SESSION['type_status']);
                                }else if(isset($_SESSION['status'])&&$_SESSION['status']){
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Admin!</strong>'.$_SESSION['status'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    unset($_SESSION['status']);
                                }
                                ?>
                                <div class="table-responsive">
                                    <?php
                                      include("..\database\connect.php");
                                        $displaySql="SELECT * FROM  `tbl_job_type`";
                                        $query_run=mysqli_query($con,$displaySql);
                                    ?>

                                    <table class="table  table-bordered   table-hover" id="table"  cellspacing="0">
                                        <thead class="table-info">
                                            <tr>
                                                <th>id</th>
                                                <th>Type name</th>    
                                                <th>Edit </th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot class="table-info">
                                            <tr>
                                                 <th>Type ID</th>                                     
                                                <th>Type Name</th>                          
                                                <th>Edit </th>
                                                <th>Delete</th>
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
                                                <td><?php echo $row['type_id'];?></td>
                                                <td><?php echo $row['job_type'];?></td>
                                                <td>
                                                    <form action="jobTypeEdit.php" method="post">
                                                        <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $row['type_id']?>">
                                                        <button type="submit" name="edit_btn"class="btn btn-warning">Edit</button>
                                                    </form>
                                                </td>
                                                <td>                                
                                                    <form action="Manage/jobTypeManage.php" method="post">
                                                        <input type="hidden" name="delete_id" id="delete_id" value="<?php echo $row['type_id']?>">
                                                        <button type="submit"  name="deletebtn" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td> 
                                            </tr>
                                            <?php
                                            }
                                            }else{
                                            //    echo "no records found the database";
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
</div>
<!-- End of Page Wrapper -->

<?php
include 'add/scripts.php';
include 'add/footer.php';
?>


