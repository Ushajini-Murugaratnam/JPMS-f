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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add seeker  </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form name="reg" action="Manage/seekerManage.php" onsubmit="return validateForm()" method="post" id="reg"enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
       
       <div class="row">
           <div class="col-md-6 form-group">
               <label for="seeker_fname">First Name</label>                 
               <input type="text" class="form-control form-control-user" placeholder="first name"  name="seeker_fname" placeholder="first name"  required />
               <div class="invalid-feedback">        Please check invalid-feedback      </div>
           </div>
           <div class="col-md-6 form-group">
               <label for="last Name">Last Name</label> 
               <input type="text" class="form-control form-control-user" placeholder="last name"  name="seeker_lname" required />
               <div class="invalid-feedback">        Please check invalid-feedback      </div>
           </div>
       </div>
   <div class="row">
       <div class="col-md-6 form-group">
           <label for="last Name">mobile</label>                 
           <input type="text" class="form-control form-control-user"  placeholder="mobile" name="mobile" maxlength="10"  required />
           <div class="invalid-feedback">        Please check invalid-feedback      </div>
       </div> 
       <div class="col-md-6 form-group">
           <label for="last Name">email</label>                 
           <input type="email" class="form-control form-control-user" placeholder="email"   name="email" required />
           <div class="invalid-feedback">        Please check invalid-feedback      </div>
       </div>
   </div>
   <div class="row">
       <div class="col-md-6 form-group">
           <label for="last Name">Password</label>                 
           <input class="form-control form-control-user" placeholder="password"  type="password" name="password" required />
           <div class="invalid-feedback">        Please check invalid-feedback      </div>
       </div>
       <div class="col-md-6 form-group">
           <label for="last Name">confirm Password</label>                 
           <input class="form-control form-control-user" placeholder="conform password"  type="password"name="confirmpassword" required />
           <div class="invalid-feedback">        Please check invalid-feedback      </div>
       </div>
   </div>
   <div class="col-md-6 form-group">
                    <label for="last Name">choose file</label>                 
                    <input class="form-control form-control-user"  id="pdf" type="file" name="file" value="" required>
                </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="register_btn" type="submit" value="Submit" id="st-btn" >Save changes</button>
      </div>
    </div>
</form>
  </div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">seeker  </h1>                      
            <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add seeker</button>
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
                            <h6 class="m-0 font-weight-bold text-primary">seeker page </h6>
                         </div>

                    <!-- Card Body -->
                        <div class="card-body">                                
                                <!-- table start -->

                                <?php
                                if(isset($_SESSION['sucess'])&&$_SESSION['sucess']){                                    
                                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                         <strong>Admin!</strong>'.$_SESSION['sucess'].'
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>';
                                    unset($_SESSION['sucess']);
                                }elseif(isset($_SESSION['password_status'])&&$_SESSION['password_status']){                                    
                                echo '<div class="alert alert-success" role="alert">Admin <span class="close">'.$_SESSION['password_status'].'</span></div>';
                                unset($_SESSION['password_status']);
                                }else if(isset($_SESSION['mobile_status'])&&$_SESSION['mobile_status']){                                    
                                  echo '<div class="alert alert-success" role="alert">Admin <span class="close">'.$_SESSION['mobile_status'].'</span></div>';
                                  unset($_SESSION['mobile_status']);
                                }else if(isset($_SESSION['email_status'])&&$_SESSION['email_status']){
                                  echo '<div class="alert alert-success" role="alert">Admin <span class="close">'.$_SESSION['email_status'].'</span></div>';
                                  unset($_SESSION['email_status']);
                                  }else if(isset($_SESSION['status'])&&$_SESSION['status']){
                                  echo '<div class="alert alert-success" role="alert">Admin <span class="close">'.$_SESSION['status'].'</span></div>';
                                  unset($_SESSION['status']);
                                  }
                                ?>
                                <div class="table-responsive">
                                    <?php
                                      include("..\database\connect.php");
                                        $displaySql="SELECT * FROM  `tbl_seeker`";
                                        $query_run=mysqli_query($con,$displaySql);
                                    ?>

                                    <table class="table  table-bordered   table-hover" id="table"  cellspacing="0">
                                        <thead class="table-info">
                                            <tr>
                                            <th>seeker_id</th>
                                                <th>seeker_fname</th>
                                                <th>seeker_lname</th>
                                                <th>email</th>
                                                <th>mobile</th>
                                                <th>cv name</th>
                                                <th>Download</th>
                                            </tr>
                                        </thead>
                                        <tfoot class="table-info">
                                            <tr>
                                            <th>seeker_id</th>
                                                <th>seeker_fname</th>
                                                <th>seeker_lname</th>
                                                <th>email</th>
                                                <th>mobile</th>
                                                <th>cv name</th>
                                                <th>Download</th>
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
                                                <td><?php echo $row['seeker_id'];?></td>
                                                <td><?php echo $row['seeker_fname'];?></td>
                                                <td><?php echo $row['seeker_lname'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['mobile'];?></td>
                                                <td><?php echo $row['filename'];?></td>
                                                <td><a href="download.php?file=<?php echo $row['filename'] ?>">Download</a><br></td>
                                            </tr>
                                            <?php
                                            }
                                            }//else{
                                               // echo "no records found the database";
                                            //}                 
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table end-->
                        </div>
                </div>
               
            </div>
            </div>        </div>

 <!-- /.container-fluid -->

<!-- End of Page Wrapper -->

<?php
include 'add/scripts.php';
include 'add/footer.php';
?>
