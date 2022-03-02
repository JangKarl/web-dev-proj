<?php

session_start();

$conn = new mysqli('localhost', 'root', '', 'accounts');

$first = $_POST['firstname'];
$last = $_POST['lastname'];
$email = $_POST['email'];
$address = $_POST['address'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$gender = $_POST['gender'];

if($conn -> connect_error){
    die('Connection Failed : ' .$conn -> connect_error);
}
else{
    if($password === $confirm){
        $stmt = $conn -> prepare("insert into users(firstname, lastname, email, address, password, gender) values (?, ?, ?, ?, ?, ?)");
        $stmt -> bind_param("ssssss", $first, $last, $email, $address, $password, $gender);
        $stmt -> execute();
        $_SESSION['firstname'] = $first;
        header('location:registerComp.php');
        $stmt -> close();
        $conn -> close();
    }
    else{
        header('location:registerError.php');
    }
}
?>