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
                <h1 class="h3 mb-0 text-gray-800">Company </h1>                      
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
                            <h6 class="m-0 font-weight-bold text-primary">Company page </h6>
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
                                            </tr>
                                            <?php
                                            }
                                            }else{
                                                echo "no records found the database";
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


