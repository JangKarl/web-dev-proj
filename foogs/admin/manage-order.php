<?php include('partials/navbar.php');?>


    <!-- Main Content Section Starts -->
    <div class="main-content">
        <div class="main-top">
            <h1>PORTAL | MANAGE ORDERS  </h1>
            <i class="fas fa-user-cog"></i>
        </div>
        <!-- Main body -->
        <br>
        <table class="tbl-full">
            <thead>
                <th>Order ID</th>
                <th>Total</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Zipcode</th>
                <th>Status</th>
                <th>Order Date</th>
                <th>Action</th>
            </thead>
            <tbody>
            <?php 
                $sql = "SELECT * FROM orders
                INNER JOIN user
                ON orders.user_id = user.user_id
                ORDER BY orders.order_date DESC;";
                
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){
                    while($rows = mysqli_fetch_assoc($result)){

            ?>
            <tr>
                <th scope="row"><?php echo $rows['order_id'];?></th>
                <td><?php echo $rows['total_price'];?></td>
                <td><?php echo $rows['first_name'];?></td>
                <td><?php echo $rows['last_name'];?></td>
                <td><?php echo $rows['delivery_address'];?></td>
                <td><?php echo $rows['zipcode'];?></td>
                <td><?php echo $rows['order_status'];?></td>
                <td><?php echo $rows['order_date'];?></td>
                <td><a href="manage-order-details.php?order_id=<?php echo $rows['order_id'];?>">Details</a>
                <div class="button-status">
                        <button>Status</button>
                        <div>
                            <a href="admin-order-update.php?order_id=<?php echo $rows['order_id'];?>">Delivered</a>
                            <a href="admin-order-update.php?order_id=<?php echo $rows['order_id'];?>">Cancelled</a>
                        </div>
                </div>
            </td>
            </tr>




        <?php }
    }
    ?>
                </tbody>
        </table>
        














    </div><!-- div for main-content -->        

    <!-- Main Content Section Ends -->

</div> <!-- sidebar link -->


<?php include('partials/footer.php');?>