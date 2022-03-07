<?php
    //Starting session
    if (!isset($_SESSION)) {
            session_start();
        }
        else {
            return null;
        }


    //Create Constant to store values
    define('SITEURL', ''); //better if already hosted
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'foog_db');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_error());// Database connection

?>
