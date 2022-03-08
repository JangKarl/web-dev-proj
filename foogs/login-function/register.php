<?php

session_start();

$conn = new mysqli('localhost', 'root', '', 'foog_db');

$first = $_POST['first_name'];
$last = $_POST['last_name'];
$email = $_POST['email'];
$address = $_POST['bill_address'];
$password = $_POST['password'];
$confirm = $_POST['confirm_password'];
$gender = $_POST['gender'];

if($conn -> connect_error){
    die('Connection Failed : ' .$conn -> connect_error);
}
else{
    if($password === $confirm){
        $stmt = $conn -> prepare("insert into user(first_name, last_name, email, bill_address, password, gender) values (?, ?, ?, ?, ?, ?)");
        $stmt -> bind_param("ssssss", $first, $last, $email, $address, $password, $gender);
        $stmt -> execute();
        $_SESSION['firstname'] = $first;
        header('location:../registerComp.php');
        $stmt -> close();
        $conn -> close();
    }
    else{
        header('location:../login.php');
    }
}
?>
