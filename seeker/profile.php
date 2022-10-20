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
                <?php
                                if(isset($_SESSION['sucess'])&&$_SESSION['sucess']){                                    
                                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>User!</strong>'.$_SESSION['sucess'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    unset($_SESSION['sucess']);
                                }
                                ?>
                  <div class="container py-15 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                      <div class="col col-lg-6 mb-4 mb-lg-0">
                        <div class="card mb-3" style="border-radius: .5rem;">
                          <?php
                          $sql="SELECT * FROM tbl_seeker where seeker_id=$loggedin_id";
                          $result=mysqli_query($con,$sql);
                          ?>
                          <?php
                          while($rows=mysqli_fetch_array($result)){
                          ?>
                          <div class="row g-0">
                            
                            <div class="col-md-8">
                              <div class="card-body p-4">
                              <h6>Personal Information</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                  <div class="col-6 mb-3">
                                    <h6>First Name</h6>
                                    <p class="text-muted"><?php echo $rows['seeker_fname']; ?></p>
                                  </div>
                                  <div class="col-6 mb-3">
                                    <h6>Last Name</h6>
                                    <p class="text-muted"><?php echo $rows['seeker_lname']; ?></p>
                                  </div>
                                </div>
                                <div class="row pt-1">
                                  <div class="col-6 mb-3">
                                    <h6>Email</h6>
                                    <p class="text-muted">
<a href="download.php?file=<?php echo $rows['filename'] ?>">Download</a><br></td></p>
                                  </div>
                                  <div class="col-6 mb-3">
                                    <h6>Email</h6>
                                    <p class="text-muted"><?php echo $rows['email']; ?></p>
                                  </div>
                                </div>
                                <div class="row pt-1">
                                  <div class="col-6 mb-3">
                                    <h6>Password</h6>
                                    <p class="text-muted"><?php echo $rows['password']; ?></p>
                                  </div>
                                  
                                  <div class="col-6 mb-3">
                                    <h6>Phone</h6>
                                    <p class="text-muted"><?php echo $rows['mobile']; ?></p>
                                  </div>
                                </div>
                                <div class="d-flex justify-content-start">
                                <form action="profileUpdate.php" method="post">
                                                        <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $row['seeker_id']?>">
                                                        <button type="submit" name="edit_btn"class="btn btn-secoundary"><i class="fa fa-wrench" aria-hidden="true"> Update Account</i></button>
                                  </form>
                                </div>
                                  <hr class="mt-0 mb-4">
                                  <form action="Manage/profileManage.php" method="post">
                                                        <input type="hidden" name="delete_id" id="delete_id" value="<?php echo $row['seeker_id']?>">
                                                        <button type="submit"  name="deletebtn" class="btn btn-danger">Delete</button>
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

