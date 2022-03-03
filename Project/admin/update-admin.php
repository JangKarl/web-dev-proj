<?php include("partials/navbar.php");?>

<div class="main-content">
        <!-- Main Content Section Starts -->
        <h1>Update Admin Page</h1>
        
        <br>
        <?php

            $id = $_GET['id'];

            $sql = "SELECT * FROM admin WHERE id=$id";

            $result = mysqli_query($conn, $sql);

            if($result==TRUE){
                $count= mysqli_num_rows($result);

                if($count==1){
                    //echo "Admin Available";
                    $row = mysqli_fetch_assoc($result);

                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $address = $row['address'];
                }else{
                    header("location:manage-admin.php");
                }
            }
        ?>
        
        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>First Name: </td>
                    <td>
                        <input type="text" name="first_name" value="<?php echo $first_name?>">
                    </td>
                </tr>

                <tr>
                    <td>Last Name: </td>
                    <td>
                        <input type="text" name="last_name" value="<?php echo $last_name?>">
                    </td>
                </tr>

                <tr>
                    <td>Address: </td>
                    <td>
                        <input type="text" name="address" value="<?php echo $address?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>

<?php

    //Check button if clicked
    if(isset($_POST['submit'])){
        //echo "Updated admin";

        //Get values from form to update
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];

        //SQL query
        $sql = "UPDATE admin SET
        first_name = '$first_name',
        last_name = '$last_name',
        address = '$address'
        WHERE id = '$id'
        ";

        //Execute query
        $result = mysqli_query($conn, $sql);

        //Check if success
        if($result==TRUE){
            //Query executed
            $_SESSION['update'] = "<div class='success'> Admin Update Successfully </div>";
            header("location:manage-admin.php");
        }else{
            //Query failed to execute
            $_SESSION['update'] = "<div class='failed'> Failed to Update Admin </div>";
            header("location:manage-admin.php");
        }
    }


?>


<?php include('partials/footer.php');?>


