<?php

session_start();

$con = new mysqli('localhost', 'root', '', 'foog_db');

$email = $_POST['email'];
$pass = $_POST['password'];

$s = "select * from user where email = '$email'and password = '$pass'";

$result = mysqli_query($con, $s);

//Checking if the name is already used or not

$num = mysqli_num_rows($result); 

$data = mysqli_fetch_assoc($result);

if($num == 1){
    // $_SESSION['email'] = $email;
    header('location:../index.php');
    $_SESSION['success'] = "<a href='logout.php'>Log out</a>";
    $_SESSION['change-login'] = '<a href="products.php" class="button">Shop Now</a>';
    $_SESSION['account-manipulate'] = '<li><a href="account.php" class="fas fa-user-circle"></a></li';
    $_SESSION['email'] = $email;
    $_SESSION['cart-nav'] = '<a href="cart.php" class="fas fa-shopping-cart">';
    $_SESSION['add-cart'] = '<input type="submit" class="btn" value="add to cart" name="add_to_cart">';
    $_SESSION['go-to-products'] = '<a href="products.php" class="btn">Go To Products</a>';
    $_SESSION['user_id'] = $data['user_id'];

}
else{
    header('location:../loginError.php'); 
}
?>