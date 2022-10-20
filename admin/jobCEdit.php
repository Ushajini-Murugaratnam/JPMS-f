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
                <h1 class="h3 mb-0 text-gray-800">Admin dashboard</h1>                      
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
                        <h6 class="m-0 font-weight-bold text-primary">update your work category details</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <?php   
                           include("..\database\connect.php");
                        //Retrive data
                        if(isset($_POST['edit_btn']))
                        {
                            $id = $_POST['edit_id'];
                            $editSql="SELECT * FROM `tbl_job_cat` WHERE cat_id='$id'";
                            $Query_run=mysqli_query($con,$editSql);
                                foreach($Query_run as $row)
                            {
                        ?>
                        <form action="Manage/jobCManage.php" method="POST">
                            <div class="form-group">
                        <label for="category_id" class="form-label">Category id</label>
                                <input type="text" name="edit_cat_id" class="form-control"  readonly value="<?php echo $row['cat_id']?>">
                            </div> 
                            <div class="form-group">
                        <label for="category_name" class="form-label">Category Name</label>
                                <input type="text" class="form-control" cat_id="category_name" name="edit_category_name" placeholder="category_name" value="<?php echo $row['category_name']?>">
                            </div> 
                                <button type="submit" class="btn btn-primary"name="updatebtn">Save changes</button>    
                                <a href="jobCategory.php" class="btn btn-primary">cancel</a>
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

