<?php
    //include constant file
    include('../config/constant.php');

    //check whether the id and image name is set or not
    if (isset($_GET['category_id']) AND isset($_GET['image_name'])) {
        //get the value and delete
        $category_id = $_GET['category_id'];
        $image_name = $_GET['image_name'];

        //remove the physical image file if available
        if ($image_name != '') {
            // image is available, so remove it
            $path = "../images/".$image_name;
            //remove the image
            $remove = unlink($path);

            //if fail to remove image then add message and stop
            if($remove==false) {
                //set the session message
                $_SESSION['remove'] = "<div class='error'>Failed to remove category image.</div>";
                //stop the process
                header('location:'.SITEURL.'manage-category.php');
                die();
            }

        }
        //delete data from database
        //sql delete data from database
        $sql = "DELETE FROM category WHERE category_id = $category_id";

        //executethe query
        $res = mysqli_query($conn, $sql);

        //check whether the data is delete from database or not
        if ($res==true) {
            //set success message and redirect
            $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
            //redirect to manage category
            header('location:'.SITEURL.'manage-category.php');
        }
        //redirect to manage category page with message
        else {
            // set fail message and redirect
            $_SESSION['delete'] = "<div class='error'> Failed to delete category.</div>";
            //redirect to manage category
            header('location:'.SITEURL.'manage-category.php');
        }
    }
    else {
        //redirect to manage category page
        header('location:'.SITEURL.'manage-category.php');
    }
?>
