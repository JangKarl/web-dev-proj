<?php

session_start();

$conn = new mysqli('localhost', 'root', '', 'foogs_db');

$first = $_POST['firstname'];
$last = $_POST['lastname'];
$email = $_POST['email'];
$address = $_POST['address'];
$password = md5($_POST['password']); //encryption
$confirm = md5($_POST['confirm']);
$gender = $_POST['gender'];

if($conn -> connect_error){
    die('Connection Failed : ' .$conn -> connect_error);
}
else{
    if($password === $confirm){
        $stmt = $conn -> prepare("insert into user(first_name, last_name, email, address, password, gender) values (?, ?, ?, ?, ?, ?)");
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
