
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
                    <h3>Total Orders</h3>
                    <p>Number of Total Active Orders</p>
                    <?php
                        $dash_users = mysqli_query($conn, "SELECT * FROM `orders`");
                        if($user_total = mysqli_num_rows($dash_users)){
                            echo '<h1>'.$user_total.'</h1>';
                        }
                        else{
                            echo '<h1>No Available Data</h1>';
                        }
                    ?>
                </div>
            </div>

            <section class="bottom-card">
                <h1>Sales Summary (Per Category)</h1>

                <div class="sales-graphs">
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Year', 'Sales'],
                        ['2014', 1000],
                        ['2015', 1170],
                        ['2016', 660],
                        ['2017', 1030]
                        ]);

                        var options = {
                        chart: {
                            title: '',
                            subtitle: '',
                        }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>

                <div id="columnchart_material" style="width: auto; height: 600px;"></div>
                    
                    </div>
                </div>
            </section>
        </div>
        <!-- Featured Category Section Ends here -->

    </div><!-- div for main-content -->    

    <!-- Main Content Section Ends -->

</div> <!-- sidebar link -->


<?php include('partials/footer.php');?>
