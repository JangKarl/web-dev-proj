<?php include("partials/html-head.php") ?>

    <title>Fresh & Organic Online Grocery Store | Order Details</title>
    
</head>
<body>
<?php include("partials/navigation.php") ?>

<a href="order.php" class="back-btn"><-Back</a>

    <h1 class="heading">Order Details</h1>
    <h3>&nbsp;&nbsp;Billing Details</h3>
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

                $sql = "SELECT * FROM orders INNER JOIN user ON orders.user_id = user.user_id WHERE user.user_id = $_SESSION[user_id] AND orders.order_id = $order_id;"; 

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

    <h3>&nbsp;&nbsp;Order Summary</h3>
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

    <br><h3>&nbsp;&nbsp;Order Details</h3>
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

    <br><h3>&nbsp;&nbsp;Ordered Items</h3>
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
    <br><br><br>







    
    <?php include("partials/footer.php") ?>

</body>
</html>