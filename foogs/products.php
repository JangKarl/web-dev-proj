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
    
    $checking_cart = mysqli_query($conn, "SELECT * FROM cart
    INNER JOIN product
    ON cart.product_id = product.product_id
    WHERE cart.product_id = $product_id");

    if(mysqli_num_rows($checking_cart) > 0){
        $message[] = 'Product already added to cart';
    }else{
        $product_to_cart = mysqli_query($conn, "INSERT INTO cart SET
        user_id = $_SESSION[user_id],
        product_id = '$product_id',
        cart_quantity = '$product_quantity',
        order_date = '$order_date'
        ");
        $message[] = 'Product added to cart';
    }

}
?>

<?php include("partials/html-head.php") ?>

<?php include("partials/navigation.php") ?>
    
    <?php
    if(isset($message)){
    foreach($message as $message){
        echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
        };
    };
    ?>
    

    <!-- container -->
    <div class="container">

    <section class="products">
        
        <h1 class="heading">All Available Products</h1>

        <div class="box-container">

            <?php
            //fetching the products
            $select_products = mysqli_query($conn, "SELECT * FROM `product`");
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_product = mysqli_fetch_assoc($select_products)){
            ?>

            <!-- displaying on input tags -->
            <form action="" method="post">
            <div class="box">
                
                <img src="admin/uploaded_img/<?php echo $fetch_product['image']; ?>" alt=""><!-- upper image -->
                <h3><?php echo $fetch_product['name']; ?></h3><!-- middle displayed name  -->
                <div class="price"> ₱ <?php echo $fetch_product['price']; ?> /kg</div> <!-- PRICE display -->
                <!-- fetching the select item and inserting onto the cart_tbl -->
                <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                <input type="hidden" name="product_id" value="<?php echo $fetch_product['product_id']; ?>">

                <!-- ADD TO CART BUTTON -->
                <?php if(isset($_SESSION['add-cart'])){
                    echo $_SESSION['add-cart'];
                }else{
                    echo '<a href="login.php" class="btn">Log In First</a>';
                }?>
                <!-- ADD TO CART BUTTON -->

                
            </div>
        </form>

        <?php
            };
        };
        ?>    

        </div>

        
    </section> 
    
    </div>
    

    <?php include("partials/footer.php")?>
    <script src="js/script.js"></script>

</body>
</html>
