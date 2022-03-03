<?php include("partials/navbar.php");?>

<div class="main-content">
    <!-- Main Content Section Starts -->
        <h1>Add Admin</h1>

        <br>
        <?php
        if(isset($_SESSION['add'])){
            echo $_SESSION['add']; //Displaying session message
            unset($_SESSION['add']); //Removing session message
        }        
        ?>
        <br>
        <br>

        <form action="" method="POST">
            
            <table>
                <tr>
                    <td class="tbl-30">First Name: </td>
                    <td><input type="text" name="first_name" placeholder="Enter first name"></td> <br>
                </tr>

                <tr>
                    <td class="tbl-30">Last Name: </td>
                    <td><input type="text" name="last_name" placeholder="Enter last name"></td>
                </tr>

                <tr>
                    <td class="tbl-30">Email: </td>
                    <td><input type="email" name="email" placeholder="Enter email"></td>
                </tr>

                <tr>
                    <td class="tbl-30">Password: </td>
                    <td><input type="password" name="password" placeholder="Enter password"></td>
                </tr>

                <tr>
                    <td class="tbl-30">Address: </td>
                    <td><input type="text" name="address" placeholder="Enter address"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add admin">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php include("partials/footer.php");?>

<?php 
    // Process the value from form and save into database
    //Check if button is clicked

    if(isset($_POST['submit'])){
        // Button clicked
        
        //Get data from form
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']); //md5 = encrypt password 
        $address = $_POST['address'];

        //Query to save data into database
        $sql = "INSERT INTO admin SET
            first_name = '$first_name',
            last_name = '$last_name',
            email = '$email',
            password = '$password',
            address = '$address'
        ";

        //Execute query and save datas into database
        $result = mysqli_query($conn, $sql);

        //Check if the query is executed
        if($result==TRUE){
            //Data inserted

            //Session variable to display message
            $_SESSION['add'] = "Admin Added Successfully";

            //Redirect Page Manage Admin
            header('location:manage-admin.php');
        }else{
            //Session variable to display message
            $_SESSION['add'] = "Failed to add admin";

            //Redirect Page Manage Admin
            header('location:add-admin.php');
        }




    }else{
        // Button not clicked
    }

?>