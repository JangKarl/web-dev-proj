<?php

@include 'config.php';

if(isset($_POST['order_btn'])){

//    $name = $_POST['name'];
   $number = $_POST['number'];
//    $email = $_POST['email'];
   $method = $_POST['method'];
//    $flat = $_POST['flat'];
//    $street = $_POST['street'];
//    $city = $_POST['city'];
//    $state = $_POST['state'];
//    $country = $_POST['country'];
//    $pin_code = $_POST['pin_code'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      };
   };
   $total_product = implode(', ',$product_name);

   $detail_query = mysqli_query($conn, "INSERT INTO `order`(number, method, total_products, total_price) VALUES('$number', '$method', '$total_product', '$price_total')") or die('query failed');


   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>Thank you for Shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> Total : $".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> Your number : <span>".$number."</span> </p>
            <p> Your payment mode : <span>".$method."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='products.php' class='btn'>Continue Shopping</a>
         </div>
      </div>
      ";
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
                $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
                $total = 0;
                $grand_total = 0;
                if(mysqli_num_rows($select_cart) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                    $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
                    $grand_total = $total += $total_price;
            ?>
            <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
            <?php
                }
            }else{
                echo "<div class='display-order'><span>your cart is empty!</span></div>";
            }
            ?>
            <span class="grand-total"> grand total : $<?= $grand_total; ?>/- </span>
        </div>

        <div class="flex">
            <!-- <div class="inputBox">
                <span>your name</span>
                <input type="text" placeholder="enter your name" name="name" required>
            </div>
            <div class="inputBox">
                <span>your email</span>
                <input type="email" placeholder="enter your email" name="email" required>
            </div> -->
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
            <!-- </div>
            <div class="inputBox">
                <span>address line 1</span>
                <input type="text" placeholder="e.g. flat no." name="flat" required>
            </div>
            <div class="inputBox">
                <span>address line 2</span>
                <input type="text" placeholder="e.g. street name" name="street" required>
            </div>
            <div class="inputBox">
                <span>city</span>
                <input type="text" placeholder="e.g. mumbai" name="city" required>
            </div>
            <div class="inputBox">
                <span>state</span>
                <input type="text" placeholder="e.g. maharashtra" name="state" required>
            </div>
            <div class="inputBox">
                <span>country</span>
                <input type="text" placeholder="e.g. india" name="country" required>
            </div>
            <div class="inputBox">
                <span>pin code</span>
                <input type="text" placeholder="e.g. 123456" name="pin_code" required>
            </div> -->
        </div>
            <input type="submit" value="order now" name="order_btn" class="btn">
        </form>

</section>



    </div>
    

    <?php include("partials/footer.php")?>
    <script src="js/script.js"></script>

</body>
</html>