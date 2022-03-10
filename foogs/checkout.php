
<?php include("partials/html-head.php") ?>

<?php include("partials/navigation.php") ?>

    <!-- container -->
    <div class="container">

    <section class="checkout-form">

        <h1 class="heading">complete your order</h1>

        <form action="order-now.php" method="post">

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
                $shipping_fee = 50;
                if(mysqli_num_rows($select_cart) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                    $total_price = number_format($fetch_cart['price'] * $fetch_cart['cart_quantity']);
                    $grand_total = $total += $total_price;
            ?>
            <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['cart_quantity']; ?>)</span>
            <?php
                }
            }else{
                echo "<div class='display-order'><span>your cart is empty!</span></div>";
            }
            ?>
            <span class="grand-total"> grand total : ₱<?= $grand_total ; ?> /- + 50 Shipping Fee </span>
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