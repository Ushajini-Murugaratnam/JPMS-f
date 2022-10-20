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
                <h1 class="h3 mb-0 text-gray-800"> dashboard</h1>                      
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
                            $editSql="SELECT * FROM `tbl_company` WHERE company_id = $loggedin_id";
                            $Query_run=mysqli_query($con,$editSql);
                                foreach($Query_run as $row)
                            {
                        ?>
                        <form name="edit_reg" action="Manage/profileManage.php" onsubmit="return validateForm()" method="post" id="reg"class="row g-3 needs-validation" novalidate>
                          
                        <div class="row">
                            <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                    <input type="hidden" name="edit_company_id"  value="<?php echo $row['company_id']?>">

                            
                            </div>
                            </div>
                              <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="company_name">company name</label>
                                        <input type="text" id="company_name" name="edit_company_name" class="form-control"  value="<?php echo $row['company_name']?>" />

                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="web">web</label>
                                        <input type="text" id="web" name="edit_web" class="form-control"  value="<?php echo $row['web']?>" />

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline ">
                                        <label class="form-label" for="email">Email address</label>
                                        <input type="email" id="email" name="edit_email" class="form-control"  value="<?php echo $row['email']?>" />

                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="mobile">mobile</label>
                                        <input type="tel" id="email" name="edit_mobile" class="form-control"  value="<?php echo $row['mobile']?>" />

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" id="password" name="edit_password" class="form-control"  value="<?php echo $row['password']?>" />

                                    </div>
                                </div>
                           
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="address">Address</label>
                                        <input type="text" id="address" name="edit_address" class="form-control"  value="<?php echo $row['address']?>" />

                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="country">country</label>
                                        <input type="text" id="country" name="edit_country" class="form-control"  value="<?php echo $row['country']?>" />

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
                        <?php
                        }}
                        ?>
                        </form>
                    </div>

                </div>
            </div>
        </div>
                <!-- /.container-fluid -->
                </div></div>
            <!-- End of Main Content -->

            <?php
include 'add/scripts.php';
include 'add/footer.php';
?>

