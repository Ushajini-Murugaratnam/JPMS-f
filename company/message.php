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
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Message Create</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
            <form action="Manage/messageManage.php" method="POST" >
                <div class="modal-body ">
<div class="row">
    <div class="col-md-5 mb-3">
      <div class="form-outline">
        <label for="company_id" class="form-label" >Company Name</label>
        <select name="company_id" id=""class="form-control form-control-user" >
          <?php
          include("..\database\connect.php");
          $find="SELECT tbl_job_application.* ,tbl_job.job_tittle,tbl_company.*
          FROM tbl_job_application 
          LEFT join tbl_job on tbl_job_application.job_id=tbl_job.job_id 
          LEFT join tbl_company on tbl_job.company_id=tbl_company.company_id
          where tbl_job_application.status=1 and  tbl_company.company_id =$loggedin_id"; 
          $result=mysqli_query($con,$find);
          while($row=mysqli_fetch_array($result))
          {?>
            <option value="<?php echo $row['company_id'];?>"> <?php echo $row['company_name'];?></option>
          <?php 
          }
          ?>
        </select>
      </div>
    </div>
    <div class="col-md-7 mb-3">
      <div class="form-outline">
        <label class="form-label" for="company_name">Company Email</label>
        <select name="send_email" id=""class="form-control form-control-user" >
        <?php
        include("..\database\connect.php");
        $find="SELECT tbl_job_application.* ,tbl_job.job_tittle,tbl_company.*,tbl_company.company_id
        FROM tbl_job_application 
        LEFT join tbl_job on tbl_job_application.job_id=tbl_job.job_id 
        LEFT join tbl_company on tbl_job.company_id=tbl_company.company_id
        where tbl_job_application.status=1 and  tbl_company.company_id =$loggedin_id";   
        $result=mysqli_query($con,$find);
        while($row=mysqli_fetch_array($result))
        {?>
        <option value="<?php echo $row['email'];?>"> company :-<?php echo $row['company_name'];?> cmpany email :- <?php echo $row['email'];?></option>
        <?php 
        }
        ?>
        </select>                       
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-5 mb-3">
      <div class="form-outline">
          <label class="form-label" for="seeker_id"> Seeker id</label>
          <select name="seeker_id" id=""class="form-control form-control-user" >
            <?php
            include("..\database\connect.php");
            $find="SELECT tbl_job_application.* ,tbl_job.job_tittle,tbl_seeker.*,tbl_company.company_id
            FROM tbl_job_application 
            LEFT join tbl_job on tbl_job_application.job_id=tbl_job.job_id 
            LEFT join tbl_seeker on tbl_job_application.seeker_id=tbl_seeker.seeker_id
            
        LEFT join tbl_company on tbl_company.company_id=tbl_job.company_id
            where tbl_job_application.status=1 and  tbl_company.company_id =$loggedin_id";  
            $result=mysqli_query($con,$find);
            while($row=mysqli_fetch_array($result))
            {?>
              <option value="<?php echo $row['seeker_id'];?>"> Name:-<?php echo $row['seeker_fname'];?></option>
            <?php 
            }
            ?>
        </select>
      </div>
    </div>
    <div class="col-md-7 mb-3">
      <div class="form-outline">
        <label class="form-label" for="seeker_id"> Seeker email</label>
        <select name="seeker_email" id=""class="form-control form-control-user" >
          <?php
          include("..\database\connect.php");
          $find="SELECT tbl_job_application.* ,tbl_job.job_tittle,tbl_seeker.*,tbl_company.company_id
          FROM tbl_job_application 
          LEFT join tbl_job on tbl_job_application.job_id=tbl_job.job_id 
          LEFT join tbl_seeker on tbl_job_application.seeker_id
          
        LEFT join tbl_company on tbl_company.company_id=tbl_job.company_id
        where tbl_job_application.status=1 and  tbl_company.company_id =$loggedin_id"; 
          $result=mysqli_query($con,$find);
          while($row=mysqli_fetch_array($result))
          {?>
            <option value="<?php echo $row['email'];?>">  Name:-<?php echo $row['seeker_fname'];?>email-<?php echo $row['email'];?></option>
          <?php 
          }
          ?>
        </select>
      </div>              
    </div>
  </div>      
   

