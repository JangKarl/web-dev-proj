<?php include('partials/navbar.php');

@include 'config.php';
 
 //delete process
 if(isset($_GET['delete'])){
     $delete_id = $_GET['delete'];
     $delete_query = mysqli_query($conn, "DELETE FROM `product` WHERE product_id = $delete_id ") or die('query failed');
     if($delete_query){
        header('location:manage-inventory.php');
        $message[] = 'product has been deleted';
     }else{
        header('location:manage-inventory.php');
        $message[] = 'product could not be deleted';
     };
  };
 //updating process
 if(isset($_POST['update_product'])){
     $update_p_id = $_POST['update_p_id'];
     $update_p_category = $_POST['update_category'];
     $update_p_name = $_POST['update_p_name'];
     $update_p_price = $_POST['update_p_price'];
     $update_p_image = $_FILES['update_p_image']['name'];
     $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
     $update_p_image_folder = 'uploaded_img/'.$update_p_image;
  
     $update_query = mysqli_query($conn, "UPDATE `product` SET category_id= '$update_p_category', name = '$update_p_name', price = '$update_p_price', image = '$update_p_image' WHERE product_id = '$update_p_id'");
  
     if($update_query){
        move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
        $message[] = 'product updated succesfully';
        header('location:manage-inventory.php');
     }else{
        $message[] = 'product could not be updated';
        header('location:manage-inventory.php');
     }
  
  } 

?>

    <!-- Main Content Section Starts -->
    <div class="main-content">
        <div class="main-top">
            <h1>PORTAL | MANAGE INVENTORY  </h1>
            <i class="fas fa-user-cog"></i>
        </div>
        <br>
        <a href="add-product.php" class="secondary-btn-add">Add product</a>

         <!-- Main body -->   
        <div class="inventory-container">

        <section class="display-product-table">

        <table>
                <!-- table header -->
            <thead>
                <th>product image</th>
                <th>product name</th>
                <th>product price</th>
                <th>action</th>
            </thead>

            <tbody>
                <?php
                    //displaying inserted product on a table
                    $select_products = mysqli_query($conn, "SELECT * FROM `product`");
                    if(mysqli_num_rows($select_products) > 0){
                    while($row = mysqli_fetch_assoc($select_products)){
                ?>
                    <!-- navigation and view for the displayed products -->
                <tr>
                    <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                    <td><?php echo $row['name']; ?></td>
                    <td>$<?php echo $row['price']; ?>/-</td>
                    <td>
                    <a href="manage-inventory.php?delete=<?php echo $row['product_id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this?');"> <i class="fas fa-trash"></i> Delete </a>
                    <a href="manage-inventory.php?edit=<?php echo $row['product_id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> Update </a>
                    </td>
                </tr>
                        <!-- error catcher -->
                <?php
                    };    
                    }else{
                    echo "<div class='empty'>no product added</div>";
                    };
                ?>
            </tbody>
        </table>

        </section>

        </section>

        <section class="edit-form-container">

        <?php
        //edit function
        if(isset($_GET['edit'])){
            $edit_id = $_GET['edit'];
            $edit_query = mysqli_query($conn, "SELECT * FROM `product` WHERE product_id = $edit_id");
            if(mysqli_num_rows($edit_query) > 0){
                while($fetch_edit = mysqli_fetch_assoc($edit_query)){
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
            <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['product_id']; ?>">
            <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
            <select name="update_category" class="box">
                <?php
                $sql = "SELECT * FROM category WHERE active='YES'";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count>0){
                    while($row=mysqli_fetch_assoc($res)){
                        $categ_id = $row['category_id'];
                        $title = $row['name'];
                        ?>
                        <option value="<?php echo $categ_id; ?>"><?php echo $title; ?></option>
                        <?php
                    }
                }
                else{
                    ?>
                    <option value="0">No Categories Found</option>
                    <?php
                }
                ?>

            </select>
            <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
            <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
            <input type="submit" value="update the product" name="update_product" class="btn">
            <input type="reset" value="cancel" id="close-edit" class="option-btn">
            
        </form>

        <?php
                    };
                };
                echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
            };
        ?>
        
        </section>


        </div> <!-- main body  -->


    </div><!-- div main-content -->       

    <!-- Main Content Section Ends -->

</div> <!-- sidebar link -->


<?php include('partials/footer.php');?>