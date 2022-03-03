<?php include("partials/navbar.php") ?>

<div class="main-content">
        <!-- Main Content Section Starts -->
        <h1>Change Password</h1>

        <br>
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Old Password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current password">
                    </td>
                </tr>

                <tr>
                    <td>New Password: </td>
                    <td>
                        <input type="password" name="new_password" placeholder="New password">
                    </td>
                </tr>              

                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm password">
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>

<?php
    //Check if button clicked
    if(isset($_POST['submit'])){
        // echo "Clicked";

        //Get Data from form
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        //Check if current id and current password exist
        $sql = "SELECT * FROM admin WHERE id = $id AND password = '$current_password'";

        //Execute query
        $result = mysqli_query($conn, $sql);

        if($result==TRUE){
            //Check data is avaible or not
            $count = mysqli_num_rows($result);

            if($count==1){
                //User exists
                //echo "User Found";
                //Check new and confirm password match
                if($new_password == $confirm_password){
                    //Update password
                    $sql2 = "UPDATE admin SET
                        password = '$new_password'
                        WHERE id = $id
                    ";

                    //Execute change password query
                    $result2 = mysqli_query($conn, $sql2);

                    //Check if executed
                    if($result2==TRUE){
                        //Display message
                        //Redirect
                        $_SESSION['change-pwd'] = "<div class='success'> Password Changed Successfully. </div>";
                        header("location:manage-admin.php");                        
                    }else {
                        //Display errror
                        //Redirect
                        $_SESSION['change-pwd'] = "<div class='failed'> Failed to Change Password. </div>";
                        header("location:manage-admin.php");
                    }

                }else{
                    //Redirect
                    $_SESSION['pwd-not-match'] = "<div class='error'> New Password and Confirm Password Didn't Match </div>";
                    header("location:manage-admin.php");
                }


            }else{
                //User not found
                $_SESSION['user-not-found'] = "<div class='error'> User Not Found </div>";
                header("location:manage-admin.php");
            }
        }

        //Check if new and confirm password match

        //Change password if all above is true
    }
?>


<?php include("partials/footer.php") ?>