<?php
 include('session.php');
 include 'add/header.php';
include 'add/navbar.php';
?><!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
<!-- Main Content -->
<div id="content">

<!-- TopBar include -->
<?php
include('add/topbar.php');
?>
<!-- Modal -->
<div class="modal fade" id="addnews" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add news</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
            <form action="Manage/aboutManage.php" method="POST" enctype="multipart/form-data" >
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 ms-auto">
                            <label class="form-label" for="name">Author name</label>
                            <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="name">
                        </div>
                        <div class="col-md-6 ms-auto">
                            <label class="form-label" for="desingnation">Author Desingnation</label>
                            <input type="text" class="form-control form-control-user" id="desingnation" name="desingnation" placeholder="desingnation">    
                        </div>
                    </div>
                    <div class="ms-auto form-group">
                        <label class="form-label" for="tittle">Tittle</label>
                        <input type="text" class="form-control form-control-user" id="tittle" name="tittle" placeholder="tittle">
                    </div>
                    <div class="ms-auto form-group">
                        <label class="form-label" for="descripton">Description</label>
                        <textarea  class="form-control form-control-user" name="description" placeholder="description" rows="5" cols="1"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ms-auto">
                            <label class="form-label" for="image">Image</label>
                            <input type="file" class="form-control form-control-user" id="uplod_image" name="uplod_image">
                       </div>
                        <div class="col-md-6 ms-auto">
                            <label class="form-label" for="link">Link</label>
                            <input type="text" class="form-control form-control-user" id="link" placeholder="link" name="link"> 
                        </div>
                    </div>                  
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"name="registerbtn" >Save changes</button>
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
        <h1 class="h3 mb-0 text-gray-800">About us</h1>        <!-- Button trigger modal -->
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addnews">Add news</button>
                      
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
                    <a href="a.php">About US</a>     
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
                                }else if(isset($_SESSION['status'])&&$_SESSION['status']){
                                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Admin!</strong>'.$_SESSION['status'].'
                                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                   </div>';
                                    unset($_SESSION['status']);
                                }
                                ?>
                                <div class="table-responsive">
                                    <?php
                                    include("..\database\connect.php");
                                        $displaySql="SELECT * FROM  `tbl_aboutus`";
                                        $query_run=mysqli_query($con,$displaySql);
                                    ?>
                                   
                                    
                                    <table class="table  table-bordered   table-hover" id="table"  cellspacing="0">
                                        <thead class="table-info">
                                        <tr>
                                                <th>Auther name</th>                                     
                                                <th>Auther Designation</th>                         
                                                <th>image </th>
                                                <th>Tittle</th>
                                                <th>description</th>
                                                <th>link</th>    
                                                <th>Edit </th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Authername</th>                                     
                                                <th>Auther Designation</th>                         
                                                <th>image </th>
                                                <th>Tittle</th>
                                                <th>description</th>
                                                <th>link</th>    
                                                <th>Edit </th>
                                                <th>Delete</th>
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
                                                <td><?php echo $row['name'];?></td>
                                                <td><?php echo $row['desingnation'];?></td> 
                                                <td><?php echo '<img src="upload/'.$row['uplod_image'].'" width="100px;" height="100px;" alt="news-img">'?></td>    
                                                <td><?php echo $row['tittle'];?></td>
                                                <td><?php echo $row['description']; ?></td>
                                                <td><?php echo $row['link'];?></td>
                                                <td>
                                                    <form action="aboutEdit.php" method="post">
                                                        <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $row['id']?>">
                                                        <button type="submit" name="edit_btn"class="btn btn-warning" >Edit</button>
                                                    </form>
                                                </td>
                                                <td>                                
                                                    <form action="Manage/aboutManage.php" method="post">
                                                        <input type="hidden" name="delete_id" id="delete_id" value="<?php echo $row['id']?>">
                                                        <button type="submit"  name="deletebtn" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td> 
                                            </tr>
                                            <?php
                                            }
                                            }else{
                                      //        echo "no records found the database";
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
        </div> </div>
 <!-- /.container-fluid -->

<!-- End of Page Wrapper -->

<?php
include 'add/scripts.php';
include 'add/footer.php';
?>


