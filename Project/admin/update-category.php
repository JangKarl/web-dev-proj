<?php include('partials/navbar.php');?>


    <!-- Main Content Section Starts -->
    <div class="main-content">
      <div class="main-top">
          <h1>PORTAL | Update CATEGORY </h1>
          <br><br>
      </div>

          <form action="update-process-category.php" method="POST" enctype="multipart/form-data">

              <?php
                  //check whether the id is set or not
                  if (isset($_GET['category_id'])) {
                      //get the id and all other details
                      $category_id = $_GET['category_id'];

                      //create sql query to get all details
                      $sql = "SELECT category_id, title, image_name, featured, active FROM category WHERE category_id = $category_id";

                      //execute the query
                      $res = mysqli_query($conn, $sql);

                      //count the rows to check whether the id is valid or not
                      $count = mysqli_num_rows($res);

                      if ($count==1) {
                          // get all the data
                          $row = mysqli_fetch_assoc($res);
                          $title = $row['title'];
                          $current_image = $row['image_name'];
                          $featured = $row['featured'];
                          $active = $row['active'];

                      }
                      else {
                          // redirect to manage category with session message
                          $_SESSION['no-category-found'] = "<div class='error'>Category not found.</div>";
                          header('location:'.SITEURL.'manage-category.php');
                      }
                  }
                  else {
                      // redirect to manage category
                      header('location:'.SITEURL.'manage-category.php');
                  }
              ?>

              <table class="tbl-full">
                  <tr>
                      <td>Title</td>
                      <td>
                          <input type="text" name="title" value="<?php echo $title; ?>">
                      </td>
                  </tr>

                  <tr>
                      <td>Current Image: </td>
                      <td>
                          <?php
                              if ($current_image != "") {
                                  // display the image
                                  ?>
                                  <img src="<?php echo SITEURL; ?>../images/<?php echo $current_image;?> " width="80rem">
                                  <?php
                              }
                              else {
                                  // display message
                                  echo "<div class='error'>Image not added.</div>";
                              }
                          ?>
                      </td>
                  </tr>

                  <tr>
                      <td>New Image: </td>
                      <td>
                          <input type="file" name="image">
                      </td>
                  </tr>

                  <tr>
                      <td>Featured:</td>
                      <td>
                          <input <?php if ($featured=="Yes") {echo "checked";}?> type="radio" name="featured" value="Yes"> Yes

                          <input <?php if ($featured=="No") {echo "checked";}?> type="radio" name="featured" value="No"> No
                      </td>
                  </tr>

                  <tr>
                      <td>Active:</td>
                      <td>
                          <input <?php if ($active=="Yes") {echo "checked";}?> type="radio" name="active" value="Yes"> Yes

                          <input <?php if ($active=="No") {echo "checked";}?> type="radio" name="active" value="No"> No
                      </td>
                  </tr>

                  <tr>
                      <td>
                          <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                          <input type="hidden" name="category_id" value="<?php echo $category_id;?>">
                          <input type="submit" name="submit" value="Update Category" class="bt-secondary">
                      </td>
                  </tr>

              </table>
          </form>

      </div>
    <!-- Main Content Section Ends -->

</div> <!-- sidebar link -->


<?php include('partials/footer.php');?>
