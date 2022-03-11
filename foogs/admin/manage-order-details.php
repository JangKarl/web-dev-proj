<?php include('partials/navbar.php');?>


    <!-- Main Content Section Starts -->
    <div class="main-content">
        <div class="main-top">
            <h1>PORTAL | MANAGE ORDERS  </h1>
            <i class="fas fa-user-cog"></i>
        </div>
        <!-- Main body -->
        <a href="manage-order.php"><-Back</a>
            <h1>Order Details</h1>
            <br> 
            <h3>Billing Details</h3> <br>
            <table class="tbl-full">
                <thead>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Number</th>
                    <th>Delivery Address</th>
                    <th>Zipcode</th>
                </thead>
                <tbody>
                    <?php 
                        $order_id = $_GET['order_id'];

                        $sql = "SELECT * FROM orders INNER JOIN user ON orders.user_id = user.user_id WHERE orders.order_id = $order_id;"; 

                        $result = mysqli_query($conn, $sql);

                        if($result == TRUE){
                            $count = mysqli_num_rows($result);

                            if($count > 0){
                                while($rows = mysqli_fetch_assoc($result)){
                                    ?>
                                    <tr>
                                        <td><?php echo $rows['first_name']?></td>
                                        <td><?php echo $rows['last_name']?></td>
                                        <td><?php echo $rows['number']?></td>
                                        <td><?php echo $rows['delivery_address']?></td>
                                        <td><?php echo $rows['zipcode']?></td>
                                    </tr>
                                    <?php
                                }
                            }
                        }
                    ?>
                </tbody>
            </table>
            <br>

            <h3>Order Summary</h3><br>
            <table class="tbl-full">
                <thead>
                    <th>Subtotal</th>
                    <th>Shipping Fee</th>
                    <th>Grand Total</th>
                </thead>
                <tbody>
                    <?php 
                    $sql = "SELECT * FROM order_details
                    INNER JOIN orders
                    ON order_details.order_id = orders.order_id
                    WHERE order_details.order_id = $order_id";

                    $result = mysqli_query($conn, $sql);

                    if($result == TRUE){
                        $count = mysqli_num_rows($result);

                        if($count >= 1){
                            while($rows = mysqli_fetch_assoc($result)){
                                $total_price = $rows['total_price'];
                            }
                            ?>    
                            <tr>
                                <td><?php echo $total_price - 50?></td>
                                <td><?php echo 50?></td>
                                <td><?php echo $total_price?></td>
                            </tr>
                        
                                <?php
                            
                        }
                    }
                    ?> 
                </tbody>
            </table>

            <h3>Order Details</h3><br>
            <table class="tbl-full">
                <thead>
                    <th>Order Id</th>
                    <th>Order Date</th>
                    <th>Order Status</th>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM orders
                    WHERE order_id = $order_id;";

                    $result = mysqli_query($conn, $sql);

                    if($result == TRUE){
                        $count = mysqli_num_rows($result);

                        if($count > 0){
                            while($rows = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td><?php echo $rows['order_id']?></td>
                                    <td><?php echo $rows['order_date']?></td>
                                    <td><?php echo $rows['order_status']?></td>
                                </tr>
                        
                                <?php
                            }
                        }
                    }
                    ?> 
                </tbody>
            </table>

            <h3>Ordered Items</h3><br>
            <table class="tbl-full">
                <thead>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM order_details
                    INNER JOIN product
                    ON order_details.product_id = product.product_id
                    WHERE order_details.order_id = $order_id;";

                    $result = mysqli_query($conn, $sql);

                    if($result == TRUE){
                        $count = mysqli_num_rows($result);

                        if($count > 0){
                            while($rows = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td><?php echo $rows['name']?></td>
                                    <td><?php echo $rows['price']?></td>
                                    <td><?php echo $rows['ordered_quantity']?></td>
                                    <td><?php echo $rows['subtotal_price']?></td>
                                </tr>
                        
                                <?php
                            }
                        }
                    }
                    ?> 
                </tbody>
            </table>


        







    </div><!-- div for main-content -->        

    <!-- Main Content Section Ends -->

</div> <!-- sidebar link -->


<?php include('partials/footer.php');?>