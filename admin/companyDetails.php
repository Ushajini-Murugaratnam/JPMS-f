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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add company  </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form name="reg" action="Manage/companyManage.php"enctype="multipart/form-data" method="post" id="reg">
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" id="company_name" name="company_name" class="form-control" required /> 
                  <label class="form-label" for="company_name">Company name</label>
                </div>
                <div class="col-md-6 form-group">
                  <input type="text" id="web" name="web" class="form-control" required />
                  <label class="form-label" for="web">Web</label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" id="country" name="country" class="form-control" required />
                  <label class="form-label" for="country">Country</label>
                </div>
                <div class="col-md-6 form-group">
                  <input type="text" id="address" name="address" class="form-control" required />
                  <label class="form-label" for="address">address</label>
                </div>
              </div>
              <div class="row">
                    <!-- Email input -->
                <div class="col-md-6 form-group">
                  <input type="email" id="email" name="email" class="form-control" required />      
                  <label class="form-label" for="email">Email address</label>
                </div>
                    <!-- mobile input -->
                <div class="col-md-6 form-group">
                  <input type="text" name="mobile" id="" maxlength="10" class="form-control" required  />
                  <label class="form-label" for="mobile">mobile</label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="password" id="password" name="password" class="form-control" required />     
                  <label class="form-label" for="password">Password</label>
                </div>
                <div class="col-md-6 form-group">
                  <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" required />
                  <label class="form-label" for="confirmpassword">Confirm Password</label>
                </div> 
              </div>
   <div class="col-md-6 form-group">
                    <label for="last Name">choose file</label>                 
                    <input class="form-control form-control-user"  id="pdf" type="file" name="file" value="" required>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
        <button class="btn btn-primary sm" type="submit"  name="register_btn" value="Login" id="st-btn">Login</button>
      </div>
</form>
    </div>
  </div>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
               
            <!-- Button trigger modal -->
              <!-- Button trigger modal -->
   
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
                            <h6 class="m-0 font-weight-bold text-primary">Company page </h6>           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add companys</button>
                          </div>

                    <!-- Card Body -->
                        <div class="card-body">                                
                                <!-- table start -->
                                <?php     
      if(isset($_SESSION['password_status'])&&$_SESSION['password_status']){                                    
      echo '<div class="alert alert-warning" role="alert">Admin <span class="close">'.$_SESSION['password_status'].'</span></div>';
      unset($_SESSION['password_status']);
      }else if(isset($_SESSION['mobile_status'])&&$_SESSION['mobile_status']){                                    
        echo '<div class="alert alert-warning" role="alert">Admin <span class="close">'.$_SESSION['mobile_status'].'</span></div>';
        unset($_SESSION['mobile_status']);
      }else if(isset($_SESSION['email_status'])&&$_SESSION['email_status']){
        echo '<div class="alert alert-warning" role="alert">Admin <span class="close">'.$_SESSION['email_status'].'</span></div>';
        unset($_SESSION['email_status']);
        }else if(isset($_SESSION['status'])&&$_SESSION['status']){
        echo '<div class="alert alert-warning" role="alert">Admin <span class="close">'.$_SESSION['status'].'</span></div>';
        unset($_SESSION['status']);
        }
  
                                if(isset($_SESSION['sucess'])&&$_SESSION['sucess']){                                    
                                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                         <strong>Admin!</strong>'.$_SESSION['sucess'].'
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>';
                                    unset($_SESSION['sucess']);
                                }
                                ?>
                                <div class="table-responsive">
                                    <?php
                                      include("..\database\connect.php");
                                        $displaySql="SELECT * FROM  `tbl_company`";
                                        $query_run=mysqli_query($con,$displaySql);
                                    ?>

                                    <table class="table  table-bordered  table-hover" id="table"  cellspacing="0">
                                        <thead class="table-info">
                                            <tr>
                                            <th>company_id</th>
                                                <th>company_name</th>
                                                <th>web</th>
                                                <th>mobile</th>
                                                <th>email</th>
                                                <th>country</th>
                                                <th>address</th>
                                                <th>filename</th>
                                            
                                            </tr>
                                        </thead>
                                        <tfoot class="table-info">
                                            <tr>                                   
                                                <th>company_id</th>
                                                <th>company_name</th>
                                                <th>web</th>
                                                <th>mobile</th>
                                                <th>email</th>
                                                <th>country</th>
                                                <th>address</th>
                                                <th>filename</th>
                                            </tr>
                                        </tfoot>
                                        <tbody class="table-group-divider">
                                            <?php
                                            if(mysqli_num_rows($query_run)>0)
                                            {
                                                while($row=mysqli_fetch_assoc($query_run))
                                            {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['company_id'];?></td>
                                                <td><?php echo $row['company_name'];?></td>
                                                <td><?php echo $row['web'];?></td>
                                                <td><?php echo $row['mobile'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['country'];?></td>
                                                <td><?php echo $row['address'];?></td> 
                                                
                                                <td><?php echo $row['filename'];?></td>
                                                                               
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
    </div>     
        
 <!-- /.container-fluid -->

<!-- End of Page Wrapper -->

<?php
include 'add/scripts.php';
include 'add/footer.php';
?>


