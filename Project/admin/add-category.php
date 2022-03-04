<?php include('partials/navbar.php');?>


    <!-- Main Content Section Starts -->
    <div class="main-content">
        <div class="main-top">
            <h1>PORTAL | ADD CATEGORY </h1>
        </div>
        <br>
        <?php

            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if (isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

        ?>
        <br><br>
            <!--Add category Form Starts-->
            <form action="" method="POST" enctype="multipart/form-data">

                <table class="tbl-full">

                    <tr>
                        <td>Category Title</td>
                        <td>
                            <input type="text" name="title">
                        </td>
                    </tr>

                    <tr>
                        <td>Select Image: </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                        <td>Featured</td>
                        <td>
                            <input type="radio" name="featured" value="Yes">Yes
                            <input type="radio" name="featured" value="No">No
                        </td>
                    </tr>

                    <tr>
                        <td>Active</td>
                        <td>
                            <input type="radio" name="active" value="Yes">Yes
                            <input type="radio" name="active" value="No">No
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                        </td>
                    </tr>

                </table>

            </form>
            <!--Add category Form Ends-->

            <?php
                //check whether the submit button is click or not//
                if (isset($_POST['submit'])) {
                    //echo "Clicked";

                    //1. Get the category form//
                    $title = $_POST['title'];
                    //for radio input type, we need to check whether the button is selected or not
                    if (isset($_POST['featured'])) {
                        //get the value from form//
                        $featured = $_POST['featured'];
                    }
                    else {
                        //Set the default value
                        $featured = "No";
                    }

                    if (isset($_POST['active'])) {
                        $active = $_POST['active'];
                    }
                    else {
                        $active = "No";
                    }
                    //Check whether the image is slected or not and set the value for image name accordingly//
                    //print_r($_FILES['image']);

                    //die;// Break the code here

                    if (isset($_FILES['image']['name'])) {
                        // upload image
                        //to uploada image we need image name, source path and destination//
                        $image_name = $_FILES['image']['name'];
                        //upload image if image is selected
                        if ($image_name != "") {



                          //Auto rename uploaded images//
                          //Get the extension of image//
                          $fileExtension = pathinfo($image_name, PATHINFO_EXTENSION);
                          //Rename image
                          $image_name = "Food_Category_".rand(000, 999).'.'.$fileExtension;

                          $source_path = $_FILES['image']['tmp_name'];

                          $destination_path = "../images/".$image_name;

                          //finally upload image//
                          $upload = move_uploaded_file($source_path, $destination_path);

                          //Check whether the image is uploaded or not//
                          // if the image is not uploaded then we will stop the process and redirect with error message//
                          if ($upload==false) {
                              // SET message//
                              $_SESSION['upload'] = "<div class='error'>Failed to upload image. </div>";
                              //redirect to add category page//
                              header('location:'.SITEURL.'add-category.php');
                              //stop the process//
                              die();
                          }
                        }

                    }
                    else {
                        // Don't upload image and set image_name value as blank
                        $image_name="";
                    }

                    //2. Create SQL Quaeary to insert category into database
                    $sql = "INSERT INTO category SET
                        title = '$title',
                        image_name = '$image_name',
                        featured = '$featured',
                        active = '$active'
                    ";

                    //3. Execute the Query and Save in Database//
                    $res = mysqli_query($conn, $sql);

                    //4. Chaeck whether the query executed or not and data added or not//
                    if ($res==true) {
                        //Query executed and category added
                        $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                        //redirect to Manage Category Page//
                        header('location:'.SITEURL.'manage-category.php');
                    }
                    else {
                        //Failed to Add category//
                        $_SESSION['add'] = "<div class='error'>Failed to add category.</div>";
                        //redirect to Manage Category Page//
                        header('location:'.SITEURL.'add-category.php');
                    }
                }
            ?>


    </div><!-- div main-content -->

    <!-- Main Content Section Ends -->

</div> <!-- sidebar link -->


<?php include('partials/footer.php');?>