<div class="row">     
  <div class="col-md-5 mb-3">
    <div class="form-outline mb-3">
      <label class="form-label" for="job_tittle">job Tittle</label>
        <select name="job_tittle" id=""class="form-control form-control-user" >
        <?php
        include("..\database\connect.php");
        $find="SELECT tbl_job_application.* ,tbl_job.job_tittle,tbl_company.company_id
        FROM tbl_job_application 
        LEFT join tbl_job on tbl_job_application.job_id=tbl_job.job_id 
        LEFT join tbl_company on tbl_company.company_id=tbl_job.company_id where status=1 and  tbl_company.company_id =$loggedin_id";                                     
        $result=mysqli_query($con,$find);
        while($row=mysqli_fetch_array($result))
        {?>
          <option value="<?php echo $row['job_id'];?>"> job_tittle-<?php echo $row['job_tittle'];?></option>
        <?php 
        }
        ?>
        </select>
    </div>
  </div>
    <!-- Email input -->
  <div class="col-md-7 mb-3">
    <div class="form-outline mb-3">
      <label class="form-label" for="mobile">mobile</label>
      <input type="text" name="mobile" id="" maxlength="10" class="form-control" required  />
    </div>
  </div>
</div> 
<div class="row">
  <div class="col-md-12 mb-3">
    <div class="form-outline mb-3">
    <label class="form-label" for="message">message</label>
    <textarea name="message" id="" class="form-control" required cols="30" rows="5"></textarea>
    </div>
  </div>
</div>


<!-- Submit button -->
<div class="d-grid gap-2 col-6 mx-auto">
</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"name="register_btn" >Send</button>
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
                            <h6 class="m-0 font-weight-bold text-primary">Message </h6>     <!-- Button trigger modal -->
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addadminprofile">Add Message
                </button>
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
                                }else if(isset($_SESSION['mobile_status'])&&$_SESSION['mobile_status']){
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Admin!</strong>'.$_SESSION['mobile_status'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    unset($_SESSION['status']);
                                }else if(isset($_SESSION['status'])&&$_SESSION['status']){
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Admin!</strong>'.$_SESSION['status'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    unset($_SESSION['status']);
                                }
                                ?>
                                <?php
                                      include("..\database\connect.php");
                                        $displaySql="SELECT * FROM  `message` where company_id = $loggedin_id";
                                        $query_run=mysqli_query($con,$displaySql);
                                   
                                    ?>
                                    <table class="table  table-bordered   table-hover" id="table"  cellspacing="0">
                                    <thead class="table-info">
                                            <tr>
                                               <th>company_id </th>
                                                <th>send_email </th>
                                                <th>seeker_id </th>
                                                <th>seeker_email </th>
                                                <th>message </th>
                                                <th>mobile</th>
                                                <th>job_tittle </th>
                                            </tr>
                                        </thead>
                                        <tfoot class="table-info">

                                            <tr>
                                               <th>company_id </th>
                                                <th>send_email </th>
                                                <th>seeker_id </th>
                                                <th>seeker_email </th>
                                                <th>message </th>
                                                <th>mobile</th>
                                                <th>job_tittle </th>
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
                                            <td> <?php echo $row['company_id'];?></td>
                                            <td><?php echo $row['send_email'];?></td>
                                            <td><?php echo $row['seeker_id'];?></td>
                                            <td><?php echo $row['seeker_email'];?></td>
                                            <td><?php echo $row['message'];?></td>
                                            <td><?php echo $row['mobile'];?></td>
                                         <td><?php echo $row['job_tittle'];?>
                        
                                            </tr>
                                            <?php
                                                }
                                                }else{
                                                 //   echo "no records found the database";
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
<?php
include 'add/scripts.php';
include 'add/footer.php';
?>
