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
        <h5 class="modal-title" id="exampleModalLabel">Add job  </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
            <form action="Manage/jobManage.php" method="POST" >
                <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label class="form-label" for="Category_name">category id</label>
                        <select name="cat_id" id="" class="form-control form-control-user" required>
                            <?php
                                include("..\database\connect.php");
                                $find="SELECT * FROM `tbl_job_cat`";
                                $result=mysqli_query($con,$find);
                                while($row=mysqli_fetch_array($result))
                                    {?>
                                <option value="<?php echo $row['cat_id'];?>"> id:- <?php echo $row['cat_id'];?> , category_name :<?php echo $row['category_name'];?></option>
                            <?php 
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label" for="job_type">job type id</label>
                        <select name="type_id" id="" class="form-control form-control-user" required>
                            <?php
                                include("..\database\connect.php");
                                $find="SELECT * FROM `tbl_job_type`";
                                $result=mysqli_query($con,$find);
                                while($row=mysqli_fetch_array($result))
                                    {?>
                                <option value="<?php echo $row['type_id'];?>"> id:-<?php echo $row['type_id'];?>type Name:- <?php echo $row['job_type'];?></option>
                            <?php 
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                             <!--        <label for="company_name"> Company Name</label>-->
                             <?php
                                include("..\database\connect.php");
                                $find="SELECT * FROM `tbl_company`  where company_id = $loggedin_id";
                                $result=mysqli_query($con,$find);
                                while($row=mysqli_fetch_array($result))
                                    {?>
                            <input type="hidden" class="form-control form-control-user" id="company_name" name="company_id" value="<?php echo $row['company_id'];?>" placeholder="company_name">
                            
                                <input type="hidden" class="form-control form-control-user" id="company_name" name="company_name"  value="<?php echo $row['company_name'];?>" placeholder="company_name">
                            <?php 
                            }
                            ?>
                        
                    </div>  
                </div>
                <div class="row">                
                    <div class="col-md-6 form-group">
                        <label class="form-label" for="job_tittle">job_tittle</label>
                        <input type="text" class="form-control form-control-user" required id="job_tittle" name="job_tittle" placeholder="job_tittle">
                    </div>
                    <div class="col-md-6 form-group">
                                <label class="form-label" for="job_description"> job description</label>
                        <input type="text" class="form-control form-control-user" required id="job_desc" name="job_desc" placeholder="job_desc">
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-md-6 form-group">
                                <label class="form-label" for="job_salary"> job salary</label>
                        <input type="number" class="form-control form-control-user" required id="job_salary" name="job_salary" placeholder="job_salary">
                    </div>
                    <div class="col-md-6 form-group">         
                                <label class="form-label" for="contact_name"> job contact name</label>
                        <input type="text" class="form-control form-control-user" required id="contact_name" name="contact_name" placeholder="contact_name">
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-md-6 form-group">
                                <label class="form-label" for="email"> contact email</label>
                        <input type="email" class="form-control form-control-user" required id="email" name="email" placeholder="email">
                    </div>
                    <div class="col-md-6 form-group">
                                <label class="form-label" for="mobile"> mobile</label>
                        <input type="text" class="form-control form-control-user" required id="mobile" maxlength="10" name="mobile" placeholder="mobile">
                    </div>
                    </div>
                <div class="row">     
                    <div class="col-md-6 form-group">
                            <label class="form-label" for="post_date"> post date</label>
                        <input type="date" class="form-control form-control-user" required id="post_date" name="post_date" placeholder="post_date">
                    </div>
                    <div class="col-md-6 form-group">
                            <label class="form-label" for="end_date">end date</label>
                        <input type="date" class="form-control form-control-user" required id="end_date"" name="end_date" placeholder="end_date">
                        </div>     </div>
                    
                 
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"name="register_btn" >Save changes</button>
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
                <h1 class="h3 mb-0 text-gray-800">Jobs  </h1>                      
            <!-- Button trigger modal -->
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addadminprofile">Add Jobs</button>
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
                                <!-- table start -->

                                <?php
                                if(isset($_SESSION['sucess'])&&$_SESSION['sucess']){                                    
                                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Admin!</strong>'.$_SESSION['sucess'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    unset($_SESSION['sucess']);
                                }else if(isset($_SESSION['status'])&&$_SESSION['status']){
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Admin!</strong>'.$_SESSION['status'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    unset($_SESSION['status']);
                                }else if(isset($_SESSION['mobile_status'])&&$_SESSION['mobile_status']){
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Admin!</strong>'.$_SESSION['mobile_status'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    unset($_SESSION['mobile_status']);
                                }
                                ?>
                                <div class="table-responsive">
                                     <?php
                                      include("..\database\connect.php");
                                        $displaySql="SELECT * from tbl_job where apStatus=1";
                                        $query_run=mysqli_query($con,$displaySql);
                                    ?>

                                    <table class="table  table-bordered   table-hover" id="table"  cellspacing="0">
                                        <thead class="table-info">
                                            <tr>
                                                 <td>category_name</td>
                                                <td>job_type_id</td>
                                                <td>company_name</td>
                                                <td>job_tittle</td>
                                                <td>job_desc</td>
                                                <td>job_salary</td>
                                                <td>contact_name</td>
                                                <td>email</td>
                                                <td>mobile</td>
                                                <td>post_date</td>
                                                <td>end_date</td>
                                                <th>Edit</th>
                                                <th>Disable</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if(mysqli_num_rows($query_run)>0)
                                            {
                                                while($row=mysqli_fetch_assoc($query_run))
                                            {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['cat_id'];?></td>
                                                <td><?php echo $row['type_id'];?></td>
                                                <td><?php echo $row['company_id'];?></td>
                                                <td><?php echo $row['job_tittle'];?></td>
                                                <td><?php echo $row['job_desc'];?></td>
                                                <td><?php echo $row['job_salary'];?></td>
                                                <td><?php echo $row['contact_name'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['mobile'];?></td>
                                                <td><?php echo $row['post_date'];?></td>
                                                <td><?php echo $row['end_date'];?></td>
                                                <td>
                                                    <form action="jobEdit.php" method="post">
                                                        <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $row['job_id']?>">
                                                        <button type="submit" name="edit_btn"class="btn btn-warning">Edit</button>
                                                    </form>
                                                </td>
                                                
                                                <td>check it please:- 
                                               
                                               <?php  
                                        if ($row['apStatus'] == 1) {
                                           echo '<a href="apStatus.php?job_id='.$row['job_id'].'&apStatus=0" class=" link-danger">Disable</a>';
                                        } 
                                        else{
                                           echo '<a href="apStatus.php?job_id='.$row['job_id'].'&apStatus=1"class=" link-success">Apply</a>';
                                        }
                                    ?>
                                   </td>
                                            </tr>
                                            <?php
                                            }
                                            }else{
                                              //  echo "no records found the database";
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
