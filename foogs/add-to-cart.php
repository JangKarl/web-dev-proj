<?php 
include("config/constant.php");
//inserting to cart process

if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_id = $_POST['product_id'];
    $order_date = date("Y-m-d");
    $product_quantity = 1;
    
    $sql = "INSERT INTO cart SET
    user_id = $_SESSION[user_id],
    product_id = '$product_id',
    cart_quantity = '$product_quantity',
    order_date = '$order_date'
    ";

    $result = mysqli_query($conn, $sql);
    if($result==TRUE){
        
        $message[] = 'product added to cart succesfully';
        header("location:products.php");
    }else{
        echo "failed";
    }

    if(isset($message)){
        foreach($message as $message){
            echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
        };
        };
}
?>