<?php include("partials/html-head.php") ?>


    <title>Fresh & Organic Online Grocery Store | Home</title>
</head>
<body>

<?php include("partials/navigation.php")?>

    <!--Start of Content-->
    <div class="container">
        <div class="row">
            <div class="col-2">
                <h1>Fresh & Organic <br>Online Grocery <br>Store</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non, nam velit, esse molestias quasi recusandae, aperiam explicabo ipsa eos totam consequuntur dicta tempora? Excepturi, quasi!</p>
                <a href="../register/login.php" class="button">LOG IN</a>
            </div>
            <div class="col-2">
                <img src="images/content-1.png" alt="vegetables">
            </div>
        </div>
    </div>
    <!--End of Content-->

    <!--Start of Featured Products-->
    <div class="container-2">
        <h1 class="c2-title">Fresh Products</h1>
        <div class="row">
            <div class="col-4">
                <div class="mini-container">
                    <h2>Vegetables</h2>
                    <img src="images/vegetables.png" alt="eggplant">
                    <a href="vegetables.php" class="btn">see more</a>
                </div>
            </div>
            <div class="col-4">
                <div class="mini-container">
                    <h2>Fruits</h2>
                    <img src="images/fruits.png" alt="lemon">
                    <a href="fruits.php" class="btn">see more</a>
                </div>
            </div>
            <div class="col-4">
                <div class="mini-container">
                    <h2>Beverages</h2>
                    <img src="images/beverages.png" alt="milk">
                    <a href="beverages.php" class="btn">see more</a>
                </div>
            </div>
            <div class="col-4">
                <div class="mini-container">
                    <h2>More</h2>
                    <img src="images/more.png" alt="papaya">
                    <a href="products.php" class="btn">see more</a>
                </div>
            </div>
        </div>
    </div>
    <!--End of Featured Products-->

    <?php  include("partials/footer.php") ?>

</body>
</html>
