<?php

//session_start();

$con = new mysqli('localhost', 'root', '', 'accounts');

$email = $_POST['email'];
$pass = $_POST['password'];

$s = "select * from users where email = '$email' && password = '$pass'";

$result = mysqli_query($con, $s);

//Checking if the name is already used or not

$num = mysqli_num_rows($result); 

if($num == 1){
    // $_SESSION['email'] = $email;
    header('location:home.php'); 
}
else{
    header('location:loginError.php'); 
}
?>