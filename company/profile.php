<?php
 include('session.php');
include 'add/header.php';
include 'add/navbar.php';
?>
<link rel="stylesheet" href="add/css/profile.css">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php  include 'add/topbar.php';?>
                <!-- End of Topbar -->


                <section class="vh-800" style="background-color: #f4f5f7;">
                  <div class="container py-15 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                      <div class="col col-lg-6 mb-4 mb-lg-0">
                         <?php
                                if(isset($_SESSION['sucess'])&&$_SESSION['sucess']){                                    
                                    echo '<div class="alert alert-success" role="alert">Admin <span class="close">'.$_SESSION['sucess'].'</span></div>';
                                    unset($_SESSION['sucess']);
                                }else if(isset($_SESSION['status'])&&$_SESSION['status']){
                                    echo '<div class="alert alert-warning" role="alert">Admin <span class="close">'.$_SESSION['status'].'</span></div>';
                                    unset($_SESSION['tatus']);
                                }
                                ?>
                        <div class="card mb-3" style="border-radius: .5rem;">
                          <?php
                          $sql="SELECT * FROM tbl_company where company_id =$loggedin_id";
                          $result=mysqli_query($con,$sql);
                          ?>
                          <?php
                          while($rows=mysqli_fetch_array($result)){
                          ?>
                          <div class="row g-0">
                            
                            <div class="col-md">
                              <div class="card-body p-4">
                              <h6>Personal Information</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                  <div class="col-4 mb-3">
                                    <h6>company name</h6>
                                    <p class="text-muted"><?php echo $rows['company_name']; ?></p>
                                  </div>
                                  <div class="col-4 mb-3">
                                    <h6>company id</h6>
                                    <p class="text-muted"><?php echo $rows['company_id']; ?></p>
                                  </div>
                                  <div class="col-4 mb-3">
                                    <h6>mobile</h6>
                                    <p class="text-muted"><?php echo $rows['mobile']; ?></p>
                                  </div>
                                </div>
                               
                              
                                <div class="row pt-1">
                                  <div class="col-6 mb-3">
                                      <h6>Email</h6>
                                    <p class="text-muted"><?php echo $rows['email']; ?></p>
                                    </div>
                                    <div class="col-6 mb-3">
                                      <h6>Password</h6>
                                      <p class="text-muted"><?php echo $rows['password']; ?></p>
                                    </div>
                                </div>
                                  
                                <div class="row pt-1">
                                  <div class="col-6 mb-3">
                                    <h6>address</h6>
                                    <p class="text-muted"><?php echo $rows['address']; ?></p>
                                  </div>
                                  
                                  <div class="col-6 mb-3">
                                    <h6>Country</h6>
                                   <p class="text-muted"><?php echo $rows['country']; ?></p>
                                  </div>
                                  <hr class="mt-0 mb-4">
                          </div><div class="d-flex justify-content-start">
                                <form action="profileUpdate.php" method="post">
                                                        <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $row['company_id']?>">
                                                        <button type="submit" name="edit_btn"class="btn btn-light"><i class="fa fa-wrench" aria-hidden="true"> Update Account</i></button>
                                  </form>
                                
                                <form action="Manage/profileManage.php" method="post">
                                                        <input type="hidden" name="delete_id" id="delete_id" value="<?php echo $row['company_id']?>">
                                                        <button type="submit"  name="deletebtn" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"> Remove you account</i></button>
                                                    </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php 
                        // close while loop 
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </section>
           
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php
include 'add/scripts.php';
include 'add/footer.php';
?>

