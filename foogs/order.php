<?php include("partials/html-head.php") ?>

    <title>Fresh & Organic Online Grocery Store | Orders</title>
    
</head>
<body>
<?php include("partials/navigation.php") ?>

    <h1>Order Details</h1>
        <table class="tbl-full">
            <thead>
                <th>Order ID</th>
                <th>PRODUCT</th>
                <th>QUANTITY</th>
                <th>DELIVERY ADDRESS</th>
                <th>ORDER STATUS</th>
                <th>ORDER DATE</th>
                <th>DELIVERY DATE</th>
                <th>METHOD</th>
                <th>TOTAL PRICE</th>
            </thead>
            <tbody>
            <?php 
                $sql = "SELECT * FROM orders
                INNER JOIN order_details
                ON orders.order_id = order_details.order_id
                INNER JOIN user
                ON orders.user_id = user.user_id
                INNER JOIN product
                ON order_details.product_id = product.product_id
                WHERE user.user_id = $_SESSION[user_id]
                ORDER BY orders.order_date DESC";
                
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){
                    while($rows = mysqli_fetch_assoc($result)){
                        $user_id = $rows['user_id'];
                        $delivery_address = $rows['delivery_address'];
                        $order_status = $rows['order_status'];
                        $delivery_date = $rows['delivery_date'];
                        $total_price = $rows['total_price'];
                        $order_date = $rows['order_date'];
                        $method = $rows['method'];
                        $first_name = $rows['first_name'];
                        $last_name = $rows['last_name'];
                        $product_image = $rows['image'];
                        $order_id = $rows['order_id'];
                        $quantity = $rows['ordered_quantity'];
            ?>
            <tr>
                <td><?php echo $order_id;?></td>
                <td><img src="images/<?php echo $product_image;?>" alt="<?php echo $product_image;?>" style="max-width: 50px "></td>
                <td><?php echo $quantity?></td>
                <td><?php echo $delivery_address;?></td>
                <td><?php echo $order_status;?></td>
                <td><?php echo $order_date;?></td>
                <td><?php echo $delivery_date;?></td>
                <td><?php echo $method;?></td>
                <td><?php echo $total_price;?></td>
            </tr>




        <?php }
    }
    ?>
                </tbody>
        </table>

<?php include("partials/footer.php") ?>

</body>
</html>