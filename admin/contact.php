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

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">contact form </h1>                      
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
                    <a href="dash.php">contact form</a>     
                    </div>

                    <!-- Card Body -->
                        <div class="card-body">                                
                        <div class="card-body">                                
                                <!-- table start -->
                           
                                <div class="table-responsive">
                                    
                                    
                                <?php
                                      include("..\database\connect.php");
                                        $displaySql="SELECT * FROM  `contact_us`";
                                        $query_run=mysqli_query($con,$displaySql);
                                    ?>
                                    
                                    
                                    <table class="table  table-bordered   table-hover" id="table"  cellspacing="0">
                                        <thead class="table-info">
                                            <tr>
                                            <th>id</th>
                                                <th>first_name</th>
                                                <th>last_name</th>
                                                <th>email</th>
                                                <th>phone</th>
                                                <th>tittle</th> 
                                                <th>message</th>    
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>id</th>
                                                <th>first_name</th>
                                                <th>last_name</th>
                                                <th>email</th>
                                                <th>phone</th>
                                                <th>tittle</th>   
                                                <th>message</th>         
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
                                                <td><?php echo $row['id'];?></td>
                                                <td><?php echo $row['first_name'];?></td>
                                                <td><?php echo $row['last_name'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['phone'];?></td>    
                                                <td><?php echo $row['tittle'];?></td>    
                                                <td><?php echo $row['message'];?></td>
                                                
							 		<?php
                                    }}
                            else{
                          //      echo "no records found the database";
                            }   ?>
                                                </td> 
                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table end-->
                        </div>
                </div>
               
            </div>
        </div>
        </div> </div></div>
 <!-- /.container-fluid -->

<!-- End of Page Wrapper -->

<?php
include 'add/scripts.php';
include 'add/footer.php';
?>


