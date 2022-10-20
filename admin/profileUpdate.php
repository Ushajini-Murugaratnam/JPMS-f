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
                  
            </div>
    <!-- Content Row -->
        <div class="row"></div>
    <!-- Content Row -->
        <div class="row">
            <!-- Area Chart -->
            <div >
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">update your Personal Details</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <?php   
                           include("..\database\connect.php");
                        //Retrive data
                        if(isset($_POST['edit_btn']))
                        {
                            $id = $_POST['edit_id'];
                            $editSql="SELECT * FROM `tbl_admin` WHERE ad_id = $loggedin_id";
                            $Query_run=mysqli_query($con,$editSql);
                                foreach($Query_run as $row)
                            {
                        ?>
                        <form action="Manage/profileManage.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                            <div class="form-outline">
                                    <input type="hidden" name="edit_ad_id"  value="<?php echo $row['ad_id']?>">
                                <input type="text" id="fullname" name="edit_fullname" class="form-control" value="<?php echo $row['fullname']?>" />

                                <label class="form-label" for="fullname">Full name</label>
                            </div>
                            </div>
                            <div class="col-md-6 mb-2">
                            <div class="form-outline">
                                <input type="text" id="username" name="edit_username" class="form-control" value="<?php echo $row['username']?>" />

                                <label class="form-label" for="username">user name</label>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                                <!-- Email input -->
                            <div class="col-md-6 mb-2">
                            <div class="form-outline mb-2">
                                <input type="email" id="email" name="edit_email" class="form-control" value="<?php echo $row['email']?>" />
                            
                                <label class="form-label" for="email">Email address</label>
                            </div>
                            </div> 
                                <!-- mobile input -->
                            <div class="col-md-6 mb-2">
                            <div class="form-outline mb-2">
                                <input type="text" id="mobile" name="edit_mobile" maxlength="10"class="form-control" value="<?php echo $row['mobile']?>" />
                            
                                <label class="form-label" for="mobile">mobile</label>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                            <div class="form-outline">
                                <input type="password" id="password" name="edit_password" class="form-control" value="<?php echo $row['password']?>" />
        
                                <label class="form-label" for="password">Password</label>
                            </div>
                            </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="d-grid gap-2 d-md-block">
                                <div class="col-md-6 mb-2"> 
                                    <button class="btn btn-primary" type="submit" class="btn btn-primary"name="updatebtn">Save changes </button>
                                    <a href="profile.php" class="btn btn-primary" type="button">cancel</a>
                                </div>
                            </div>
                        </div>
                            </div>
                            </div>
        
         
                        <?php
                        }}
                        ?>
                        </form>
                    </div>

                </div>
            </div>

                <!-- /.container-fluid -->
    
            <!-- End of Main Content -->

            <?php
include 'add/scripts.php';
include 'add/footer.php';
?>

