<?php

@include 'config.php';

if(isset($_POST['update_update_btn'])){
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET cart_quantity = '$update_value' WHERE cart_id = '$update_id'");
    if($update_quantity_query){
        header('location:cart.php');
    };
};

if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE cart_id = '$remove_id'");
    header('location:cart.php');
};

if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `cart`");
    header('location:cart.php');
}

?>

<?php include("partials/html-head.php") ?>

<?php include("partials/navigation.php") ?>

    <!-- container -->
    <div class="container">

    <section class="shopping-cart">

        <h1 class="heading">shopping cart</h1>

        <table>
            <!-- cart data header -->
            <thead>
                <th>image</th>
                <th>name</th>
                <th>price</th>
                <th>quantity</th>
                <th>total price</th>
                <th>action</th>   
            </thead>

            <tbody>
                <?php 
                //cart fetching/displaying values
                $select_cart = mysqli_query($conn, "SELECT * FROM cart
                INNER JOIN user 
                    ON cart.user_id = user.user_id
                INNER JOIN product
                    ON cart.product_id = product.product_id");
                $grand_total = 0;

                if(mysqli_num_rows($select_cart) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                ?>
                <tr>
                    <td><img src="admin/uploaded_img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td> <!-- image -->
                    <td><?php echo $fetch_cart['name']; ?></td> <!-- name -->
                    <td> ₱ <?php echo number_format($fetch_cart['price']); ?> /- </td> <!-- price -->
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['cart_id']; ?>" > <!-- identification to id -->
                            <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['cart_quantity']; ?>" > <!-- fetching qty -->
                            <input type="submit" value="update" name="update_update_btn"> <!-- buttong -->
                        </form>   
                    </td>
                    <td>₱<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['cart_quantity']); ?>/-</td>
                    <td><a href="cart.php?remove=<?php echo $fetch_cart['cart_id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
                </tr>
                
                <?php
                    $grand_total += $sub_total;  
                    };
                };
                ?>
                <tr class="table-bottom">
                    <td><a href="products.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
                    <td colspan="3">grand total</td>
                    <td>₱<?php echo $grand_total; ?>/-</td>
                    <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
                </tr>

            </tbody>

        </table>

        
                <!-- ADD TO CART BUTTON -->
        <div class="checkout-btn">
        <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
                <!-- ADD TO CART BUTTON -->


        </div>

    </section>

    </div>
    

    <?php include("partials/footer.php")?>
    <script src="js/script.js"></script>

</body>
</html>
