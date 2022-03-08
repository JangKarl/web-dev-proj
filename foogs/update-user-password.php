<?php include("partials/html-head.php") ?>

    <title>Fresh & Organic Online Grocery Store | Account</title>
    
</head>
<body>
<?php include("partials/navigation.php") ?>

        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $sql = "SELECT * FROM user WHERE user_id=$id";

                $result = mysqli_query($conn, $sql);
    
                if($result==TRUE){
                    $count= mysqli_num_rows($result);
    
                    if($count==1){
                        $row = mysqli_fetch_assoc($result);
    
                        $first_name = $row['first_name'];
                        $last_name = $row['last_name'];
                        $address = $row['bill_address'];
                    }else{
                        header("location:account.php");
                    }
                }
            }
        ?>

        <div class="account-container">
            <div class="column first-con">
                <h1>Hello <?php echo $first_name?></h1>
            </div>            
        
        <div class="column second-con">
            <h3>Change Password</h3>
            <div class="line"></div>
            <form action="" method="POST">
                <strong>Old Password:</strong><br><input type="password" name="current_password" placeholder="Current password"><br>
                <strong>New Password:</strong><br><input type="password" name="new_password" placeholder="New password"><br>
                <strong>Confirm Password:</strong><br><input type="password" name="confirm_password" placeholder="Confirm password"><br><br>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Change Password">
            </form>
        </div>
        </div>

<?php
    //Check if button clicked
    if(isset($_POST['submit'])){
        // echo "Clicked";

        //Get Data from form
        $id = $_POST['id'];
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        //Check if current id and current password exist
        $sql = "SELECT * FROM user WHERE user_id = $id AND password = '$current_password'";

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
                    $sql2 = "UPDATE user SET
                        password = '$new_password'
                        WHERE user_id = $id
                    ";

                    //Execute change password query
                    $result2 = mysqli_query($conn, $sql2);

                    //Check if executed
                    if($result2==TRUE){
                        //Display message
                        //Redirect
                        $_SESSION['change-pwd'] = "<div class='success'> Password Changed Successfully. </div>";
                        header("location:account.php");                        
                    }else {
                        //Display errror
                        //Redirect
                        $_SESSION['change-pwd'] = "<div class='failed'> Failed to Change Password. </div>";
                        header("location:account.php");
                    }

                }else{
                    //Redirect
                    $_SESSION['pwd-not-match'] = "<div class='error'> New Password and Confirm Password Didn't Match </div>";
                    header("location:account.php");
                }


            }else{
                //User not found
                $_SESSION['user-not-found'] = "<div class='error'> Wrong Old Password </div>";
                header("location:account.php");
            }
        }

        //Check if new and confirm password match

        //Change password if all above is true
    }
?>

<?php include("partials/footer.php") ?>

</body>
</html>