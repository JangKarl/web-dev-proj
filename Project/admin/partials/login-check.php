<?php
    //Authorization - Access Control
    //Check if user is logged in or not
    if(!isset($_SESSION['user'])){ //If account not in database
        //User not logged in
        //Redirect to Login page
        $_SESSION['no-login-message'] = '<div class="error"> Please Login To Access Admin Panel. </div>';
        header("location:../admin/login.php");
    }

?>