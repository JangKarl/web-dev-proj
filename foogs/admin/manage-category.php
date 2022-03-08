<?php include('partials/navbar.php');?>


    <!-- Main Content Section Starts -->
    <div class="main-content">
        <div class="main-top">
            <h1>PORTAL | MANAGE CATEGORY </h1>
            <i class="fas fa-user-cog"></i>
        </div>
        <br>

        <?php

            if (isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if (isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }

            if (isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if (isset($_SESSION['no-category-found']))
            {
                echo $_SESSION['no-category-found'];
                unset($_SESSION['no-category-found']);
            }

            if (isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if (isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if (isset($_SESSION['failed-remove']))
            {
                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
            }


        ?>
        <br>

        <a href="<?php echo SITEURL; ?>add-category.php" class="secondary-btn-add">Add category</a>
        <br>

                <!-- Main body -->
        <section class="display-product-table">
          <table>
              <thead>
                  <th>ID</th>
                  <th>name</th>
                  <th>Image</th>
                  <th>Featured</th>
                  <th>Active</th>
                  <th>Actions</th>
              </thead>

              <?php

                  //Query to get all category from database
                  $sql = "SELECT * FROM category";

                  //Execute query
                  $res = mysqli_query($conn, $sql);

                  //Count rows
                  $count = mysqli_num_rows($res);

                  //create serial number variable
                  $sn=1;

                  //Check whether we have data in database or not
                  if ($count>0) {
                      // we have data in database
                      // get data and display
                      while ($row=mysqli_fetch_assoc($res)) {
                          $category_id = $row['category_id'];
                          $name = $row['name'];
                          $image = $row['image'];
                          $featured = $row['featured'];
                          $active = $row['active'];

                          ?>

                          <tr>
                              <td><?php echo $sn++; ?></td>
                              <td><?php echo $name; ?></td>
                              <td>
                                  <?php
                                      //check whether the image is available or not
                                      if($image!=""){
                                        //display the image
                                        ?>
                                        <img src="<?php echo SITEURL;?>../images/<?php echo $image;?>" width="80rem">
                                        <?php
                                      }
                                      else{
                                          //display message
                                          echo "<div class='error'>Image not added.</div>";
                                      }
                                  ?>
                              </td>
                              <td><?php echo $featured; ?></td>
                              <td><?php echo $active; ?></td>
                              <td>
                                <a href="<?php echo SITEURL; ?>update-category.php?category_id=<?php echo $category_id;?>" class="btn-secondary">Update Category.</a>
                                <a href="<?php echo SITEURL; ?>delete-category.php?category_id=<?php echo $category_id;?>&image=<?php echo $image; ?>" class="btn-danger">Delete Category</a>
                              </td>
                          </tr>

                          <?php
                      }
                  }
                  else {
                      // we do not have data
                      //we will display message inside table
                      ?>

                      <tr>
                          <td colspan="6"><div class="error">No Category Added.</div></td>
                      </tr>

                      <?php
                  }
              ?>
          </table>
        </section>

    </div><!-- div main-content -->

    <!-- Main Content Section Ends -->

</div> <!-- sidebar link -->

<?php include('partials/footer.php');?>
