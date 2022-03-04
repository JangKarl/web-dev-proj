<?php 
    //Connection to database from config/constant.php
    include("../config/constant.php");

    //ID of admin to be deleted
    $id = $_GET['id'];

    //SQL query
    $sql = "DELETE FROM admin WHERE id=$id";

    //Execute query
    $result = mysqli_query($conn, $sql);

    //Check query if success or not
    if($result==TRUE){
        //Query success
        //Session to display message
        $_SESSION['delete'] = "<div class='success'> Admin Deleted Successfully</div>";

        //Redirect to manage admin page
        header("location:manage-admin.php");

    }else{
        //Query failed
        $_SESSION['delete'] = "<div class='failed'> Failed to Delete Admin</div>";
        header("location:manage-admin.php");
    }

    //Redirect to Manage-Admin page

    //




?>

