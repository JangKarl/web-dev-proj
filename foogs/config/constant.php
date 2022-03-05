<?php
    //Starting session
    session_start();

    //Create Constant to store values
    define('SITEURL', ''); //better if already hosted
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'foogs_db');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_error());// Database connection

?>