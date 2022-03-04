<?php
    //Database connection
    include('config/constant.php');
    //Destroy session
    session_destroy(); //unset $_SESSION['user']
    //Redirect to login page
    header('location:index.php');
?>