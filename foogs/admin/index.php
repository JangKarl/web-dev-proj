
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
        <section class="categories">
            <div style="text-align: center;">
                <h2 class="text-center" style="color:rgb(3, 138, 0); font-size: 50px">Featured Product Category</h2>
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
                          margin-top: 1rem;
                          background: rgb(3, 138, 0);
                          color: #fff;
                          padding: .8rem 3rem;
                          font-size: 1.7rem;
                          text-align: center;
                          cursor: pointer;
                          border-radius: 50px;
                          ">
                              <?php echo $name; ?>
                              <br>
                              <img src="<?php echo SITEURL;?>../images/<?php echo $image; ?>" class="img-responsive" width="250px">
                          </div>

                          <?php
                        }
                    }
                    else
                    {
                        //categories not available
                        echo "<div class='error'>Do not have any category yet. </div>";
                    }
                ?>
            </div>
        </section>
        <!-- Featured Category Section Ends here -->

    </div><!-- div for main-content -->    

    <!-- Main Content Section Ends -->

</div> <!-- sidebar link -->


<?php include('partials/footer.php');?>
