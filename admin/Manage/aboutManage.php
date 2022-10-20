<?php 
session_start();
include("..\..\database\connect.php");

//insert record SQL
    if(isset($_POST['registerbtn']))
    {
        $name= $_POST['name']; 
        $desingnation= $_POST['desingnation'];
        $uplod_image= $_FILES['uplod_image']['name'];
        $tittle = $_POST['tittle']; 
		$description = $_POST['description'];
		$link = $_POST['link'];
        $create_time=date("Y-m-d H:i:s");  
                if (file_exists("../upload/".$_FILES["uplod_image"]["name"]))
                {
                    $store=$_Files["uplod_image"]["name"];
                    $_SESSION['status']="alredy upload.'.$store.'";
                    header('Location: ../aboutContent.php');
                }
                else{
                    $insertSql="INSERT INTO `tbl_aboutus` (`name`,`desingnation`,`uplod_image`,`tittle`, `description`,`link`,`create_time`)
                    values('$name','$desingnation','$uplod_image','$tittle','$description','$link','$create_time')";
                $query_run=mysqli_query($con,$insertSql);   
                
                if($query_run)
                {
                    move_uploaded_file($_FILES["uplod_image"]["tmp_name"],"../upload/".$_FILES["uplod_image"]["name"]);
                    $_SESSION['sucess']=" news added";
                        header('Location:../aboutContent.php');
                    
                }else
                { 
                    $_SESSION['status']= "news not added";
                    header('Location:../aboutContent.php');
                }
            }
        }   
       //update record SQL
    if(isset($_POST['updatebtn']))
    {   $id=$_POST['edit_id'];
        $name= $_POST['name']; 
        $desingnation= $_POST['edit_desingnation'];
        $tittle = $_POST['edit_tittle'];
        $description=$_POST['edit_description'];
        $link=$_POST['edit_link'];
           
        $updateSql="UPDATE `tbl_aboutus` SET `name`='$name',`desingnation`='$desingnation',`tittle`='$tittle',`description`='$description' ,`link`='$link' WHERE id=$id";
        $query_run=mysqli_query($con,$updateSql);
        if($query_run)
            {    
                $_SESSION['sucess']= "data Update sucesfully";
                header('Location:../aboutContent.php');
    
            }    
        else
        {
            $_SESSION['status']="data not update- please check";
            header('Location:../aboutContent.php');
        }   
    }
   //delete record SQL
    if(isset($_POST['deletebtn']))
    {   $id=$_POST['delete_id'];   
        $deleteSql=" DELETE FROM `tbl_aboutus` WHERE id=$id";
        $query_run=mysqli_query($con,$deleteSql);
        if($query_run)
            {           
                $_SESSION['sucess']= "data deleted";
                header('Location:../aboutContent.php');
            }    
        else
        {
            $_SESSION['status']="data not delete";
            header('Location:../aboutContent.php');
        }   
    }

