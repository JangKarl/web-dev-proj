
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
        <div class="columns">
            <h1>5</h1>
            <br><br><br>
            Vegetables
        </div>
        <div class="columns">
            <h1>5</h1>
            <br><br><br>
            Fruits
        </div>
        <div class="columns">
            <h1>5</h1>
            <br><br><br>
            Beverages
        </div>
        <div class="columns">
            <h1>5</h1>
            <br><br><br>
            More
        </div>


    </div><!-- div for main-content -->    

    <!-- Main Content Section Ends -->

</div> <!-- sidebar link -->


<?php include('partials/footer.php');?>