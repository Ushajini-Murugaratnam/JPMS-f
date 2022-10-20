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
        <div class="d-sm-flex align-items-center justify-content-between">   
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
                        <h6 class="m-0 font-weight-bold text-primary">job apply </h6>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                
            <form action="Manage/applicationManage.php" method="POST" >
                <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="form-group"> 
                            <label class="form-label" for="job_id"> job Id : Name</label>
                            <select name="job_id" id=""class="form-control form-control-user" >
                                <?php
                                    include("..\database\connect.php");
                                    $find="SELECT * FROM `tbl_job` where apStatus=1";
                                    $result=mysqli_query($con,$find);
                                    while($row=mysqli_fetch_array($result))
                                        {?>
                                    <option value="<?php echo $row['job_id'];?>"> job Id:-<?php echo $row['job_id'];?>,jobTittle:-<?php echo $row['job_tittle'];?> </option>
                                    <?php 
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group"> 
                            <label class="form-label" for="job_tittle"> job Id : Name</label>
                            <select name="job_tittle" id=""class="form-control form-control-user" >
                                <?php
                                    include("..\database\connect.php");
                                    $find="SELECT * FROM `tbl_job` where apStatus=1";
                                    $result=mysqli_query($con,$find);
                                    while($row=mysqli_fetch_array($result))
                                        {?>
                                    <option value="<?php echo $row['job_tittle'];?>"> job Id:-<?php echo $row['job_id'];?>,jobTittle:-<?php echo $row['job_tittle'];?> </option>
                                    <?php 
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="form-group "> 
                            <label class="form-label" for="job_id"> job Id : Name</label>
                            <select name="company_email" id=""class="form-control form-control-user" >
                                <?php
                                    include("..\database\connect.php");
                                    $find="SELECT * FROM `tbl_job` where apStatus=1";
                                    $result=mysqli_query($con,$find);
                                    while($row=mysqli_fetch_array($result))
                                        {?>
                                    <option value="<?php echo $row['email'];?>"> job Id:-<?php echo $row['job_id'];?>,jobTittle:-<?php echo $row['email'];?> </option>
                                    <?php 
                                }
                                ?>
                            </select>
                        </div>
                    </div></div>
                <div class="row">
                    <div class="form-group">
                    <?php
                                include("..\database\connect.php");
                                $find="SELECT * FROM tbl_seeker where seeker_id=$loggedin_id";
                                $result=mysqli_query($con,$find);
                                while($row=mysqli_fetch_array($result))
                                    {?>
                    
                            <input type="hidden" class="form-control form-control-user" id="seeker_id" name="seeker_id" value="<?php echo $row['seeker_id'];?>"placeholder="seeker_fname">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 ">                    
                        <div class="form-group ">
                            <label class="form-label" for="company_name"> seeker first Name</label>
                            <input type="text" class="form-control form-control-user" id="seeker_fname" name="seeker_fname" value="<?php echo $row['seeker_fname'];?>" placeholder="seeker_fname">
                        </div>
                    </div>                    
                    <div class="col-md-6 "> 
                        <div class="form-group">
                            <label class="form-label" for="company_name"> seeker last Name</label>
                            <input type="text" class="form-control form-control-user" id="seeker_lname" name="seeker_lname" value="<?php echo $row['seeker_lname'];?>" placeholder="seeker_lname">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="form-group">                        
                            <label class="form-label" for="company_name"> email</label>
                            <input type="text" readonly class="form-control form-control-user" id="email" name="email" placeholder="email" value="<?php echo $row['email'];?>">
                        </div>
                    </div>                    
                    <div class="col-md-6 "> 
                        <div class="form-group">
                            <label class="form-label" for="company_name">mobile</label>
                            <input type="number" class="form-control form-control-user" id="mobile" name="mobile" placeholder="mobile" value="<?php echo $row['mobile'];?>">
                        </div>
                    </div>
                    
                </div>  
                        
                                  
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary"name="registerbtn" >Save changes</button>
                    </div>
                </div>
            </form>
            </div>    <?php 
                        }
                        ?>
                </div>
            </div>
        </div>
        </div> 

<?php
include 'add/scripts.php';
include 'add/footer.php';
?>