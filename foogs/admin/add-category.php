<?php include('partials/navbar.php');

@include 'config.php';?>

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
            <form action="" method="POST" enctype="multipart/form-data" style="text-align: center;">

                <table style="
                display: inline-block;
                margin-top: 1rem;
                background: rgb(3, 138, 0);
                color: #fff;
                padding: .8rem 3rem;
                font-size: 1.5rem;
                cursor: pointer;
                border-radius: 50px;
                ">

                    <tr>
                        <td>Category Name</td>
                        <td>
                            <input type="text" name="name">
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
                    $name = $_POST['name'];
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
                        $image = $_FILES['image']['name'];
                        //upload image if image is selected
                        if ($image != "") {



                          //Auto rename uploaded images//
                          //Get the extension of image//
                          $fileExtension = pathinfo($image, PATHINFO_EXTENSION);
                          //Rename image
                          $image = "Food_Category_".rand(000, 999).'.'.$fileExtension;

                          $source_path = $_FILES['image']['tmp_name'];

                          $destination_path = "../images/".$image;

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
                        // Don't upload image and set image value as blank
                        $image="";
                    }

                    //2. Create SQL Quaeary to insert category into database
                    $sql = "INSERT INTO category SET
                        name = '$name',
                        image = '$image',
                        featured = '$featured',
                        active = '$active'
                    ";

                    //3. Execute the Query and Save in Database//
                    $res = mysqli_query($conn, $sql);

                    //4. Chaeck whether the query executed or not and data added or not//
                    if ($res==true){
                        $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                        // header('location:manage-category.php');
                    }
                    else{
                        $_SESSION['add'] = "<div class='error'>Failed to add category.</div>";
                        // header('location:add-category.php');
                    }
                }
            ?>


    </div><!-- div main-content -->

    <!-- Main Content Section Ends -->

</div> <!-- sidebar link -->


<?php include('partials/footer.php');?>
