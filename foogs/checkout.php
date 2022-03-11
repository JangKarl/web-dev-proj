<?php

include("config/constant.php");

if(isset($_POST['order_btn'])){
    date_default_timezone_set("Asia/Manila");
    $date = date('Y-m-d H:i:s', strtotime("+1 day"));

   $number = $_POST['number'];
   $delivery_address = $_POST['delivery_address'];
   $zipcode = $_POST['zipcode'];
   $method = $_POST['method'];
   $order_date = date("Y-m-d H:i:s");
   $order_status = "Pending";
   $delivery_date = $date;

   $cart_query = mysqli_query($conn, "SELECT * FROM cart
   INNER JOIN user 
       ON cart.user_id = user.user_id
   INNER JOIN product
       ON cart.product_id = product.product_id
   WHERE user.user_id = $_SESSION[user_id]");
   $price_total = 0;
   $total = 0;
   $shipping_fee = 50;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['cart_quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['cart_quantity']);
         $price_total += ((int)$product_item['price'] * (int)$product_item['cart_quantity']);
        //  $price_total += $product_price;
      }; $total = $price_total + $shipping_fee;
   };
   $total_product = implode(', ',$product_name);

    $detail_query = mysqli_query($conn, "INSERT INTO orders SET
    user_id = '$_SESSION[user_id]',
    delivery_address = '$delivery_address',
    zipcode = '$zipcode',
    total_price = '$total',
    order_date = '$order_date',
    order_status = '$order_status',
    delivery_date = '$delivery_date',
    method = '$method',
    number = '$number',
    cancellation_date = ''
    ") or die('query failed');

//    $additional_detail = mysqli_query($conn, INSERT);
   $select_user_order = mysqli_query($conn, "SELECT * FROM user
   INNER JOIN cart
   ON user.user_id = cart.user_id
   INNER JOIN product
   ON cart.product_id = product.product_id
   INNER JOIN orders
   ON user.user_id = orders.user_id
   WHERE user.user_id = $_SESSION[user_id] 
   ");
   if(mysqli_num_rows($select_user_order) > 0){
       while($rows = mysqli_fetch_assoc($select_user_order)){
           $product_id = $rows['product_id'];
           $quantity = $rows['cart_quantity'];
           $order_id = $rows['order_id'];
           $price = $rows['price'];

           $order_details_query = mysqli_query($conn, "INSERT INTO order_details SET
           order_id = $order_id,
           product_id = $product_id,
           ordered_quantity = $quantity,
           subtotal_price = $quantity * $price
           ") or die('query failed');
       
       }
   }

   $clear_cart = mysqli_query($conn, "DELETE FROM cart WHERE user_id = $_SESSION[user_id]");


   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>Thank you for Shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> Total : ₱ ".$total." (Shipping Fee Added)  </span>
         </div>
         <div class='customer-details'>
            <p> Your number : <span>".$number."</span> </p>
            <p> Your payment mode : <span>".$method."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='products.php' class='btn'>Continue Shopping</a>
         </div>
      </div>";
   }
}

?>


<?php include("partials/html-head.php") ?>

<?php include("partials/navigation.php") ?>

    <!-- container -->
    <div class="container">

    <section class="checkout-form">

        <h1 class="heading">complete your order</h1>

        <form action="" method="post">

        <!-- Displays the items and Grand Total -->
        <div class="display-order">
            <?php
                $select_cart = mysqli_query($conn,"SELECT * FROM cart
                INNER JOIN user 
                    ON cart.user_id = user.user_id
                INNER JOIN product
                    ON cart.product_id = product.product_id
                WHERE user.user_id = $_SESSION[user_id]");
                $total = 0;
                $grand_total = 0;

                if(mysqli_num_rows($select_cart) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                    $total_price = number_format($fetch_cart['price'] * $fetch_cart['cart_quantity']);
                    $grand_total += ((int)$fetch_cart['price'] * (int)$fetch_cart['cart_quantity']);
            ?>
            <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['cart_quantity']; ?>)</span>
            <?php
                }
            }else{
                echo "<div class='display-order'><span>your cart is empty!</span></div>";
            }
            ?>
            <span class="grand-total"> Grand total : ₱<?= $grand_total ; ?> + ₱50 Shipping Fee </span>
        </div>

        <div class="flex">
            <div class="inputBox">
                <span>Delivery Address</span>
                <input type="text" placeholder="Enter delivery address" name="delivery_address" required>
            </div>
            <div class="inputBox">
                <span>Zipcode</span>
                <input type="text" placeholder="Enter zipcode" name="zipcode" maxlength="11" required>
            </div>  
            <div class="inputBox">
                <span>Contact number</span>
                <input type="text" placeholder="Enter your number" name="number" maxlength="11" required>
            </div>
            <div class="inputBox">
                <span>Payment method</span>
                <select name="method">
                <option value="cash on delivery " selected>Cash on delivery</option>
                <option value="credit card">Credit card</option>
                <option value="g-cash">G-Cash</option>
                </select>
            </div>
          

            <input type="submit" value="order now" name="order_btn" class="btn">
        </form>

</section>



    </div>
    

    <?php include("partials/footer.php")?>
    <script src="js/script.js"></script>

</body>
</html>