
<?php include('partials/navbar.php');?>


    <!-- Main Content Section Starts -->
    <div class="main-content">
        <div class="main-top">
            <h1>PORTAL | ADMIN DASHBOARD  </h1>
            <i class="fas fa-user-cog"></i>
        </div>
        <br>
            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
            <br>
        <!-- Main body -->
        <!-- Featured Category Section Starts here -->
        <div class="main-card">
                
                <div class="card">
                    <i class="fas fa-users"></i>
                    <h3>Registered Users</h3>
                    <?php
                        $dash_users = mysqli_query($conn, "SELECT * FROM `user`");
                        if($user_total = mysqli_num_rows($dash_users)){
                            echo '<h1>'.$user_total.'</h1>';
                        }
                        else{
                            echo '<h1>No Available Data</h1>';
                        }
                    ?>
                </div>
                <div class="card">
                    <i class="fas fa-boxes"></i>
                    <h3>Categories Available</h3>
                    <?php
                        $dash_users = mysqli_query($conn, "SELECT * FROM `category`");
                        if($user_total = mysqli_num_rows($dash_users)){
                            echo '<h1>'.$user_total.'</h1>';
                        }
                        else{
                            echo '<h1>No Available Data</h1>';
                        }
                    ?>
                </div>
                <div class="card">
                    <i class="fas fa-box-open"></i>
                    <h3>Products Posted</h3>
                    <?php
                        $dash_users = mysqli_query($conn, "SELECT * FROM `product`");
                        if($user_total = mysqli_num_rows($dash_users)){
                            echo '<h1>'.$user_total.'</h1>';
                        }
                        else{
                            echo '<h1>No Available Data</h1>';
                        }
                    ?>
                </div>
                <div class="card">
                    <i class="fas fa-cart-plus"></i>
                    <h3>Total Orders :
                        <?php 
                        $dash_main_orders = mysqli_query($conn, "SELECT * FROM orders");
                        if($rows = mysqli_num_rows($dash_main_orders)){
                            echo $rows;
                        }else{
                            echo 0;
                        }
                        ?>
                    </h3>
                    <?php
                        $dash_orders = mysqli_query($conn, "SELECT * FROM `orders`
                        WHERE order_status = 'Pending'");
                        $dash_orders2 = mysqli_query($conn, "SELECT * FROM `orders`
                        WHERE order_status = 'Cancelled'");
                        $dash_orders3 = mysqli_query($conn, "SELECT * FROM `orders`
                        WHERE order_status = 'Delivered'");
                        if($orders_total = mysqli_num_rows($dash_orders)){
                            echo '<h3>Pending | '.$orders_total. '</h3>';
                        }
                        else{
                            echo '<h3>Pending | 0 </h3>';
                        }
                        if($orders_total2 = mysqli_num_rows($dash_orders2)){
                            echo '<h3>Cancelled | '.$orders_total2. '</h3>';
                        }
                        else{
                            echo '<h3>Cancelled | 0 </h3>';
                        }                        
                        if($orders_total3 = mysqli_num_rows($dash_orders3)){
                            echo '<h3>Delivered | '.$orders_total3. '</h3>';
                        }
                        else{
                            echo '<h3>Delivered | 0 </h3>';
                        }
                    ?>
                </div>
            </div>


            <section class="bottom-card">
                <h1>Sales Summary</h1>
                        <?php
                            $con = new mysqli('localhost', 'root', '','foog_db');
                            $query = $con->query("SELECT product.name as products, SUM(order_details.ordered_quantity) as sold 
                            FROM `order_details` JOIN `product` WHERE order_details.product_id = product.product_id 
                            GROUP BY order_details.product_id"); 

                            foreach($query as $data){
                                $products[] = $data['products'];
                                $sold[] = $data['sold'];
                            }
                        ?>
                <div>
                    <canvas id="myChart"></canvas>
                </div>
                <script>
                    const labels = <?php echo json_encode($products)?>;
                    const data = {
                        labels: labels,
                        datasets: [{
                            label: '',
                            data: <?php echo json_encode($sold)?>,
                            backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                            ],
                            borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                            ],
                            borderWidth: 1
                        }]
                    };

                    const config = {
                        type: 'bar',
                        data: data,
                        options: {
                            scales: {
                            y: {
                                beginAtZero: true
                            }
                            }
                        },
                    };

                    const myChart = new Chart(
                        document.getElementById('myChart'),
                        config
                    );
                </script>

            </section>
        </div>
        <!-- Featured Category Section Ends here -->

    </div><!-- div for main-content -->    

    <!-- Main Content Section Ends -->

</div> <!-- sidebar link -->


<?php include('partials/footer.php');?>
