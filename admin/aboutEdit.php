<?php

include("session.php");
include('add/header.php');
include('add/navbar.php');
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
                        <h6 class="m-0 font-weight-bold text-primary">Edit About content</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <?php   
                        include("..\database\connect.php");
                        //Retrive data
                        if(isset($_POST['edit_btn']))
                        {
                            $id = $_POST['edit_id'];
                            $editSql="SELECT * FROM `tbl_aboutus` WHERE id='$id'";
                            $Query_run=mysqli_query($con,$editSql);
                                foreach($Query_run as $row)
                            {
                        ?>
                        <form action="Manage/aboutManage.php" method="POST" enctype="multipart/form-data" >
                            <div class="form-group">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
                                <input type="text" class="form-control form-control-user" id="edit_name" name="edit_name" placeholder="name" value="<?php echo $row['name']?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="edit_desingnation" name="edit_desingnation" placeholder="desingnation"value="<?php echo $row['desingnation']?>">
                            </div>     
                    
                            <div class="form-group">
                              
                                <input type="text" class="form-control form-control-user" id="tittle" name="edit_tittle" placeholder="tittle" value="<?php echo $row['tittle']?>">
                            </div>
                          
                            <div class="form-group">
                                <textarea id="description" class="form-control form-control-user" name="edit_description" placeholder="description"rows="4" cols="50" value="<?php echo $row['description']?>"></textarea>                            
                            </div>        
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="link" placeholder="link"name="edit_link" value="<?php echo $row['link']?>">
                            </div>        
                            <button type="submit" class="btn btn-primary"name="updatebtn">Save changes</button>    
                            <a href="aboutContent.php" class="btn btn-primary">cancel</a>
                        <?php
                        }}
                        ?>
                        </form>
                    </div>

                </div>
            </div>
        </div>
                <!-- /.container-fluid -->
                </div>
            <!-- End of Main Content -->
<?php
include('add\scripts.php');
?>