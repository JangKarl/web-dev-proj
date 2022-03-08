<?php include("partials/html-head.php") ?>
<?php include("config/constant.php") ?>


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
                <?php
                    if(isset($_SESSION['change-login'])) {
                        echo $_SESSION['change-login'];
                    }else{
                        echo '<a href="login.php" class="button">Log In</a>';
                    }
            
                ?>
            </div>
            <div class="col-2">
                <img src="images/content-1.png" alt="vegetables">
            </div>
        </div>
    </div>
    <!--End of Content-->

    <!-- Category Section Starts here -->
    <section class="container-2">
        <div style="text-align: center;">
            <h1 class="c2-name">Featured Product Category</h1>
        </div>
        <br>
        <div style="text-align: center;">

            <?php
                //create sql query to display categpries from database
                $sql = "SELECT * FROM category WHERE active = 'Yes' AND featured ='Yes'";
                //execute the query
                $res = mysqli_query($conn, $sql);
                //count rows to check whether the category is available or not
                $count = mysqli_num_rows($res);

                if ($count>0)
                {
                    // categories available
                    while ($row = mysqli_fetch_assoc($res))
                    {
                      // get the values like id, name, image
                      $category_id = $row['category_id'];
                      $name = $row['name'];
                      $image = $row['image'];
                      ?>

                      <div style="
                      display: inline-block;
                      margin: 1rem 2%;
                      background: rgb(3, 138, 0);
                      font-family: 'Rowdies', cursive;;
                      color: #fff;
                      padding: .8rem .8rem;
                      font-size: 1.7rem;
                      text-align: center;
                      cursor: pointer;
                      border-radius: 50px;
                      ">
                          <?php echo $name; ?>
                          <br>
                          <a href="category.php?id=<?php echo $category_id?>"><img src="images/<?php echo $image; ?>" class="img-responsive" width="250px"></a>
                      </div>

                      <?php
                    }
                }
                else
                {
                    //categories not available
                    echo "<div class='error'>Don't have any category yet.. </div>";
                }
            ?>
        </div>
    </section>
    <!-- Category Section Ends here -->

    <?php  include("partials/footer.php") ?>

</body>
</html>
