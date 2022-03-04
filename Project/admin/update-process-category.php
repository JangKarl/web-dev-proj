<?php include("../config/constant.php");?>

<?php
    if (isset($_POST['submit'])) {
        //1. get all the values on forms
        $category_id =$_POST['category_id'];
        $title =$_POST['title'];
        $current_image =$_POST['current_image'];
        $featured =$_POST['featured'];
        $active =$_POST['active'];

        //2. Updating new image if selected
        //check whether the image is selected or not
        if (isset($_FILES['image']['name']))
        {
            // get image details
            $image_name = $_FILES['image']['name'];

            //check whether the image is available
            if ($image_name != "")
            {
                // image available
                // A. upload the nre image
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
                if ($upload==false)
                {
                    // SET message//
                    $_SESSION['upload'] = "<div class='error'>Failed to upload image. </div>";
                    //redirect to add category page//
                    header('location:'.SITEURL.'manage-category.php');
                    //stop the process//
                    die();
                }
                // B. remove the current image if available
                if ($current_image != "")
                {
                    $remove_path = "../images/".$current_image;
                    $remove = unlink($remove_path);

                    //check whther the image is remove or not
                    //if fail to remove then display message and stop
                    if ($remove==false)
                    {
                        // failed to remove image
                        $_SESSION['failed-remove'] = "<div class='error'>Failed to remove category</div>";
                        header('location:'.SITEURL.'manage-category.php');
                        //stop the process
                        die();
                    }
                }

            }
            else
            {
                $image_name = $current_image;
            }
        }
        else
        {
            $image_name = $current_image;
        }
        //3. Update the database
        $sql2 = "UPDATE category SET
            title = '$title',
            image_name = '$image_name',
            featured = '$featured',
            active = '$active'
            WHERE category_id= $category_id
        ";

        //execute the query
        $res2 = mysqli_query($conn, $sql2);

        //4. Redirect to manage category with message
        //Check whether executed or not
        if ($res2==true) {
            // category updated
            $_SESSION['update'] = "<div class='success'>Category updated successfully.</div>";
            header('location:'.SITEURL.'manage-category.php');
        }

        else {
            // failed to update category...
            $_SESSION['update'] = "<div class='success'>Failed to update category.</div>";
            header('location:'.SITEURL.'manage-category.php');
        }
    }
?>
