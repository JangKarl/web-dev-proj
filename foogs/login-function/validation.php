<?php

//session_start();

$con = new mysqli('localhost', 'root', '', 'foogs_db');

$email = $_POST['email'];
$pass = $_POST['password'];

$s = "select * from user where email = '$email'and password = '$pass'";

$result = mysqli_query($con, $s);

//Checking if the name is already used or not

$num = mysqli_num_rows($result); 

if($num == 1){
    // $_SESSION['email'] = $email;
    header('location:../index.php'); 
}
else{
    header('location:../loginError.php'); 
}
?>