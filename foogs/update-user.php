<?php include("partials/html-head.php") ?>

    <title>Fresh & Organic Online Grocery Store | Account</title>
    
</head>
<body>
<?php include("partials/navigation.php") ?>

        <?php
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
        ?>
        

        <div class="account-container">
            <div class="column first-con">
            <a href="account.php" class="back"><i class="fa-solid fa-circle-left"></i>Back to account</a>
            <h1>Hello <?php echo $first_name?></h1>
            </div>
            <div class="column second-con">
                <h3>Update Information</h3>
                <div class="line"></div>
                <form action="" method="POST">
                    <strong>First Name:</strong><br><input type="text" name="first_name" value="<?php echo $first_name?>"><br>
                    <strong>Last Name:</strong><br><input type="text" name="last_name" value="<?php echo $last_name?>"><br>
                    <strong>Address:</strong><br><input type="text" name="bill_address" value="<?php echo $address?>"><br><br>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" class="secondary-btn-update" value="Update Account">
                </form>
            </div>
        </div>

<?php

    //Check button if clicked
    if(isset($_POST['submit'])){

        //Get values from form to update
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['bill_address'];

        //SQL query
        $sql = "UPDATE user SET
        first_name = '$first_name',
        last_name = '$last_name',
        bill_address = '$address'
        WHERE user_id = '$id'
        ";
        //Execute query
        $result = mysqli_query($conn, $sql);

        //Check if success
        if($result==TRUE){
            //Query executed
            $_SESSION['update'] = "<div class='success'> Update Successfully </div>";
            header("location:account.php");
        }else{
            //Query failed to execute
            $_SESSION['update'] = "<div class='failed'> Update Failed </div>";
            header("location:account.php");
        }
    }


?>

<?php include("partials/footer.php") ?>

</body>
</html>